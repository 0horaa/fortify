<?php
    if(isset($_GET["id"])){
        $id = filter_input(INPUT_GET,"id",FILTER_DEFAULT);
        $select = "SELECT * FROM academys WHERE id=:id";
        try{
            $resultAcademy = $conect -> prepare($select);
            $resultAcademy -> bindParam(":id",$id,PDO::PARAM_INT);
            $resultAcademy -> execute();
            $countResultAcademy = $resultAcademy -> rowCount();
            if($countResultAcademy > 0){
                while($show = $resultAcademy -> FETCH(PDO::FETCH_OBJ)){
                    $nameAcademyReturn = $show -> nome_academia;
                    $descriptionReturn = $show -> descricao_academia;
                    $siteReturn = $show -> site_academia;
                    $stateReturn = $show -> estado_academia;
                    $cityReturn = $show -> cidade_academia;
                    $addressReturn = $show -> endereco_academia;
                    $daysReturn = $show -> dias_academia;
                    $scheduleReturn = $show -> horario_academia;
                    $paymentReturn = $show -> pagamento;
                    $logoReturn = $show -> logo_academia;
                    $priceReturn = $show -> preco_diario_academia;
                    $ratingNumberReturn = $show -> avaliacoes;
                    $stars = $show -> estrelas;
                    $generalStars = $show -> estrelas_gerais; 
                }
                $priceReturn = number_format($priceReturn,2,",",".");
                $generalStars = number_format($generalStars,1);
            }else{
                exit;
                header("Location: home.php");
            }
        }catch(PDOException $error){
            echo "ERRO: " . $error -> getMessage(); 
        }
    }else{
        exit;
        header("Location: home.php");
    }
