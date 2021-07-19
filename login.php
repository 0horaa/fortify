<?php
    ob_start();
    session_start();
    if(isset($_SESSION["userEmail"]) && isset($_SESSION["userPassword"])){
        header("Location: pages/home.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="Faça login e aproveite agora os serviços gratuitos da Fortify!">
    <meta name="keywords" content="Fortify, Academias, Serviços, Musculação, Treino">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo-fortify-favicon.png" type="image/x-icon">
    <title>Faça login na Fortify!</title>
</head>
<body class="body">
    <form method="POST" class="form-login">
        <h1 class="title-register">Login</h1>
        <label for="email" class="lbl">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email...">
        <label for="password" class="lbl">Senha:</label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha..." autocomplete="off">
        <div class="check">
            <label for="checkbox" class="lbl-check">Mostrar senha</label>
            <input type="checkbox" name="checkbox" id="checkbox" onclick="showPass();">
        </div>
        <button type="submit" name="btn-login" class="btn btn-margin-top">Entrar</button>
        <a href="register.php" class="link-login">Não está cadastrado?</a>

        <?php
        include("config/conection.php");
        if(isset($_GET["reply"])){
            $reply = $_GET["reply"];
            if($reply === "denied"){
                echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Faça login para utilizar o sistema.</div>';
            }else if($reply === "login"){
                echo '<div class="alert alert-green" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Cadastro realizado com sucesso! Faça login para continuar.</div>';
            }else if($reply === "exit"){
                echo '<div class="alert alert-pink" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Você saiu dos nossos serviços. Volte sempre :)</div>';
            }else if($reply === "delete"){
                echo '<div class="alert alert-pink" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Poxa, você deletou sua conta :( Esperamos que volte em algum momento.</div>';
            }else if($reply === "change"){
                echo '<div class="alert alert-green" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Dados alterados com sucesso! Faça login para confirmar as mudanças.</div>';
            }
        }

        if(isset($_POST["btn-login"])){
            $email = filter_input(INPUT_POST,"email",FILTER_DEFAULT);
            $password = base64_encode(filter_input(INPUT_POST,"password",FILTER_DEFAULT));
            $select = "SELECT * FROM users WHERE email=:email AND senha=:senha";
            echo '<script>document.querySelector("#password").type = "password"</script>';
            try{
                $result = $conect -> prepare($select);
                $result -> bindParam(":email",$email,PDO::PARAM_STR);
                $result -> bindParam(":senha",$password,PDO::PARAM_STR);
                $result -> execute();

                $count = $result -> rowCount();
                if($count > 0){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $_SESSION["userEmail"] = $email;
                    $_SESSION["userPassword"] = $password;
                    echo '<script>document.querySelector("#alert").style.display = "none"</script>';
                    echo '<div class="alert alert-green" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Tudo ok! Você será redirecionado para o sistema.</div>';
                    header("Refresh: 3, pages/home.php?pg=home");
                }else{
                    echo '<script>document.querySelector("#alert").style.display = "none"</script>';
                    echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>E-mail ou senha incorretos :(</div>';
                }
            }catch(PDOException $error){
                echo "<strong>HOUVE UM ERRO</strong>" . $error -> getMessage();
            }
        }
    ?>
    </form>
    <script>
        function closeAlert(){
            var alert = document.querySelector("#alert");
            alert.style.display = "none";
        }
        function showPass(){
            let input = document.querySelector("#password");
            if(input.type === "password"){
                input.type = "text";
            }else{
                input.type = "password";
            }
        }
    </script>
    <script src="js/all.js"></script>
</body>
</html>