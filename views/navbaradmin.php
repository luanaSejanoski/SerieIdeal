<header>
  <div class="menu">
    <a href="../home.php">
      <img src="../../img/serieideal.png">
    </a>
    
    <nav>
        <a href="../home.php">Home</a>
        <a href="../admin/dashboard.php">Nova Série</a>
        <?php if (isset($_SESSION["Logado"])) { ?>
        <a href="../controllers/logout.php">Encerrar sessão</a>
      <?php } else { ?>
        <a href="../login.php">Login</a>
      <?php } ?>
    </nav>
  </div>
</header>