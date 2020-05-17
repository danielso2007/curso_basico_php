<?php
require '../config.php';
include '../src/Artigo.php';
$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <div>
            <?php foreach ($artigos as $artigo) : ?>
                <div id="artigo-admin">
                    <p><b>ID:</b> <?php echo $artigo['id']; ?> - <b>Título:</b>: <?php echo $artigo['titulo']; ?></p>
                    <nav>
                        <a class="botao" href="editar-artigo.php?id=<?php echo $artigo['id']; ?>">Editar</a>
                        <a class="botao" href="excluir-artigo.php?id=<?php echo $artigo['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
            <a class="botao botao-block" style="float: right;margin-top: -23px;" href="/">Tela principal</a>
        </div>
    </div>
</body>

</html>