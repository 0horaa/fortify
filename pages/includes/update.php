<section class="edit">
    <section class="information-profile">
    <div class="title-profile first-tp"><h2>Seu Perfil</h2></div>
        <section class="profile">
            <section class="image-profile"> 
                    <span class="image-circle">
                        <img src="../config/media/<?php echo $photoReturn;?>" title="Foto de Perfil">
                    </span>
            </section>
            <section class="info-profile">
                <h2 class="info"><?php echo "@$usernameReturn";?></h2>
                <h3 class="info"><?php echo $nameReturn;?></h3>
                <h4 class="info"><?php echo $emailReturn;?></h4>
                <h4 class="info font-normal"><strong>CPF:</strong> <?php echo $cpfReturn;?></h4>
                <div class="info info-add">
                    <h4 class="date font-normal"><strong>Data de Nascimento:</strong> <?php echo $dateReturn;?></h4>
                    <h4 class="font-normal"><strong>Sexo:</strong> <?php echo $sexReturn;?></h4>
                </div>
                <div class="info info-buttons">
                    <a href="?exit" class="exit"><i class="fas fa-door-open"></i> Sair</a>
                    <a class="delete" onclick="openModal()"><i class="fas fa-trash-alt"></i> Deletar Conta</a>
                </div>       
                <section class="modal-delete" id="modal-delete">
                    <div class="modal-container" id="modal-container">
                        <div class="modal-header">
                            Tem certeza de que quer apagar sua conta? Essa ação não poderá ser desfeita.                        
                        </div>
                        <div class="modal-content">
                            <div class="modal-content-options">
                                <button type="click" onclick="closeModal()"><i class="fas fa-window-close"></i> Cancelar</button>
                                <a href="includes/delete.php?delete"><i class="fas fa-check-square"></i> Deletar</a>
                            </div>
                        </div>
                    </div>
                </section>    
            </section>
        </section>
    </section>
    <section class="form-profile">
        <div class="title-profile" id="title-profile"><h2>Editar</h2></div>
        <form method="POST" enctype="multipart/form-data" onsubmit="return registerVal()" name="form-register" id="form-register" class="form-update">
            <label for="username" class="lbl">Nome de Usuário:</label>
            <input type="text" name="username" id="username" placeholder="Um nome qualquer..." value="<?php echo $usernameReturn;?>" onkeypress="pressUsername()" onkeyup="pressUsername()">
            <p class="error" id="error-user"></p>
            <label for="email" class="lbl">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="seuemail@gmail.com" value="<?php echo $emailReturn;?>" onkeypress="pressEmail();" onkeyup="pressEmail()">
            <p class="error" id="error-email"></p>
            <label for="password" class="lbl">Senha:</label>
            <input type="password" name="password" id="password" autocomplete="off" onkeypress="pressPassword()" onkeyup="pressPassword()"><!--autocomplete=off impede que navegadores deem sugestões-->
            <div class="check">
                <label for="checkbox" class="lbl-check">Mostrar senha</label>
                <input type="checkbox" name="checkbox" id="checkbox" onclick="showPass();">
            </div>    
            <p class="error" id="error-password"></p>
            <label for="photo" class="lbl">Foto de Perfil:</label>
            <label for="photo" class="file-placeholder" id="file-placeholder">Insira uma imagem</label>
            <p class="error" id="error-photo"></p>
            <input type="file" name="photo" id="photo" accept="image/*">
            <button type="submit" name="btn-update" class="btn btn-margin-top">Atualizar</button>

            <?php
            
                if(isset($_POST["btn-update"])){
                    $username = "@" . $_POST["username"];
                    $email = $_POST["email"];
                    $passwordEncrypted = base64_encode($_POST["password"]);
                    $password = $passwordEncrypted != null ? $passwordEncrypted : $passwordReturn;
                    if(!empty($_FILES["photo"]["name"])){
                        $imageFormats = array("png","PNG","jpg","JPG","jpeg","JPEG");
                        $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
                        if(in_array($extension,$imageFormats)){
                            unlink("../config/media/$photoReturn"); //DELETA A FOTO ANTIGA
                            $folder = "../config/media/";
                            $temp = $_FILES["photo"]["tmp_name"];
                            $randomName = uniqid() . ".$extension";
                            if(move_uploaded_file($temp, $folder.$randomName)){
                                
                            }else{
                                echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Não foi possível enviar a imagem. Tente novamente mais tarde.</div>';
                            }
                        }else{
                            echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Formato inválido de imagem :(</div>';
                        }
                    }else{
                        $randomName = $photoReturn;
                    }

                    $select = "SELECT * FROM users WHERE email=:existentEmail";
                    try{
                        if($email !== $emailReturn){
                            $resultSelect = $conect -> prepare($select);
                            $resultSelect -> bindParam(":existentEmail",$email,PDO::PARAM_STR);
                            $resultSelect -> execute();

                            $countSelect = $resultSelect -> rowCount();
                            if($countSelect > 0){
                                echo '<script>document.querySelector("#alert").style.display = "none"</script>';
                                echo '<div class="alert alert-red margin-top-alert" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Esse email já está sendo utilizado, use outro email.</div>';
                            }else{
                                if($email !== $emailReturn || $password !== $passwordReturn){
                                    updateData($username,$email,$password,$randomName,$idReturn);
                                    header("Refresh: 0, ?change");
                                }else{
                                    updateData($username,$email,$password,$randomName,$idReturn);
                                    header("Refresh: 0");
                                }                 
                            }
                        }else{
                            if($email !== $emailReturn || $password !== $passwordReturn){
                                updateData($username,$email,$password,$randomName,$idReturn);
                                header("Refresh: 0, ?change");
                            }else{
                                updateData($username,$email,$password,$randomName,$idReturn);
                                header("Refresh: 0");
                            } 
                        }
                    }catch(PDOException $error){
                        echo "HOUVE UM ERRO: " . $error -> getMessage();
                    }
                }

                function updateData($argUsername,$argEmail,$argPassword,$argPhoto,$argId){
                    include("../config/conection.php");
                    $update = "UPDATE users SET usuario=:usuario, email=:email, senha=:senha, foto=:foto WHERE id=:id";
                    try{
                        $result = $conect -> prepare($update);
                        $result -> bindParam(":usuario",$argUsername,PDO::PARAM_STR);
                        $result -> bindParam(":email",$argEmail,PDO::PARAM_STR);
                        $result -> bindParam(":senha",$argPassword,PDO::PARAM_STR);
                        $result -> bindParam(":foto",$argPhoto,PDO::PARAM_STR);
                        $result -> bindParam(":id",$argId,PDO::PARAM_INT);
                        $result -> execute();
                        $count = $result -> rowCount();
                        if($count > 0){
                            echo '<script>document.querySelector("#alert").style.display = "none"</script>';
                            echo '<div class="alert alert-green margin-top-alert" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Dados alterados com sucesso!</div>';
                        }else{
                            header("Refresh: 0");   
                        }
                    }catch(PDOException $error){
                        echo "HOUVE UM ERRO: " . $error -> getMessage();
                    }
                }
            ?>
        </form>
    </section>
</section>
<p class="warning"><strong>Atenção:</strong> ao realizar a alteração de informações como <strong>Email</strong> e <strong>Senha</strong>, você será redirecionado para a página de login para fazer login novamente com suas novas informações!</p>