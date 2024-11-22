<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["id"])) {
    echo '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Restrito</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                background-color: #ffffff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 80%;
                max-width: 500px;
            }
            
            p {
                font-size: 18px;
                color: #333;
                margin-top: 20px;
            }
            a {
                color: #3498db;
                text-decoration: none;
                font-weight: bold;
                font-size: 18px;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <p>Você não pode acessar esta página porque não está logado.</p>
            <p><a href="login.php">Clique aqui para entrar</a></p>
        </div>
    </body>
    </html>';
    exit;
}
?>
