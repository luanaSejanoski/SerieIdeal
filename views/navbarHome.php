<header>
  <div class="menu">
    <a href="home.php">
      <img src="../img/serieideal.png">
    </a>
    
    <nav>
        <a href="home.php">Home</a>
        <a href="cadastro.php">Nova Série</a>
        <a href="login.php">Login</a>
    </nav>

    <div class="buscar">
      <form action="home.php" method="get">
        <input type="text" name="nome" id="inome" placeholder="Buscar por uma série">
        <button>Buscar</button>

        <select name="genero" id="igenero">
          <option value="" disabled selected>Gênero</option>
          <option value="Drama">Drama</option>
          <option value="Comédia">Comédia</option>
          <option value="Ação">Ação</option>
          <option value="Terror">Terror</option>
          <option value="Ficção Científica">Ficção Científica</option>
          <option value="Romance">Romance</option>
        </select>
        <button>Selecionar</button>
      </form>
    </div>
  </div>
</header>