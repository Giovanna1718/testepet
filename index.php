
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo Pet</title>
    <link rel="shortcut icon" type="imege/svg" href="image/dog-solid.svg"/>
    <link rel="stylesheet" href="css/styleindex.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="img/favicon/favicon.ico" />
</head>
<body>
    <header>
    <i class="fa-solid fa-dog"></i>
        <h1>Mundo PET</h1>
    </header>
    <br>
    <main>
        <br>
        <div class="titulo">
        <a href="Crud_Visitas.php"><h1 class="text-h1">Portal de Acesso Administrativo</h1></a>
        </div>  

        <div class="card-container">
            <div class="login card" id="card">
                <div class="front">
                    <form method="POST">
                        <div class="inicio">
                            <div class="text_login"> 
                                <h1><i class="fa-solid fa-paw"></i> Login</h1>
                            </div>
                            <button id="flip-button" class="change-text-button"><i class="fa-solid fa-repeat"></i> Clientes</button>
                        </div>
                        <div class="text-container" id="text-container">
                            Login como Cliente
                        </div>
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
                    </form>
                </div>
                <div class="back">
                    <form method="POST">
                        <div class="inicio">
                            <div class="text_login"> 
                                <h1><i class="fa-solid fa-paw"></i> Login</h1>
                            </div>
                            <button id="flip-button-back" class="change-text-button"><i class="fa-solid fa-repeat"></i> Colaboradores</button>
                        </div>
                        <div class="text-container" id="text-container-back">
                            Login como Colaborador
                        </div>
                        <br><br>
                        <label for="email-back" class="label-email">E-mail</label><br>
                        <div class="inputs">
                            <i class="fa-solid fa-user"></i><input name="email" class="email" type="email" placeholder="E-mail" /><br /><br />
                        </div>
                        <label for="senha-back" class="label-senha">Senha</label><br>
                        <div class="inputs">
                            <i class="fa-solid fa-lock"></i><input name="senha" class="senha" type="password" placeholder="Senha"/><br /><br />
                        </div>
                        <div class="botao">
                        <button name="enviar" class="enviar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>

