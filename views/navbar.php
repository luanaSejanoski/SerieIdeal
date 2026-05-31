<header>
  <div class="menu">
    <a href="home.php">
      <img src="../img/serieideal.png">
    </a>
    
    <nav>
        <a href="home.php">Home</a>
        <?php if($_SESSION["admin"] == 1){?>
        <a href="admin/dashboard.php">Nova Série</a>
        <?php }else{?>
         <a class="desabilitado" title="Apenas administradores podem cadastrar séries">Nova série</a>
          <?php }?>
       <?php if (isset($_SESSION["Logado"])) { ?>
        <a href="../controllers/logout.php">Encerrar sessão</a>
      <?php } else { ?>
        <a href="login.php">Login</a>
      <?php } ?>
    </nav>
  </div>
</header>