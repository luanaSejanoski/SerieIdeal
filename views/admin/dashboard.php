 <?php
  session_start();

  require_once '../../config/database.php';

  //verifica se o usuario tem é um administrador
  if (!isset($_SESSION['id']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: ../login.php');
    exit;
  }

  //sql pra pegar todos os dados da série de acordo com o id 
  $tituloId = $_GET["titulo_id"] ?? "";
  $sql = 'SELECT s.*, c.nome AS genero
FROM series s
LEFT JOIN categorias c
ON s.categoria_id = c.id
WHERE s.id = :id';

  $stmt = $pdo->prepare($sql);

  $stmt->execute(
    [
      ':id' => $tituloId
    ]
  );

  $series = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //sql pra pegar o titulo e o id das series para fazer as opçoes do select
  $sqlSelect =  $sql = 'SELECT titulo, id FROM series';
  $stmtSelect = $pdo->query($sqlSelect);
  $seriesSelect = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

  //sql pra pegar todos os dados da serie selecionada
  $serieSelecionada = null;
  if (isset($_GET['serieEditar'])) {
    $sql = 'SELECT * FROM series WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':id' => $_GET['serieEditar']
    ]);

    $serieSelecionada = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  //sql pra pegar todos os dados das categorias
  $sqlCategorias = 'SELECT * FROM categorias';
  $stmtCategorias = $pdo->query($sqlCategorias);
  $categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);

  ?>

 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../style/style.css">
   <title>Cadastrar Série</title>
 </head>

 <body>
   <?php require_once '../navbar.php'; ?>

   <main class="mainDashboard" style="display: flex;
    align-items: center;
    justify-content: center;">

     <div class="formulario">
       <h1 style="color: white">Cadastrar Série</h1>
       <form action="../../controllers/criar-serie.php" method="POST">
         <input type="text" name="titulo" id="tituloCad" placeholder="Titulo" value="<?php echo htmlspecialchars($titulo ?? ''); ?>"><br>
         <select name="categoria_id" id="igeneroCad"><!--  -->
           <option value="" disabled selected>Gênero</option>

           <?php foreach ($categorias as $categoria) { ?>
             <option value="<?php echo $categoria["id"]; ?>">
               <?php echo htmlspecialchars($categoria["nome"]); ?>
             </option>

           <?php } ?>
         </select><br>
         <input type="text" name="imagem" id="imagemCad" placeholder="URL da imagem" value="<?php echo htmlspecialchars($imagem ?? ''); ?>"><br>
         <textarea name="descricao" id="descricaoCad" placeholder="Descrição"><?php echo htmlspecialchars($descricao ?? ''); ?></textarea><br>
         <textarea name="descricaoMenor" id="descricaoMenorCad" placeholder="Descrição menor"><?php echo htmlspecialchars($descricaoMenor ?? ''); ?></textarea><br>
         <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Cadastrar</button><br>

       </form>
       <a href="#abrir" style="color: rgba(255, 152, 191, 1);">Remover série</a>
       <div id="abrir" class="caixaRemover">
         <a href="#" class="fechar" style="color: white;">X</a>
         <form action="../../controllers/deletar-serie.php" method="POST">
           <select name="serieRemover" id="igeneroRemover">
             <option disabled selected>Selecione a série</option>
             <?php foreach ($seriesSelect as $serie) { ?>
               <option value="<?php echo $serie["id"]; ?>">
                 <?php echo htmlspecialchars($serie["titulo"]); ?>
               </option>

             <?php } ?>
           </select>
           <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Remover</button>
         </form>
       </div>

     </div>

     <div class="formulario">
       <h1 style="color: white">Editar Série</h1>
       <form method="get">
         <select name="serieEditar" id="igeneroEditar">
           <option disabled selected>Selecione a série</option>
           <?php foreach ($seriesSelect as $serie) { ?>
             <option value="<?php echo $serie["id"]; ?>">
               <?php echo htmlspecialchars($serie["titulo"]); ?>
             </option>
           <?php } ?>
         </select>
         <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Selecionar</button>
       </form>

       <form action="../../controllers/editar-serie.php" method="POST">
         <input type="hidden" name="id" value="<?php echo htmlspecialchars($serieSelecionada['id'] ?? ''); ?>">
         <input type="text" name="titulo" id="tituloEd" placeholder="Titulo" value="<?php echo htmlspecialchars(($serieSelecionada['titulo'] ?? '')); ?>"><br>
         <select name="categoria_id" id="igeneroEd">
           <?php foreach ($categorias as $categoria) { ?>
             <option value="<?php echo $categoria['id']; ?>"> <?php echo htmlspecialchars($categoria['nome']); ?></option>
           <?php } ?>
         </select><br>
         <input type="text" name="imagem" id="imagemEd" placeholder="URL da imagem" value="<?php echo htmlspecialchars($serieSelecionada['imagem'] ?? ''); ?>"><br>
         <textarea name="descricao" id="descricaoEd" placeholder="Descrição"><?php echo htmlspecialchars($serieSelecionada['descricao'] ?? ''); ?></textarea><br>
         <textarea name="descricaoMenor" id="descricaoMenorEd" placeholder="Descrição menor"><?php echo htmlspecialchars($serieSelecionada['descricaoMenor'] ?? ''); ?></textarea><br>
         <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Editar</button><br>
       </form>
     </div>
     <div class="mensagens">
       <?php
        if (isset($_SESSION["sucesso"])) {

          echo "<p class='sucesso'>" . $_SESSION["sucesso"] . "</p>";
          unset($_SESSION["sucesso"]);
        }

        if (isset($_SESSION["erros"])) {

          foreach ($_SESSION["erros"] as $erro) {
            echo "<p class='erro'>$erro</p>";
          }
          unset($_SESSION["erros"]);
        } ?>
   </main>


   </div>
 </body>

 </html>