?>
<p class="warning" style="margin-bottom:0;line-height:1.5rem;font-size:120%;"><strong>Atenção:</strong> ao realizar o <strong>agendamento</strong> de um dia, suas informações como Nome e CPF serão enviados à academia para que elas possam identificar você. Ao chegar na academia no dia comprado, leve <strong>RG e CPF</strong>, além do pagamento pelo meio desejado, como: dinheiro, cartão, etc.</strong></p>
<section class="edit" style="align-items:center;">
    <section class="information-profile">
    <div class="title-profile first-tp"><h2>Academia</h2></div>
        <section class="profile">
            <section class="image-profile"> 
                    <span class="image-circle">
                        <img src="../config/academy/<?php echo $logoReturn;?>" title="Logo">
                    </span>
            </section>
            <section class="info-profile">
                <h2 class="info bottom"><?php echo $nameAcademyReturn;?></h2>
                <h3 class="info font-normal bottom"><?php echo $descriptionReturn;?></h3>
                <h4 class="info font-normal" id="site-academy"><a href="<?php echo $siteReturn?>" target="_blank" class="color text-dec"><i class="fas fa-globe-americas"></i> Site da academia</a>
                    <?php
                        if($siteReturn === "Nenhum"){
                            echo '<script>document.querySelector("#site-academy").innerHTML = ""</script>';
                        }
                    ?>
                </h4>
                <h4 class="info font-normal"><i class="fas fa-map-marker-alt"></i> <?php echo "<strong>$stateReturn</strong>" . " - " . $cityReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-map"></i> Endereço: </strong><?php echo $addressReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-calendar-week"></i> Dias de funcionamento: </strong> <?php echo $daysReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-clock"></i> Horário de funcionamento: </strong> <?php echo $scheduleReturn;?></h4>
                <h4 class="info font-normal"><strong><i class="fas fa-dollar-sign"></i> Métodos de pagamento: </strong> <?php echo $paymentReturn;?></h4>  
                <h4 class="info font-normal"><strong><i class="fas fa-star-half-alt"></i> N° de avaliações: </strong> <?php echo $ratingNumberReturn;?></h4> 
                <h4 class="info font-normal"><strong><i class="fas fa-star"></i> Avaliação geral: </strong> <?php echo $generalStars;?></h4> 
            </section>
        </section>
    </section>
    <section class="form-profile">
        <div class="title-profile" id="title-profile"><h2 style="margin-left:1%;">Agendamento</h2></div>
            <form method="POST" enctype="multipart/form-data" onsubmit="return registerVal()" class="form-update">
                <h1 class="lbl font-normal" style="font-size:180%"><strong>Preço:</strong> R$ <?php echo $priceReturn;?></h1>
                <label for="date" class="lbl" id="lbl-date">Dia a ser comprado:</label>
                <input type="date" name="date" id="date">
                <p class="error" id="error-user"></p>
                <script>
                    var date = new Date();
                    var day = String(date.getDate() + 1).padStart(2,"0");
                    var month = String(date.getMonth() + 1).padStart(2,"0"); 
                    var year = date.getFullYear();
                    var dateComplete = `${year}-${month}-${day}`;
                    document.querySelector("#date").value = dateComplete;
                </script>
                <button type="submit" name="btn-purchase" class="btn btn-margin-top">Agendar</button>
                <?php
                    if(isset($_POST["btn-purchase"])){
                        $scheduledDate = $_POST["date"];
                        $scheduledDate = date("d/m/Y",strtotime($scheduledDate));
                        $insertScheduling = "INSERT INTO requests(nome,email,cpf,sexo,datanasc,data_marcada,preco,foto,id_user,id_academy,nome_academy,descricao_academy,logo,estado_academy,cidade_academy) VALUES(:nome,:email,:cpf,:sexo,:datanasc,:data_marcada,:preco,:foto,:id_user,:id_academy,:nome_academy,:descricao_academy,:logo,:estado_academy,:cidade_academy)";
                        try{
                            $resultInsertScheduling = $conect -> prepare($insertScheduling);
                            $resultInsertScheduling -> bindParam(":nome",$nameReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":email",$emailReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":cpf",$cpfReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":sexo",$sexReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":datanasc",$dateReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":data_marcada",$scheduledDate,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":preco",$priceReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":foto",$photoReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":id_user",$idReturn,PDO::PARAM_INT);
                            $resultInsertScheduling -> bindParam(":id_academy",$id,PDO::PARAM_INT);
                            $resultInsertScheduling -> bindParam(":nome_academy",$nameAcademyReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":descricao_academy",$descriptionReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":logo",$logoReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":estado_academy",$stateReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> bindParam(":cidade_academy",$cityReturn,PDO::PARAM_STR);
                            $resultInsertScheduling -> execute();
                            $countScheduling = $resultInsertScheduling -> rowCount();
                            if($countScheduling > 0){
                                header("Location: home.php?pg=requests&reply=req");
                            }else{
                                echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Algo deu errado. Por favor, tente novamente mais tarde :(</div>';
                            }
                        }catch(PDOException $error){
                            echo "<strong>ERRO: </strong>" . $error -> getMessage();
                        }
                    }
                ?>
            </form>
            <div class="title-profile" id="title-profile" style="margin-top:2%;"><h2 style="margin-left:1%;">Avaliação</h2></div>
            <form method="POST" class="form-update">
                <label for="rating" class="lbl">Avaliar:</label>
                <select name="rating" id="rating">
                    <option value="1">1 estrela</option>
                    <option value="2">2 estrelas</option>
                    <option value="3">3 estrelas</option>
                    <option value="4">4 estrelas</option>
                    <option value="5" selected="">5 estrelas</option>
                </select>
                <button type="submit" name="btn-rating" class="btn btn-margin-top">Enviar</button>
                
                <?php
                if(isset($_POST["btn-rating"])){
                    $rating = $_POST["rating"];
                    $stars += $rating;
                    ++$ratingNumberReturn;
                    $generalRating = $stars / $ratingNumberReturn;
                    $update = "UPDATE academys SET avaliacoes=:avaliacoes,estrelas=:estrelas,estrelas_gerais=:estrelas_gerais WHERE id=:id";
                    try{
                        $resultRating = $conect -> prepare($update);
                        $resultRating -> bindParam(":avaliacoes",$ratingNumberReturn,PDO::PARAM_STR);
                        $resultRating -> bindParam(":estrelas",$stars,PDO::PARAM_STR);
                        $resultRating -> bindParam(":estrelas_gerais",$generalRating,PDO::PARAM_STR);
                        $resultRating -> bindParam(":id",$id,PDO::PARAM_INT);
                        $resultRating -> execute();
                        $countRating = $resultRating -> rowCount();
                        if($countRating > 0){
                            header("Refresh: 0");
                            echo '<div class="alert alert-green" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Avaliação enviada com sucesso!</div>';
                        }else{
                            echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Algo deu errado. Por favor, tente novamente mais tarde :(</div>';
                        }
                    }catch(PDOException $error){
                        echo "ERRO: " . $error -> getMessage();
                    }
                }
            ?>
            </form>
        <div>
    </section>
</section>