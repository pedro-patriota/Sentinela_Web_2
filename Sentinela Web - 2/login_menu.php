<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="styles.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>Login</title>
    <link rel="shortcut icon" href="drawable/apac_logo.png">

</head>


<body>
    <div class="container">
        <img src="drawable/apac_logo.png" class="logo">
        <h1 class="first_phrase">
            Área da gerência
        </h1>
        <form class="form" id="login" action="backend/login.php" method="post">
            <!-- maybe i should insert a action parameter-->
            <h1 class="sub_phrase">Login</h1>
            <div class="message--error">
            
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidLogin") {
                    echo "<p>Usuário ou senha não estão corretos</p>";
                } else if ($_GET["error"] == "emptyinput") {
                    echo '<p>Você não preencheu um espaço ou mais :(</p>';
                } else if ($_GET["error"] == "userdontexist") {
                    echo "<p>Esse usuário não existe >:(</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Um erro inesperado aconteceu ;(</p>";
                }
            }

            ?>
        </div>
            <div class="form__message form__message--error"></div>

            <div class="form__input-group">
                <label><img src="drawable/call.png" class="icon"></label>
                <input type="text" class="form_input" name="name" id="phone_num" autofocus placeholder=" Insira seu nome de usuário ou email" size="35px"><br><br>
            </div>
            
            <div class="form__input-group">
                <label><img src="drawable/lock.png" class="icon"></label>
                <input type="password" class="form_input" name="pwd" autofocus placeholder=" Insira sua senha" size="35px">
            </div>
            <button class="form_button" name="submit" type="submit">Entrar </button>
        </form>
        
    </div>
    <!--<script src="./src/main.js"></script> -->
</body>


</html>