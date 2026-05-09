<?php
    function filtrar(){
        echo '<div class="buscar">';
        echo '<form action="index.php" method="get">';
        echo '<input type="text" name="nome" id="inome" placeholder="Buscar por uma série">';
        echo '<button>Buscar</button>';
        echo '<select name="genero" id="igenero">';
            echo '<option value="" disabled selected>Gênero</option>';
            echo '<option value="Drama">Drama</option>';
            echo '<option value="Comédia">Comédia</option>';
            echo '<option value="Ação">Ação</option>';
            echo '<option value="Terror">Terror</option>';
            echo '<option value="Ficção Científica">Ficção Científica</option>';
            echo '<option value="Romance">Romance</option>';
        echo '</select>';
        echo '<button>Buscar</button>';
        echo '</form>';
        echo '</div>';
    }
?>