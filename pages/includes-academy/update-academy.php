<div class="alert-top alert-green display-none" id="alert" style="padding:1% 2.5%;">
    <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
    <p class="alert-top-text">Dados alterados com sucesso!</p>
</div>
<section class="edit" style="align-items:flex-start;">
    <section class="information-profile">
    <div class="title-profile first-tp"><h2>Academia e Empresa</h2></div>
        <section class="profile">
            <section class="image-profile"> 
                    <span class="image-circle">
                        <img src="../config/academy/<?php echo $logoReturn;?>" title="Logo">
                    </span>
            </section>
            <section class="info-profile">
                <h2 class="info bottom"><?php echo $nameAcademyReturn . " - Academia";?></h2>
                <h3 class="info font-normal bottom"><?php echo $descriptionReturn;?></h3>
                <h4 class="info font-normal" id="site-academy"><a href="<?php echo $siteReturn?>" target="_blank" class="color text-dec"><i class="fas fa-globe-americas"></i> Site da academia</a>
                    <?php
                        if($siteReturn === "Nenhum" || $siteReturn === ""){
                            echo '<script>document.querySelector("#site-academy").innerHTML = ""</script>';
                        }
                    ?>
                </h4>
                <h4 class="info font-normal"><i class="fas fa-map-marker-alt"></i> <?php echo "<strong>$stateAcademyReturn</strong>" . " - " . $cityAcademyReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-map"></i> Endereço: </strong><?php echo $addressAcademyReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-calendar-week"></i> Dias de funcionamento: </strong> <?php echo $daysAcademyReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-clock"></i> Horário de funcionamento: </strong> <?php echo $hourAcademyReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-dollar-sign"></i> Métodos de pagamento: </strong> <?php echo $paymentReturn;?></h4>  
                <h4 class="info font-normal"><strong><i class="fas fa-dollar-sign"></i> Preço mensal: </strong> <?php echo $priceMonthlyReturn;?></h4> 
                <h4 class="info font-normal"><strong><i class="fas fa-dollar-sign"></i> Preço diário: </strong> R$ <?php echo $priceDailyReturn;?></h4> 
                <h4 class="info font-normal"><strong><i class="fas fa-star-half-alt"></i> N° de avaliações: </strong> <?php echo $ratingReturn;?></h4> 
                <h4 class="info font-normal bottom"><strong><i class="fas fa-star"></i> Avaliação geral: </strong> <?php echo $generalStarsReturn;?></h4> 
                        
                <h2 class="info bottom"><?php echo $nameCompanyReturn . " - Empresa";?></h2>
                <h4 class="info font-normal"><strong> Email da empresa: </strong><?php echo $emailCompanyReturn;?></h4>
                <h4 class="info font-normal"><strong> Nome do responsável: </strong><?php echo $nameReturn;?></h4>
                <h4 class="info font-normal"><strong> Email do responsável: </strong><?php echo $emailReturn;?></h4>
                <h4 class="info font-normal"><strong> CEP da empresa: </strong><?php echo $cepReturn;?></h4>
                <h4 class="info font-normal"><strong> Localização da empresa: </strong><?php echo $stateReturn . " - " . $cityReturn;?></h4>
                <h4 class="info font-normal"><strong> Endereço da empresa: </strong><?php echo $addressReturn . " - N° " . $numberReturn;?></h4>
                <h4 class="info font-normal"><strong> Bairro da empresa: </strong><?php echo $districtReturn;?></h4>
                <div class="info info-buttons">
                    <a href="?exit" class="exit"><i class="fas fa-door-open"></i> Sair</a>
                    <a class="delete" onclick="openModal()"><i class="fas fa-trash-alt"></i> Deletar Conta</a>
                </div>       
                <section class="modal-delete" id="modal-delete">
                    <div class="modal-container" id="modal-container">
                        <div class="modal-header">
                            Tem certeza de que quer apagar sua academia permanentemente dos nossos serviços? Essa ação não poderá ser desfeita.                        
                        </div>
                        <div class="modal-content">
                            <div class="modal-content-options">
                                <button type="click" onclick="closeModal()"><i class="fas fa-window-close"></i> Cancelar</button>
                                <a href="includes-academy/delete-academy.php?delete"><i class="fas fa-check-square"></i> Deletar</a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
    <section class="form-profile">
        <div class="title-profile" id="title-profile"><h2 style="margin-left:1%;">Editar seus dados</h2></div>
        <form method="POST" enctype="multipart/form-data" onsubmit="return validateRegister()" name="form-academy" id="form-academy" class="form-update">

            <label for="name-company" class="lbl">Nome da empresa:</label>
            <input type="text" name="nameCompany" value="<?php echo $nameCompanyReturn;?>"id="name-company" placeholder="Nome da empresa..." onkeypress="pressNameCompany()" onkeyup="pressNameCompany()">
            <p class="error" id="error-name-company"></p>

            <label for="email-company" class="lbl">E-mail comercial da empresa:</label>
            <input type="email" name="emailCompany" value="<?php echo $emailCompanyReturn;?>" id="email-company" placeholder="seuemail@gmail.com" onkeypress="pressEmailCompany()" onkeyup="pressEmailCompany()">
            <p class="error" id="error-email-company"></p>

            <label for="user-name" class="lbl">Nome e sobrenome do responsável:</label>
            <input type="text" name="userName" value="<?php echo $nameReturn;?>" id="user-name" placeholder="Informe seu nome..." onkeypress="pressUserName()" onkeyup="pressUserName()">
            <p class="error" id="error-user-name"></p>

            <label for="user-email" class="lbl">E-mail do responsável:</label>
            <input type="email" name="userEmail" value="<?php echo $emailReturn;?>" id="user-email" placeholder="seuemail@gmail.com" onkeypress="pressUserEmail()" onkeyup="pressUserEmail()">
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
            <input type="text" name="cep" value="<?php echo $cepReturn;?>" id="cep" placeholder="Digite seu CEP..." autocomplete="off" maxlength="9" onpaste="return false" ondrop="return false" maxlength="9" onkeypress="pressCep();maskCep();" onkeyup="pressCep();maskCep();">
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
            <input type="text" name="city" value="<?php echo $cityReturn;?>" id="city" placeholder="Cidade de atuação da empresa..." onkeypress="pressCity()" onkeyup="pressCity()">
            <p class="error" id="error-city"></p>
            <label for="address" class="lbl">Endereço da empresa:</label>
            <input type="text" name="address" value="<?php echo $addressReturn;?>" id="address" placeholder="Rua em que se encontra..." onkeypress="pressAddress()" onkeyup="pressAddress()">
            <p class="error" id="error-address"></p>
            <label for="number" class="lbl">N° do endereço:</label>
            <input type="number" name="number" value="<?php echo $numberReturn;?>" id="number" placeholder="Número..." onkeypress="pressNumber()" onkeyup="pressNumber()">
            <p class="error" id="error-number"></p>
            <label for="district" class="lbl">Bairro:</label>
            <input type="text" name="district" value="<?php echo $districtReturn;?>" id="district" placeholder="Bairro em que se encontra..." onkeypress="pressDistrict()" onkeyup="pressDistrict()">
            <p class="error" id="error-district"></p>

            <h2 class="title-academy" style="margin-top:4%;">Dados da academia</h2>
            <label for="name-academy" class="lbl">Nome da Academia:</label>
            <input type="text" name="nameAcademy" value="<?php echo $nameAcademyReturn;?>" id="name-academy" placeholder="Nome da sua academia..." onkeypress="pressNameAcademy()" onkeyup="pressNameAcademy()">
            <p class="error" id="error-name-academy"></p>
            <label for="description" class="lbl">Descrição da academia:</label>
            <textarea name="description" id="description" placeholder="Uma descrição dos seus serviços..." onkeypress="pressDescription()" onkeyup="pressDescription()"><?php echo $descriptionReturn;?></textarea>
            <p class="error" id="error-description"></p>
            <label for="site-academy" class="lbl">Site ou rede social da academia(opcional):</label>
            <input type="text" name="siteAcademy" value="<?php echo $siteReturn;?>" id="site-academy" placeholder="Site da sua academia...">
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
            <input type="text" name="cityAcademy" value="<?php echo $cityAcademyReturn;?>" id="city-academy" placeholder="Cidade onde sua academia se encontra..." onkeypress="pressCityAcademy()" onkeyup="pressCityAcademy()">
            <p class="error" id="error-city-academy"></p>
            <label for="address-academy" class="lbl">Endereço da academia:</label>
            <textarea name="addressAcademy" id="address-academy" placeholder="O endereço da sua academia..." onkeypress="pressAddressAcademy()" onkeyup="pressAddressAcademy()"><?php echo $addressAcademyReturn;?></textarea>
            <p class="error" id="error-address-academy"></p>
            <label for="day-academy" class="lbl">Dias de funcionamento da academia:</label>
            <input type="text" name="dayAcademy" value="<?php echo $daysAcademyReturn;?>" id="day-academy" placeholder="Ex: Segunda a Sexta" onkeypress="pressDay()" onkeyup="pressDay()">
            <p class="error" id="error-day-academy"></p>
            <label for="hour-academy" class="lbl">Horário de funcionamento da academia:</label>
            <input type="text" name="hourAcademy" value="<?php echo $hourAcademyReturn;?>" id="hour-academy" placeholder="Ex: 07:00 as 19:00" onkeypress="pressHour()" onkeyup="pressHour()">
            <p class="error" id="error-hour-academy"></p>
            <label for="payment-academy" class="lbl">Métodos de pagamento suportados pela academia:</label>
            <input type="text" name="paymentAcademy" value="<?php echo $paymentReturn;?>" id="payment-academy" placeholder="Ex: Dinheiro, cartão, etc." onkeypress="pressPayment()" onkeyup="pressPayment()">
            <p class="error" id="error-payment-academy"></p>
            <label for="logo" class="lbl">Logo da Academia:</label>
            <label for="logo" class="file-placeholder" id="file-placeholder">Insira uma imagem</label>
            <p class="error" id="error-logo"></p>
            <input type="file" name="logo" id="logo" accept="image/*" style="display:none" onkeypress="pressLogo()" onkeyup="pressLogo()">
            <label for="price" class="lbl">Preço mensal da academia</label>
            <input type="text" name="price" value="<?php echo $priceMonthlyReturn;?>" id="price" placeholder="Preço da sua mensalidade..." onkeypress="pressPrice()" onkeyup="pressPrice()">
            <p class="error" style="color:#232223">Essa informação é importantíssima, pois com ela poderemos identificar a melhor forma de realizar a cobrança diária dos usuários que venham a comprar os seus dias!</p>
            <p class="error" id="error-price"></p>
            <button type="submit" name="btn-academy-update" class="btn btn-margin-top">Atualizar seus dados</button>
        </form>
        <?php
            if(isset($_POST["btn-academy-update"])){
                $nameCompany = $_POST["nameCompany"];
                $emailCompany = $_POST["emailCompany"];
                $nameResponsible = $_POST["userName"];
                $emailResponsible = $_POST["userEmail"];
                $passwordResponsible = base64_encode($_POST["userPassword"]);
                $passwordFinal = $passwordResponsible != null ? $passwordResponsible : $passwordReturn;
                $cepCompany = $_POST["cep"];
                $stateCompany = $_POST["state"];
                $cityCompany = $_POST["city"];
                $addressCompany = $_POST["address"];
                $numberCompany = $_POST["number"];
                $districtCompany = $_POST["district"];

                $nameAcademy = $_POST["nameAcademy"];
                $description = $_POST["description"];
                $site = $_POST["siteAcademy"] != "Nenhum" || $_POST["siteAcademy"] != null ? $_POST["siteAcademy"] : "Nenhum";
                $stateAcademy = $_POST["stateAcademy"];
                $cityAcademy = $_POST["cityAcademy"];
                $addressAcademy = $_POST["addressAcademy"];
                $dayAcademy = $_POST["dayAcademy"];
                $hourAcademy = $_POST["hourAcademy"];
                $paymentAcademy = $_POST["paymentAcademy"];
                $priceMonthly = $_POST["price"];
                $priceDay = $priceMonthly / 30;
                $priceFinal = ($priceDay) + ((20 / 100) * $priceDay);

                if(!empty($_FILES["logo"]["name"])){
                    $imageFormats = array("png","PNG","jpg","JPG","jpeg","JPEG");
                    $extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
                    if(in_array($extension,$imageFormats)){
                        unlink("../config/academy/$logoReturn"); //DELETA A FOTO ANTIGA
                        $folder = "../config/academy/";
                        $temp = $_FILES["logo"]["tmp_name"];
                        $randomName = uniqid() . ".$extension";
                        if(move_uploaded_file($temp, $folder.$randomName)){
                            
                        }else{
                            echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Não foi possível enviar a imagem. Tente novamente mais tarde.</div>';
                        }
                    }else{
                        echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Formato inválido de imagem :(</div>';
                    }
                }else{
                    $randomName = $logoReturn;
                }

                $select = "SELECT * FROM academys WHERE email_responsavel=:email_responsavel_exist";
                    
                    try{
                        if($emailResponsible !== $emailReturn){
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
                                if($emailResponsible !== $emailReturn || $passwordFinal !== $passwordReturn){
                                    updateData($nameCompany,$emailCompany,$nameResponsible,$emailResponsible,$passwordFinal,$cepCompany,$stateCompany,$cityCompany,$addressCompany,$numberCompany,$districtCompany,$nameAcademy,$description,$site,$stateAcademy,$cityAcademy,$addressAcademy,$dayAcademy,$hourAcademy,$paymentAcademy,$randomName,$priceMonthly,$priceFinal,$idReturn);
                                    header("Refresh: 0, ?change");
                                }else{
                                    updateData($nameCompany,$emailCompany,$nameResponsible,$emailResponsible,$passwordFinal,$cepCompany,$stateCompany,$cityCompany,$addressCompany,$numberCompany,$districtCompany,$nameAcademy,$description,$site,$stateAcademy,$cityAcademy,$addressAcademy,$dayAcademy,$hourAcademy,$paymentAcademy,$randomName,$priceMonthly,$priceFinal,$idReturn);
                                    header("Refresh: 0");
                                }
                            }
                        }else{
                            if($emailResponsible !== $emailReturn || $passwordFinal !== $passwordReturn){
                                updateData($nameCompany,$emailCompany,$nameResponsible,$emailResponsible,$passwordFinal,$cepCompany,$stateCompany,$cityCompany,$addressCompany,$numberCompany,$districtCompany,$nameAcademy,$description,$site,$stateAcademy,$cityAcademy,$addressAcademy,$dayAcademy,$hourAcademy,$paymentAcademy,$randomName,$priceMonthly,$priceFinal,$idReturn);
                                header("Refresh: 0, ?change");
                            }else{
                                updateData($nameCompany,$emailCompany,$nameResponsible,$emailResponsible,$passwordFinal,$cepCompany,$stateCompany,$cityCompany,$addressCompany,$numberCompany,$districtCompany,$nameAcademy,$description,$site,$stateAcademy,$cityAcademy,$addressAcademy,$dayAcademy,$hourAcademy,$paymentAcademy,$randomName,$priceMonthly,$priceFinal,$idReturn);
                                header("Refresh: 0");
                            }
                        }
                    }catch(PDOException $error){
                        echo "ERRO " . $error -> getMessage();
                    }
            }

            function updateData($argnameCompany,$argemailCompany,$argnameResponsible,$argemailResponsible,$argpasswordResponsible,$argcepCompany,$argstateCompany,$argcityCompany,$argaddressCompany,$argnumberCompany,$argdistrictCompany,$argnameAcademy,$argdescription,$argsite,$argstateAcademy,$argcityAcademy,$argaddressAcademy,$argdayAcademy,$arghourAcademy,$argpaymentAcademy,$argrandomName,$argpriceMonthly,$argpriceFinal,$argidReturn){
                include("../config/conection.php");
                $update = "UPDATE academys SET nome_empresa=:nome_empresa,email_empresa=:email_empresa,
                nome_responsavel=:nome_responsavel,email_responsavel=:email_responsavel,
                senha_responsavel=:senha_responsavel,cep=:cep,estado=:estado,cidade=:cidade,
                endereco=:endereco,numero=:numero,bairro=:bairro,
                nome_academia=:nome_academia,descricao_academia=:descricao_academia,
                site_academia=:site_academia,estado_academia=:estado_academia,cidade_academia=:cidade_academia,
                endereco_academia=:endereco_academia,dias_academia=:dias_academia,
                horario_academia=:horario_academia,pagamento=:pagamento,logo_academia=:logo_academia,
                preco_mensal_academia=:preco_mensal_academia,preco_diario_academia=:preco_diario_academia
                WHERE id=:id";
                try{
                    $resultUpdate = $conect -> prepare($update);
                    $resultUpdate -> bindParam(":nome_empresa", $argnameCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":email_empresa", $argemailCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":nome_responsavel", $argnameResponsible, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":email_responsavel", $argemailResponsible, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":senha_responsavel", $argpasswordResponsible, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":cep", $argcepCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":estado", $argstateCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":cidade", $argcityCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":endereco", $argaddressCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":numero", $argnumberCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":bairro", $argdistrictCompany, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":nome_academia", $argnameAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":descricao_academia", $argdescription, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":site_academia", $argsite, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":estado_academia", $argstateAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":cidade_academia", $argcityAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":endereco_academia", $argaddressAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":dias_academia", $argdayAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":horario_academia", $arghourAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":pagamento", $argpaymentAcademy, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":logo_academia", $argrandomName, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":preco_mensal_academia", $argpriceMonthly, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":preco_diario_academia", $argpriceFinal, PDO::PARAM_STR);
                    $resultUpdate -> bindParam(":id",$argidReturn,PDO::PARAM_INT);
                    $resultUpdate -> execute();
                    $countUpdate = $resultUpdate -> rowCount();
                    if($countUpdate > 0) {
                        echo "ok";
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
            }
        ?>
    </section>
</section>