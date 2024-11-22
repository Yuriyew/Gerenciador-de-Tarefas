<?php
include("conexao.php");


$sql = "SELECT * FROM planos ORDER BY criado_em DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planos</title>
    <link rel="stylesheet" href="../Estaciositev2/css/planos.css">
</head>
<body>
    <header>
        <h1>Planos Disponíveis</h1>
        <a href="index.php">Voltar</a>
    </header>

    <div class="planos-container">
        <?php while ($plano = $result->fetch_assoc()) { ?>
            <div class="plano">
                <h2><?= htmlspecialchars($plano['nome']) ?></h2>
                <p><?= htmlspecialchars($plano['descricao']) ?></p>
                <span>Preço: R$ <?= number_format($plano['preco'], 2, ',', '.') ?></span>
                <button>Escolher Plano</button>
            </div>
        <?php } ?>
    </div>
</body>
</html>
