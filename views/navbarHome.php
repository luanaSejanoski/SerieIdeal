<?php


require_once '../config/database.php';

$sql = "SELECT * FROM categorias";

$stmt = $pdo->query($sql);

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

    <div style="display:flex; align-items:center" class="buscar">
      <form style="margin-right: 10px;" action="../controllers/buscar-serie.php" method="get">
        <input type="text" name="nome" id="inome" placeholder="Buscar por uma série">
        <button>Buscar</button>
      </form>

      <form style="margin-right: 10px;" action="../controllers/buscar-serie.php" method="get">
        <select name="genero" id="igenero">
          <option value="" disabled selected>Gênero</option>
          <?php foreach ($categorias as $categoria) { ?>
            <option value="<?php echo $categoria["id"]; ?>">
              <?php echo htmlspecialchars($categoria["nome"]); ?>
            </option>
          <?php } ?>
        </select>
        <button>Selecionar</button>
      </form>
    </div>
  </div>
</header>