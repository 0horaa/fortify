<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="Junte-se à Fortify, sendo você um cliente ou uma empresa! Saia do zero e expanda seu tamanho muscular e empresarial!">
    <meta name="keywords" content="Fortify, Academias, Serviços, Musculação, Treino">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-fortify-favicon.png" type="image/x-icon">
    <title>Bem-vindo à Fortify!</title>
</head>
<body>
    <a href="#header" type="click" class="btn-back" id="btn-back"><span class="fas fa-arrow-up"></span></a>
    <header class="header" id="header">
        <nav class="menu">
            <button class="open-menu" id="open-menu"><span class="fas fa-bars"></span></button>
            <h2 class="title">Fortify</h2>
        </nav>
        
        <nav class="menu-mobile" id="menu-mobile">
            <a class="close-menu" id="close-menu"><span class="fas fa-times"></span></a>
            <section class="media">
                <div class="media-img">
                    <img src="img/logo-fortify.png" alt="Logo - Fortify" title="Logo - Fortify">
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
                <li><a href="#service1" class="bold" id="link1">Quem somos?</a></li>
                <li><a href="#service2" class="bold" id="link2">O que é a Fortify?</a></li>
                <li class="log"><a href="login.php" class="login">Faça Login!</a></li>
                <li class="cad"><a href="register.php" class="cadastro">Não está cadastrado?</a></li> 
                <li class="cad"><a href="register_academy.php" class="cadastro">Trabalhe conosco!</a></li>   
                <li class="cad"><a href="login_academy.php" class="cadastro">Login empresarial!</a></li>   
            </ul>
        </nav>
    </header>

    <section class="slidershow">
        <section class="slides">
            <div class="slide" id="s1">
                <img src="img/slide1.jpg" alt="Levantando Supino" width="100%">
                <div><h2 id="slide-title1">Bem-vindo à Fortify!</h2></div>
            </div>
            <div class="slide" id="s2">
                <img src="img/slide2.jpg" alt="Levantando Supino" width="100%">
                <div><h2 id="slide-title2">Potencialize sua rotina de treinos!</h2></div>
            </div>
            <div class="slide" id="s3">
                <img src="img/slide3.jpg" alt="Levantando Supino" width="100%">
                <div><h2 id="slide-title3">Cadastre-se abaixo e encontre sua melhor forma!</h2></div>
            </div>
        </section>
        <section class="slide-buttons" id="slide-buttons">
            <button type="click" id="btn1"></button>
            <button type="click" id="btn2"></button>
            <button type="click" id="btn3"></button>
        </section>
    </section>

    <main class="main">
        <section class="service" id="service1">
            <div class="title-service"><h2>Quem somos?</h2></div>
            <article class="box-service">
                <p>Somos uma empresa dedicada a criar uma interação entre as <strong>Academias</strong> e o <strong>Cliente</strong>. Com nossos serviços, é possível estabelecer uma conexão maior com diversas academias e usuários, construindo um trabalho produtivo para os dois lados.</p>
                <a href="login.php">Faça login aqui!</a>
            </article>
        </section>
        <section class="service" id="service2">
            <div class="title-service"><h2>O que é a Fortify?</h2></div>
            <article class="box-service">
                <p>A <strong>Fortify</strong> é um serviço dedicado às academias que se preocupam com a qualidade do treinamento do cliente, assim como aos clientes que enxergam nas academias uma possibilidade de avanço e progresso. Com a Fortify, você pode visualizar os horários das academias e marcar um horário conveniente pra você! O cadastro é grátis, você só paga quando marca um horário.</p>
                <a href="login.php">Faça login aqui também!</a>
            </article>
        </section>
        <section>
            <div class="title-service"><h2>Cadastre-se!</h2></div>
            <article class="box-service">
                <p>Com o trabalho da <strong>Fortify</strong>, você tem a autonomia de planejar e organizar sua rotina de treinos! Podendo variar de academias com base em seu horário e disponibilidade, construindo uma jornada eficiente para potencializar o seu progresso!</p>
                <a href="register.php">Faça o cadastro aqui!</a>
            </article>
        </section>       
    </main>

    <footer class="footer">
        <div class="media-pc mid">
            <a href="#" target="blank" class="icon-pc"><span class="fab fa-facebook-f"></span></a>
            <a href="#" target="blank" class="icon-pc"><span class="fab fa-twitter"></span></a>
            <a href="#" target="blank" class="icon-pc"><span class="fab fa-instagram"></span></a>
            <a href="#" target="blank" class="icon-pc"><span class="fab fa-youtube"></span></a>
            <a href="#" target="blank" class="icon-pc"><span class="fab fa-linkedin"></span></a>
        </div>
        <hr>
        <p>2021 - Fortify © - Todos os direitos reservados.</p>
    </footer>

    <script src="js/all.js"></script>
    <script src="js/main.js"></script>
</body>
</html>