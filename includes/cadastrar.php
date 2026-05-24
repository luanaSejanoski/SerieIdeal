<?php
  // session_start();
  // require_once '../includes/dados.php';

  

    // $series = $series ?? [];//verifica se séries existe
    // $seriesSessao = $_SESSION["series"] ?? [];//verifica se a sessão séries existe
    // $catalogo = array_merge($series, $seriesSessao);//junto os arrays



    $dados = $_SESSION["dadosFormulario"] ?? [];

    $titulo = $dados["titulo"] ?? '';
    $genero = $dados["genero"] ?? '';
    $imagem = $dados["imagem"] ?? '';
    $descricao = $dados["descricao"] ?? '';
    $descricaoMenor = $dados["descricaoMenor"] ?? '';

    unset($_SESSION["dadosFormulario"]);
?>
<?php
//mostra erro
foreach ($erros as $erro) {
  echo "<p class='erro'>" . htmlspecialchars($erro) . "</p>";
}
//mostra sucesso
if ($sucesso) {
  echo "<p class='sucesso'>" . htmlspecialchars($sucesso) . "</p>";
}
?>