<?php
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
    <title>Junte-se a nós e organize sua empresa!</title>
</head>

<body class="body">

    <div class="alert-top alert-green display-none" id="alert">
        <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
        <p class="alert-top-text"></p>
    </div>

    <form method="POST" enctype="multipart/form-data" onsubmit="return validateRegister()" name="form-academy" id="form-academy" class="form">
        <h1 class="title-register">Trabalhe conosco!</h1>

        <h2 class="title-academy">Identificação</h2>
        <label for="name-company" class="lbl">Nome da empresa:</label>
        <input type="text" name="nameCompany" id="name-company" placeholder="Nome da empresa..." onkeypress="pressNameCompany()" onkeyup="pressNameCompany()">
        <p class="error" id="error-name-company"></p>

        <label for="email-company" class="lbl">E-mail comercial da empresa:</label>
        <input type="email" name="emailCompany" id="email-company" placeholder="seuemail@gmail.com" onkeypress="pressEmailCompany()" onkeyup="pressEmailCompany()">
        <p class="error" id="error-email-company"></p>

        <label for="user-name" class="lbl">Nome e sobrenome do responsável:</label>
        <input type="text" name="userName" id="user-name" placeholder="Informe seu nome..." onkeypress="pressUserName()" onkeyup="pressUserName()">
        <p class="error" id="error-user-name"></p>

        <label for="user-email" class="lbl">E-mail do responsável:</label>
        <input type="email" name="userEmail" id="user-email" placeholder="seuemail@gmail.com" onkeypress="pressUserEmail()" onkeyup="pressUserEmail()">
        <p class="error" id="error-user-email"></p>

        <label for="user-password" class="lbl">Senha:</label>
        <input type="password" name="userPassword" id="user-password" autocomplete="off" onkeypress="pressPassword()" onkeyup="pressPassword()">
        <p class="error" style="color:#232223">Use uma senha segura, combinando diversos tipos de caracteres e símbolos</p>
        <div class="check">
            <label for="checkbox" class="lbl-check">Mostrar senha</label>
            <input type="checkbox" name="checkbox" id="checkbox" onclick="showPass();">
        </div>
        <p class="error" id="error-password"></p>

        <h2 class="title-academy" style="margin-top:4%;">Endereço</h2>
        <label for="cep" class="lbl">CEP:</label>
        <input type="text" name="cep" id="cep" placeholder="Digite seu CEP..." autocomplete="off" maxlength="9" onpaste="return false" ondrop="return false" maxlength="9" onkeypress="pressCep();maskCep();" onkeyup="pressCep();maskCep();">
        <!--onpaste e ondrop acima no input impedem que o usuário cole texto ou arraste texto pra dentro do input-->
        <p class="error" id="error-cep"></p>

        <label for="state" class="lbl">Estado</label>
        <select name="state" id="state">
            <option value="AC" checked="">AC</option>
            <option value="AL">AL</option>
            <option value="AM">AM</option>
            <option value="AP">AP</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MG">MG</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="RS">RS</option>
            <option value="SC">SC</option>
            <option value="SE">SE</option>
            <option value="SP">SP</option>
            <option value="TO">TO</option>
        </select>

        <label for="city" class="lbl">Cidade:</label>
        <input type="text" name="city" id="city" placeholder="Cidade de atuação da empresa..." onkeypress="pressCity()" onkeyup="pressCity()">
        <p class="error" id="error-city"></p>
        <label for="address" class="lbl">Endereço da empresa:</label>
        <input type="text" name="address" id="address" placeholder="Rua em que se encontra..." onkeypress="pressAddress()" onkeyup="pressAddress()">
        <p class="error" id="error-address"></p>
        <label for="number" class="lbl">N° do endereço:</label>
        <input type="number" name="number" id="number" placeholder="Número..." onkeypress="pressNumber()" onkeyup="pressNumber()">
        <p class="error" id="error-number"></p>
        <label for="district" class="lbl">Bairro:</label>
        <input type="text" name="district" id="district" placeholder="Bairro em que se encontra..." onkeypress="pressDistrict()" onkeyup="pressDistrict()">
        <p class="error" id="error-district"></p>

        <h2 class="title-academy" style="margin-top:4%;">Dados da academia</h2>
        <label for="name-academy" class="lbl">Nome da Academia:</label>
        <input type="text" name="nameAcademy" id="name-academy" placeholder="Nome da sua academia..." onkeypress="pressNameAcademy()" onkeyup="pressNameAcademy()">
        <p class="error" id="error-name-academy"></p>
        <label for="description" class="lbl">Descrição da academia:</label>
        <textarea name="description" id="description" placeholder="Uma descrição dos seus serviços..." onkeypress="pressDescription()" onkeyup="pressDescription()"></textarea>
        <p class="error" id="error-description"></p>
        <label for="site-academy" class="lbl">Site ou rede social da academia(opcional):</label>
        <input type="text" name="siteAcademy" id="site-academy" placeholder="Site da sua academia...">
        <label for="state-academy" class="lbl">Estado onde funciona a academia</label>
        <select name="stateAcademy" id="state-academy">
            <option value="AC" checked="">AC</option>
            <option value="AL">AL</option>
            <option value="AM">AM</option>
            <option value="AP">AP</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MG">MG</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="RS">RS</option>
            <option value="SC">SC</option>
            <option value="SE">SE</option>
            <option value="SP">SP</option>
            <option value="TO">TO</option>
        </select>
        <label for="city-academy" class="lbl">Cidade onde funciona a academia:</label>
        <input type="text" name="cityAcademy" id="city-academy" placeholder="Cidade onde sua academia se encontra..." onkeypress="pressCityAcademy()" onkeyup="pressCityAcademy()">
        <p class="error" id="error-city-academy"></p>
        <label for="address-academy" class="lbl">Endereço da academia:</label>
        <textarea name="addressAcademy" id="address-academy" placeholder="O endereço da sua academia..." onkeypress="pressAddressAcademy()" onkeyup="pressAddressAcademy()"></textarea>
        <p class="error" id="error-address-academy"></p>
        <label for="day-academy" class="lbl">Dias de funcionamento da academia:</label>
        <input type="text" name="dayAcademy" id="day-academy" placeholder="Ex: Segunda a Sexta" onkeypress="pressDay()" onkeyup="pressDay()">
        <p class="error" id="error-day-academy"></p>
        <label for="hour-academy" class="lbl">Horário de funcionamento da academia:</label>
        <input type="text" name="hourAcademy" id="hour-academy" placeholder="Ex: 07:00 as 19:00" onkeypress="pressHour()" onkeyup="pressHour()">
        <p class="error" id="error-hour-academy"></p>
        <label for="payment-academy" class="lbl">Métodos de pagamento suportados pela academia:</label>
        <input type="text" name="paymentAcademy" id="payment-academy" placeholder="Ex: Dinheiro, cartão, etc." onkeypress="pressPayment()" onkeyup="pressPayment()">
        <p class="error" id="error-payment-academy"></p>
        <label for="logo" class="lbl">Logo da Academia:</label>
        <label for="logo" class="file-placeholder" id="file-placeholder">Insira uma imagem</label>
        <p class="error" id="error-logo"></p>
        <input type="file" name="logo" id="logo" accept="image/*" style="display:none" onkeypress="pressLogo()" onkeyup="pressLogo()">
        <label for="price" class="lbl">Preço mensal da academia</label>
        <input type="text" name="price" id="price" placeholder="Preço da sua mensalidade..." onkeypress="pressPrice()" onkeyup="pressPrice()">
        <p class="error" style="color:#232223">Essa informação é importantíssima, pois com ela poderemos identificar a melhor forma de realizar a cobrança diária dos usuários que venham a comprar os seus dias!</p>
        <p class="error" id="error-price"></p>
        <button type="submit" name="btn-academy" class="btn btn-margin-top">Cadastrar sua empresa</button>
        <a href="login_academy.php" class="link-login">Já cadastrou sua empresa? Faça Login!</a>

        <?php
            include("config/conection.php");
            if(isset($_POST["btn-academy"])){
                $nameCompany = $_POST["nameCompany"];
                $emailCompany = $_POST["emailCompany"];
                $nameResponsible = $_POST["userName"];
                $emailResponsible = $_POST["userEmail"];
                $passwordResponsible = base64_encode($_POST["userPassword"]);
                $cepCompany = $_POST["cep"];
                $stateCompany = $_POST["state"];
                $cityCompany = $_POST["city"];
                $addressCompany = $_POST["address"];
                $numberCompany = $_POST["number"];
                $districtCompany = $_POST["district"];

                $nameAcademy = $_POST["nameAcademy"];
                $description = $_POST["description"];
                $site = isset($_POST["siteAcademy"]) ? $_POST["siteAcademy"] : "Nenhum";
                $stateAcademy = $_POST["stateAcademy"];
                $cityAcademy = $_POST["cityAcademy"];
                $addressAcademy = $_POST["addressAcademy"];
                $dayAcademy = $_POST["dayAcademy"];
                $hourAcademy = $_POST["hourAcademy"];
                $paymentAcademy = $_POST["paymentAcademy"];
                $priceMonthly = $_POST["price"];
                $imageFormats = array("png","PNG","jpg","JPG","jpeg","JPEG");
                $extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION); 
                $zero = 0;
                if(in_array($extension, $imageFormats)){
                    $folder = "config/academy/";
                    $temp = $_FILES["logo"]["tmp_name"];
                    $randomName = uniqid() . ".$extension";
                    $priceDay = $priceMonthly / 30;
                    $priceFinal = ($priceDay) + ((20 / 100) * $priceDay);
                    $select = "SELECT * FROM academys WHERE email_responsavel=:email_responsavel_exist";
                    
                    try{
                        $resultSelect = $conect -> prepare($select);
                        $resultSelect -> bindParam(":email_responsavel_exist", $emailResponsible, PDO::PARAM_STR);
                        $resultSelect -> execute();
                        $countSelect = $resultSelect -> rowCount();
                        if($countSelect > 0){
                            echo '
                                <script>
                                    let alert = document.getElementsByClassName("alert-top")[0];
                                    let alertText = document.getElementsByClassName("alert-top-text")[0];
                                    alert.style.display = "flex";
                                    alert.setAttribute("class","alert-top alert-red");
                                    alertText.innerHTML = "Esse email já está sendo utilizado. Use outro email.";
                                </script>
                            ';
                        }else{
                            if(move_uploaded_file($temp, $folder.$randomName)){
                                $insert = "INSERT INTO academys(nome_empresa,email_empresa,nome_responsavel,
                                email_responsavel,senha_responsavel,cep,estado,cidade,endereco,numero,bairro,
                                nome_academia,descricao_academia,site_academia,estado_academia,cidade_academia,
                                endereco_academia,dias_academia,horario_academia,pagamento,logo_academia,
                                preco_mensal_academia,preco_diario_academia,avaliacoes,estrelas,estrelas_gerais)
                                VALUES(:nome_empresa,:email_empresa,:nome_responsavel,:email_responsavel,
                                :senha_responsavel,:cep,:estado,:cidade,:endereco,:numero,:bairro,:nome_academia,
                                :descricao_academia,:site_academia,:estado_academia,:cidade_academia,
                                :endereco_academia,:dias_academia,:horario_academia,:pagamento,
                                :logo_academia,:preco_mensal_academia,:preco_diario_academia,:avaliacoes,:estrelas,:estrelas_gerais)";
                                try{
                                    $resultInsert = $conect -> prepare($insert);
                                    $resultInsert -> bindParam(":nome_empresa",$nameCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":email_empresa",$emailCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":nome_responsavel",$nameResponsible,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":email_responsavel",$emailResponsible,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":senha_responsavel",$passwordResponsible,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":cep",$cepCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":estado",$stateCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":cidade",$cityCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":endereco",$addressCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":numero",$numberCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":bairro",$districtCompany,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":nome_academia",$nameAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":descricao_academia",$description,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":site_academia",$site,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":estado_academia",$stateAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":cidade_academia",$cityAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":endereco_academia",$addressAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":dias_academia",$dayAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":horario_academia",$hourAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":pagamento",$paymentAcademy,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":logo_academia",$randomName,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":preco_mensal_academia",$priceMonthly,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":preco_diario_academia",$priceFinal,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":avaliacoes",$zero,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":estrelas",$zero,PDO::PARAM_STR);
                                    $resultInsert -> bindParam(":estrelas_gerais",$zero,PDO::PARAM_STR);
                                    $resultInsert -> execute();
                                    $countInsert = $resultInsert -> rowCount();
                                    if($countInsert > 0){
                                        echo '<script>window.location.href = "login_academy.php?reply=login";</script>';
                                    }else{
                                        echo '
                                            <script>
                                                let alert = document.getElementsByClassName("alert-top")[0];
                                                let alertText = document.getElementsByClassName("alert-top-text")[0];
                                                alert.style.display = "flex";
                                                alert.setAttribute("class","alert-top alert-red");
                                                alertText.innerHTML = "Algo deu errado. Por favor, tente novamente mais tarde.";
                                            </script>
                                        ';
                                    }
                                }catch(PDOException $error){
                                    echo "ERRO: " . $error -> getMessage();
                                }
                            }else{
                                echo '
                                    <script>
                                        let alert = document.getElementsByClassName("alert-top")[0];
                                        let alertText = document.getElementsByClassName("alert-top-text")[0];
                                        alert.style.display = "flex";
                                        alert.setAttribute("class","alert-top alert-red");
                                        alertText.innerHTML = "Não foi possível enviar essa imagem. Por favor, tente novamente mais tarde.";
                                    </script>
                                ';  
                            }
                        }
                    }catch(PDOException $error){
                        echo "ERRO " . $error -> getMessage();
                    }
                }else{
                    echo '
                        <script>
                            let alert = document.getElementsByClassName("alert-top")[0];
                            let alertText = document.getElementsByClassName("alert-top-text")[0];
                            alert.style.display = "flex";
                            alert.setAttribute("class","alert-top alert-red");
                            alertText.innerHTML = "Formato inválido de imagem. Utilize apenas imagens do tipo PNG, JPG e JPEG.";
                        </script>
                    ';
                }
            }
        ?>
    </form>
    <script src="js/register_academy.js"></script>
    <script src="js/all.js"></script>
</body>

</html>