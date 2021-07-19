<?php
    //VERIFICAÇÃO DE LOGIN
    ob_start();
    session_start();
    if(!isset($_SESSION["academyEmail"]) && !isset($_SESSION["academyPassword"])){
        header("Location: ../login_academy.php?reply=denied");
        exit;
    }
    include("../config/exit-academy.php");
    include("../config/change-academy.php");
?>

<?php
    //SELECT DE DADOS DO PERFIL
    include("../config/conection.php");
    $emailLogin = $_SESSION["academyEmail"];
    $passwordLogin = base64_encode($_SESSION["academyPassword"]);
    $select = "SELECT * FROM academys WHERE email_responsavel=:email AND senha_responsavel=:senha";
    try{
        $result = $conect -> prepare($select);
        $result -> bindParam(":email",$emailLogin,PDO::PARAM_STR);
        $result -> bindParam(":senha",$passwordLogin,PDO::PARAM_STR);
        $result -> execute();
        $count = $result -> rowCount();
        if($count > 0){
            while($show = $result -> FETCH(PDO::FETCH_OBJ)){
                $idReturn = $show -> id;
                $nameCompanyReturn = $show -> nome_empresa;
                $emailCompanyReturn = $show -> email_empresa;
                $nameReturn = $show -> nome_responsavel;
                $emailReturn = $show -> email_responsavel;
                $passwordReturn = $show -> senha_responsavel;
                $cepReturn = $show -> cep;
                $stateReturn = $show -> estado;
                $cityReturn = $show -> cidade;
                $addressReturn = $show -> endereco;
                $numberReturn = $show -> numero;
                $districtReturn = $show -> bairro;

                $nameAcademyReturn = $show -> nome_academia;
                $descriptionReturn = $show -> descricao_academia;
                $siteReturn = $show -> site_academia;
                $stateAcademyReturn = $show -> estado_academia;
                $cityAcademyReturn = $show -> cidade_academia;
                $addressAcademyReturn = $show -> endereco_academia;
                $daysAcademyReturn = $show -> dias_academia;
                $hourAcademyReturn = $show -> horario_academia;
                $paymentReturn = $show -> pagamento;
                $logoReturn = $show -> logo_academia;
                $priceMonthlyReturn = $show -> preco_mensal_academia;
                $priceDailyReturn = $show -> preco_diario_academia;
                $ratingReturn = $show -> avaliacoes;
                $starsReturn = $show -> estrelas;
                $generalStarsReturn = $show -> estrelas_gerais;
            }
            $priceDailyReturn = number_format($priceDailyReturn,2,",",".");
            $generalStarsReturn = number_format($generalStarsReturn,1);
        }else{
            echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Houve um erro.</div>';
            exit;
        }
    }catch(PDOException $error){
        echo "HOUVE UM ERRO: " . $error -> getMessage();
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
    <meta name="description" content="Dashboard - Fortify">
    <meta name="keywords" content="Fortify, Academias, Serviços, Musculação, Treino">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="shortcut icon" href="../img/logo-fortify-favicon.png" type="image/x-icon">
    <title>Fortify</title>
</head>
<body>
    <header class="header" id="header">
        <nav class="menu">
            <button class="open-menu" id="open-menu"><span class="fas fa-bars"></span></button>
            <h2 class="title">Fortify</h2>
        </nav>
        
        <nav class="menu-mobile" id="menu-mobile">
            <a class="close-menu" id="close-menu"><span class="fas fa-times"></span></a>
            <section class="media">
                <div class="media-img">
                    <img src="../img/logo-fortify.png" alt="Logo - Fortify" title="Logo - Fortify">
                </div>
                <div class="media-icon">
                    <a href="#" target="blank" class="icon"><span class="fab fa-facebook-f"></span></a>
                    <a href="#" target="blank" class="icon"><span class="fab fa-twitter"></span></a>
                    <a href="#" target="blank" class="icon"><span class="fab fa-instagram"></span></a>
                    <a href="#" target="blank" class="icon"><span class="fab fa-youtube"></span></a>
                    <a href="#" target="blank" class="icon"><span class="fab fa-linkedin"></span></a>
                </div>
            </section>
            <ul>
                <li><a href="home-academy.php" class="bold" id="link1"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="home-academy.php?pg=edit" class="bold" id="link2"><i class="fas fa-user"></i> Perfil</a></li>
                <li id="search-academy"><a class="bold" id="link3"><i class="fas fa-search"></i> Pesquisar Agendamentos</a></li>
                <form method="GET" class="form-search" id="form-search">
                    <div>
                        <input type="search" name="search" id="search" class="search" placeholder="Pesquisar por nome, cpf ou data...">
                        <button type="submit" name="btn-search" class="icon-search"><span class="fas fa-search"></span></button>
                    </div>
                    <a class="close-search" id="close-search"><span class="fas fa-times"></span></a>
                    
                    <?php
                        if(isset($_GET["btn-search"])){
                            $question = isset($_GET["search"]) ? $_GET["search"] : "nada";
                            header("Location: home-academy.php?pg=search&q=$question");
                        }
                    ?>
                </form>   
            </ul>
        </nav>
    </header>
    <a href="#header" class="btn-back" id="btn-back"><span class="fas fa-arrow-up"></span></a>