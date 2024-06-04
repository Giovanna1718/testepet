<?php
    // include_once "topo.html";
    include_once "config/conexao.php";
?>

<?php

include('conexao.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste_login";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['enviar'])) {
    $username = $_POST['email'];
    $password = $_POST['senha'];

    // Consulta SQL com prepared statement
    $sql = "SELECT * FROM usuarios WHERE user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário encontrado, verificar a senha
        $user = $result->fetch_assoc();
        if ($user["senha"] == $password) {
            echo "<script>alert('Login bem-sucedido para o usuário: ' . $username');</script>";
            header("Location: logado.php");
            exit();
        } else {
            echo "<script>alert('Nome de usuário ou senha incorretos. Tente novamente.');</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado. Tente novamente.');</script>";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Pet</title>
    <!-- <link rel="stylesheet" href="css/styleindex.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="img/favicon/favicon.ico" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
        }

        .card-container {
            perspective: 1000px;
        }

        .card {
            margin: 10%;
            background-color: white;
            border-radius: 10px;
            padding: 10px;   
            width: 80%; 
            margin-left: auto; margin-right: auto;
            transform-style: preserve-3d;
            transition: transform 0.6s;
            /* height: 200px; */
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .card .front,
        .card .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card .back {
            transform: rotateY(180deg);
        }

        .flipped {
            transform: rotateY(180deg);
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <main>
        <div class="titulo">
            <h1>Portal de Acesso Administrativo</h1>
        </div>

        <div class="card-container">
            <div class="card">
                <div class="front">
                    <h1><i class="fa-solid fa-paw"></i> Login</h1>
                    <br /><br />
                    <button id="flip-button"><i class="fa-solid fa-repeat"></i> Clientes</button>
                    <br><br>
                    <label for="email" class="label-email">E-mail</label><br>
                    <div class="inputs">
                        <i class="fa-solid fa-user"></i><input name="email" class="email" type="email" placeholder="E-mail" /><br /><br />
                    </div>
                    <label for="senha" class="label-senha">Senha</label><br>
                    <div class="inputs">
                        <i class="fa-solid fa-lock"></i><input name="senha" class="senha" type="password" placeholder="Senha"/><br /><br />
                    </div>
                    <div class="botao">
                        <button name="enviar" class="enviar">Enviar</button>
                    </div>
                </div>
                <div class="back">
                    <h1><i class="fa-solid fa-paw"></i> Login</h1>
                    <br /><br />
                    <button id="flip-button-back"><i class="fa-solid fa-repeat"></i> Colaboradores</button>
                    <label for="email" class="label-email">E-mail</label><br>
                    <div class="inputs">
                        <i class="fa-solid fa-user"></i><input name="email" class="email" type="email" placeholder="E-mail" /><br /><br />
                    </div>
                    <label for="senha" class="label-senha">Senha</label><br>
                    <div class="inputs">
                        <i class="fa-solid fa-lock"></i><input name="senha" class="senha" type="password" placeholder="Senha"/><br /><br />
                    </div>
                    <div class="botao">
                        <button name="enviar" class="enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('flip-button').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.card').classList.toggle('flipped');
        });
        document.getElementById('flip-button-back').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.card').classList.toggle('flipped');
        });
    </script>
</body>
</html>

<?php
    include_once "rodape.html";
?>
