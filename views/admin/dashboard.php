 <?php
  session_start();

  require_once '../../config/database.php';

  $tituloId = $_POST['titulo_id'] ?? null;

  $sqlCategorias = "SELECT * FROM categorias";

  $stmtCategorias = $pdo->query($sqlCategorias);

  $categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);

  $sqlSeries = "SELECT * FROM series";

  $stmtSeries = $pdo->query($sqlSeries);

  $series = $stmtSeries->fetchAll(PDO::FETCH_ASSOC);

  $sqlTitulos = "SELECT id, titulo FROM series";

  $stmtTitulos = $pdo->query($sqlTitulos);

  $titulos = $stmtTitulos->fetchAll(PDO::FETCH_ASSOC);

  $serieSelecionada = [];

  if ($tituloId) {

    $sqlSerie = "SELECT * FROM series WHERE id = ?";
    
    $stmtSerie = $pdo->prepare($sqlSerie);

    $stmtSerie->execute([$tituloId]);

    $serieSelecionada = $stmtSerie->fetch(PDO::FETCH_ASSOC);
}

  ?>

 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../style/style.css?">
   <title>Cadastrar Série</title>
 </head>

 <body>
   <?php require_once '../navbar.php'; ?>

   <main>
     <!-- <h2 style="color: white">Bem vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2> -->

     <h1 style="color: white">Cadastrar Série</h1>
     <div class="formulario">
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
         <form action="../../includes/remover.php" method="get">
           <input type="text" name="titulo" placeholder="Digite o nome da série">
           <button style="background-color: rgb(100, 15, 48); color: white">Remover</button>
         </form>
       </div>

     </div>

     <h1 style="color: white">Editar Série</h1>
     <div class="formulario">
      <form method="POST">
      <select name="titulo_id" id="idtituloEd" onchange="this.form.submit()">
        <option value="" disabled selected>Series</option>
        <?php foreach ($titulos as $tituloOpcoes) { ?>
            <option value="<?php echo $tituloOpcoes['id']; ?>"
              <?php
              if (($tituloId ?? '') == $tituloOpcoes['id']) {
                  echo 'selected';
              }
              ?>>
              <?php echo htmlspecialchars($tituloOpcoes["titulo"]); ?>
            </option>
        <?php } ?>
    </select>
      </form>
        <form action="../../controllers/editar-serie.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($serieSelecionada['id'] ?? ''); ?>">
         <input type="text" name="titulo" id="tituloEd" placeholder="Titulo" value="<?php echo htmlspecialchars((string)($serieSelecionada['titulo'] ?? '')); ?>"><br>
          <select name="categoria_id" id="igeneroEd">
          <?php foreach ($categorias as $categoria) { ?>
              <option 
                  value="<?php echo $categoria['id']; ?>"
                  <?php
                  if (($serieSelecionada['categoria_id'] ?? '') == $categoria['id']) {
                      echo 'selected';
                  }
                  ?>>
                <?php echo htmlspecialchars($categoria['nome']); ?>
              </option>
          <?php } ?>
          </select><br>
         <input type="text" name="imagem" id="imagemEd" placeholder="URL da imagem" value="<?php echo htmlspecialchars($serieSelecionada['imagem'] ?? ''); ?>"><br>
         <textarea name="descricao" id="descricaoEd" placeholder="Descrição"><?php echo htmlspecialchars($serieSelecionada['descricao'] ?? ''); ?></textarea><br>
         <textarea name="descricaoMenor" id="descricaoMenorEd" placeholder="Descrição menor"><?php echo htmlspecialchars($serieSelecionada['descricaoMenor'] ?? ''); ?></textarea><br>
         <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Editar</button><br>
        </form>

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