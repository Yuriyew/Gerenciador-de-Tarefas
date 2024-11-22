<?php
include("conexao.php");
if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    
    header("Location: protect.php");
    exit; 
}


$sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY criado_em DESC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="../Estaciositev2/css/painel.css">
</head>
<body>
    <div id="user">
        <h1><?php echo htmlspecialchars($_SESSION['nome']); ?></h1>
        <img src="../Estaciositev2/img/iconpessoa.png" alt="">
        <p>
            <a href="../Estaciositev2/logout.php">Sair</a>
        </p>
    </div>
 
    <h1>Gerenciamento de Tarefas</h1>

    <a href="nova_tarefa.php">Adicionar Nova Tarefa</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        <?php while ($tarefa = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
            <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
            <td><?= htmlspecialchars($tarefa['status']) ?></td>
            <td><?= htmlspecialchars($tarefa['criado_em']) ?></td>
            <td>
                <a href="editar_tarefa.php?id=<?= $tarefa['id'] ?>">Editar</a> 
                <a href="excluir_tarefa.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
