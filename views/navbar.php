<header>
  <div class="menu">
    <a href="home.php">
      <img src="../img/serieideal.png">
    </a>

    <nav>
      <a href="home.php">Home</a>
      <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) { ?>
        <a href="admin/dashboard.php">Nova Série</a>
      <?php } else { ?>
        <a class="desabilitado" title="Somente administradores podem cadastrar séries">Nova Série</a>
      <?php } ?>
      <?php if (isset($_SESSION["Logado"])) { ?>
        <a href="../controllers/logout.php">Logout</a>
      <?php } else { ?>
        <a href="../views/login.php">Login</a>
      <?php } ?>
    </nav>
  </div>
</header>