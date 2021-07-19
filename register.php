<?php
    ob_start();
    session_start();
    require_once("config/mailer/PHPMailer.php");
    require_once("config/mailer/SMTP.php");
    require_once("config/mailer/Exception.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer();
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
    <meta name="description" content="Cadastre-se, potencialize sua rotina de treinos!">
    <meta name="keywords" content="Fortify, Academias, Serviços, Musculação, Treino">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="img/logo-fortify-favicon.png" type="image/x-icon">
    <title>Cadastre-se na Fortify!</title>
    <style>
        @keyframes spin{
            to{
                transform:rotate(360deg);
            }
        }
        .loading{
            width:100%;
            height:100%;
            position:fixed;
            background: #232323;;
            top:0;
            right:0;
            z-index:1;
            display:none;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .spinner{
            width:8rem;
            height:8rem;
            border:20px solid rgba(255,255,255,0.1);
            border-top-color:#F50057;
            border-radius:50%;
            animation:spin 1s linear infinite;
        }
        .message-loading{
            margin-top:1%;
            font-size:120%;
            color:#F50057;
        }
    </style>
</head>
<body class="body">

<div class="alert-top alert-green display-none" id="alert">
    <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
    <p class="alert-top-text"></p>
</div>
<section class="loading" id="loading">
    <div class="spinner"></div>
    <p class="message-loading">Aguarde...</p>
</section>
    <?php 
        if(isset($_GET["r"])){
            $registerPage = $_GET["r"];
            if($registerPage === "page"){
                include_once("register_main.php");
            }else if($registerPage === "confirm"){
                include_once("register_confirm.php");
            }else{
                include_once("register_main.php");
            }
        }else{  
            include_once("register_main.php");
        }
    ?>
    <script src="js/register.js"></script>
    <script src="js/all.js"></script>
</body>
</html>