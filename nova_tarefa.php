<?php
include("../Estaciositev2/conexao.php");


if (!isset($_SESSION)) {
    session_start();
}


if (!isset($_SESSION['id'])) {
    header("Location: protect.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);
    $usuario_id = $_SESSION['id']; 

    
    $sql = "INSERT INTO tarefas (titulo, descricao, usuario_id) VALUES ('$titulo', '$descricao', '$usuario_id')";
    if ($mysqli->query($sql)) {
        header("Location: painel.php");
        exit;
    } else {
        echo "Erro: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tarefa</title>
    <link rel="stylesheet" href="../Estaciositev2/css/nova_tarefa.css">
</head>
<body>
    <h1>Nova Tarefa</h1>
    <form method="POST">
        <p>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" required>
        </p>
        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao" required></textarea>
        </p>
        <p>
            <button type="submit">Adicionar</button>
        </p>
    </form>
</body>
</html>
