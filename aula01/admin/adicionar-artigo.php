<?php
// $_POST['titulo'];
// $_POST['conteudo'];
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
// var_dump($_POST['titulo'], $_POST['conteudo']);
require '../config.php';
include '../src/Artigo.php';
require '../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $object = new Artigo($mysql);
    $artigo = $object->adicionar($_POST['titulo'], $_POST['conteudo']);

    redireciona('/admin/index.php?status=add_success');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
            <p>
                <a class="botao botao-block" href="/admin">cancelar</a>
            </p>
        </form>
    </div>
</body>

</html>