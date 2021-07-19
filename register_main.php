<form method="POST" enctype="multipart/form-data" name="form-register" id="form-register" class="form" onsubmit="return registerVal();" autocomplete="off" onpaste="return false" ondrop="return false">
        <h1 class="title-register">Cadastre-se</h1>

        <label for="username" class="lbl">Nome de Usuário:</label>
        <input type="text" name="username" id="username" placeholder="Um nome qualquer..." onkeypress="pressUsername();" onkeyup="pressUsername();">
        <p class="error" id="error-user"></p>

        <label for="user" class="lbl">Nome e sobrenome:</label>
        <input type="text" name="user" id="user" placeholder="Nome e sobrenome..." onkeypress="pressName()" onkeyup="pressName()">
        <p class="error" id="error-name"></p>

        <label for="email" class="lbl">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="seuemail@gmail.com" onkeypress="pressEmail()" onkeyup="pressEmail()">
        <p class="error" id="error-email"></p>

        <label for="cpf" class="lbl">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="123.456.789-10" autocomplete="off" maxlength="14" onkeypress="maskCPF();pressCPF();" onkeyup="maskCPF();pressCPF();" onpaste="return false" ondrop="return false">
        <!--onpaste e ondrop acima no input impedem que o usuário cole texto ou arraste texto pra dentro do input-->
        <p class="error" id="error-cpf"></p>

        <label for="date" class="lbl">Data de nascimento:</label>
        <input type="date" name="date" id="date" value="2010-01-01" onkeypress="pressDate();" onkeyup="pressDate();">
        <p class="error" id="error-date"></p>

        <label for="password" class="lbl">Senha:</label>
        <input type="password" name="password" id="password" autocomplete="off" onkeypress="pressPassword()" onkeyup="pressPassword()"><!--autocomplete=off impede que navegadores deem sugestões-->
        <div class="check">
            <label for="checkbox" class="lbl-check">Mostrar senha</label>
            <input type="checkbox" name="checkbox" id="checkbox" onclick="showPass();">
        </div>    
        <p class="error" id="error-password"></p>
        
        <label for="other" class="lbl">Sexo:</label>
        <select name="sex" id="sex">
            <option value="Masculino" checked="">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>
        
        <label for="photo" class="lbl">Foto de Perfil:</label>
        <label for="photo" class="file-placeholder" id="file-placeholder">Insira uma imagem</label>
        <p class="error" id="error-photo"></p>
        <input type="file" name="photo" id="photo" accept="image/*" onchange="changePhoto();">
        <button type="submit" name="btn-register" class="btn btn-margin-top">Cadastrar</button>
        <a href="login.php" class="link-login">Já tem um cadastro? Faça Login!</a>

        <?php
            if(isset($_GET["reply"])){
                $reply = $_GET["reply"];
                if($reply === "denied"){
                    echo '
                        <script>
                        let alert = document.getElementsByClassName("alert-top")[0];
                        let alertText = document.getElementsByClassName("alert-top-text")[0];
                        alert.style.display = "flex";
                        alert.setAttribute("class","alert-top alert-red");
                        alertText.innerHTML = "Você inseriu o código incorreto. Se possível, refaça o cadastro.";
                        </script>
                    ';
                }else if($reply === "error"){
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
            }

            include("config/conection.php");
            if(isset($_POST["btn-register"])){
                $_SESSION["username"] = "@" . $_POST["username"];
                $_SESSION["user"] = $_POST["user"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = base64_encode($_POST["password"]);
                $_SESSION["cpf"] = $_POST["cpf"];
                $_SESSION["date"] = $_POST["date"];
                $_SESSION["date"] = date("d/m/Y",strtotime($_SESSION["date"])); //faz a formatação da data e a põe em formato brasileiro
                $_SESSION["sex"] = $_POST["sex"];
                $imageFormats = array("png","PNG","jpg","JPG","jpeg","JPEG");
                $extension = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);

                if(in_array($extension,$imageFormats)){
                    $folder = "config/media/";
                    $temp = $_FILES["photo"]["tmp_name"];
                    $randomName = uniqid() . ".$extension";
                    $_SESSION["randomName"] = $randomName;
                    $select = "SELECT * FROM users WHERE email=:existentEmail";
                    try{
                        $resultSelect = $conect -> prepare($select);
                        $resultSelect -> bindParam(":existentEmail",$_SESSION["email"],PDO::PARAM_STR);
                        $resultSelect -> execute();
                        $countSelect = $resultSelect -> rowCount();

                        if($countSelect > 0){
                            session_destroy();
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
                            $_SESSION["code"] = mt_rand(103586,994956);

                            try{
                                $name = $_SESSION["user"];
                                $code = $_SESSION["code"];
                                $email = $_SESSION["email"];

                                $mail -> isSMTP();
                                $mail -> Host = "smtp.gmail.com";
                                $mail -> SMTPAuth = true;
                                $mail -> Username = "your_email@gmail.com";
                                $mail -> Password = "your_password";
                                $mail -> Port = 587;
                                $mail -> setFrom("your_email@gmail.com");
                                $mail -> addAddress($email);
                                $mail -> isHTML(true);
                                $mail -> Subject = "Confirmar cadastro - Fortify";
                                $mail -> Body = "Olá, <strong>$name</strong>, o código de confirmação para realizar seu cadastro é o seguinte: <br><h1>$code</h1>";
                                $mail -> AltBody = "Olá, $name, o código de confirmaçaõ para realizar seu cadastro é o seguinte: $code";
                                
                                if($mail -> send()){
                                    move_uploaded_file($temp, $folder.$randomName);
                                    header("Location: register.php?r=confirm");
                                }else{
                                    session_destroy();
                                    echo '
                                        <script>
                                            let alert = document.getElementsByClassName("alert-top")[0];
                                            let alertText = document.getElementsByClassName("alert-top-text")[0];
                                            alert.style.display = "flex";
                                            alert.setAttribute("class","alert-top alert-red");
                                            alertText.innerHTML = "Algo deu errado. Por favor, tente novamente mais tarde";
                                        </script>
                                    ';
                                }
                            }catch(Exception $error){
                                session_destroy();
                                echo "ERRO: " . $error -> getMessage();
                            }
                        }
                    }catch(PDOException $error){
                        session_destroy();
                        echo "HOUVE UM ERRO: " . $error -> getMessage();
                    }
                }else{
                    session_destroy();
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