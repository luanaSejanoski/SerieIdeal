 <?php
  session_start();
  require_once '../includes/dados.php';
  require_once '../includes/cadastrar.php';
  ?>

<!DOCTYPE html>
 <html lang="pt-br">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../style/style.css?v=2">
   <title>Cadastrar Série</title>
 </head>

 <body>
  <?php require_once '../views/navbar.php'; ?>
   <main>
     <h2 style="color: white">Bem vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?></h2>

     <h1 style="color: white">Cadastrar Série</h1>
     <div class="formulario">
       <form action="../includes/protegido.php" method="POST">
         <input type="text" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo htmlspecialchars($titulo ?? ''); ?>"><br>
         <select name="genero" id="igenero">
           <option value="" disabled selected>Gênero</option>
           <option value="Drama">Drama</option>
           <option value="Comédia">Comédia</option>
           <option value="Ação">Ação</option>
           <option value="Terror">Terror</option>
           <option value="Ficção Científica">Ficção Científica</option>
           <option value="Romance">Romance</option>
         </select><br>
         <input type="text" name="imagem" id="imagem" placeholder="URL da imagem" value="<?php echo htmlspecialchars($imagem ?? ''); ?>"><br>
         <textarea name="descricao" id="descricao" placeholder="Descrição"><?php echo htmlspecialchars($descricao ?? ''); ?></textarea><br>
         <textarea name="descricaoMenor" id="descricaoMenor" placeholder="Descrição menor"><?php echo htmlspecialchars($descricaoMenor ?? ''); ?></textarea><br>
         <button type="submit" style="background-color: rgb(100, 15, 48); color: white">Cadastrar</button><br>

       </form>
       <a href="#abrir" style="color: rgba(255, 152, 191, 1);">Remover série</a>
       <div id="abrir" class="caixaRemover">
         <a href="#" class="fechar" style="color: white;">X</a>
         <form action="../includes/remover.php" method="get">
           <input type="text" name="titulo" placeholder="Digite o nome da série">
           <button style="background-color: rgb(100, 15, 48); color: white">Remover</button>
         </form>
       </div>

     </div>
   </main>
 </body>

 </html>