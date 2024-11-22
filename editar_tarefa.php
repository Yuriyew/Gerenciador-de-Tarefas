<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = $id";
    $result = $mysqli->query($sql);
    $tarefa = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);
    $status = $mysqli->real_escape_string($_POST['status']);

    $sql = "UPDATE tarefas SET titulo='$titulo', descricao='$descricao', status='$status' WHERE id=$id";
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
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../Estaciositev2/css/editar.css">
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="POST">
        <p>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($tarefa['titulo']) ?>" required>
        </p>
        <p>
            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao" required><?= htmlspecialchars($tarefa['descricao']) ?></textarea>
        </p>
        <p>
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="pendente" <?= $tarefa['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="concluida" <?= $tarefa['status'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
            </select>
        </p>
        <p>
            <button type="submit">Salvar</button>
        </p>
    </form>
</body>
</html>
