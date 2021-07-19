<script>document.getElementsByTagName("body")[0].style.height = "100vh";</script>
<?php
    if(!isset($_SESSION["code"])){
        session_destroy();
        header("Location: register.php");
    }
?>
<form method="POST" name="form-confirm" class="form-confirm">
    <h1 class="title-register">Cadastro</h1>
    <p class="error" style="color: #232323;line-height:1.3rem;">Um código de confirmação foi enviado para <strong><?php echo $_SESSION["email"];?></strong>, digite-o aqui para finalizar seu cadastro.</p>
    <label for="code-number" class="lbl">Código de confirmação</label>
    <input type="number" name="code-number" id="code-number" placeholder="000000">
    <button type="submit" name="btn-confirm" class="btn" style="margin-top:2%;margin-bottom:2%;">Finalizar cadastro</button>
    <a href="register.php" class="link-login">Refazer cadastro</a>
    <?php
        include("config/conection.php");
        if(isset($_POST["btn-confirm"])){
            $username = $_SESSION["username"];
            $user = $_SESSION["user"];
            $email = $_SESSION["email"];
            $password = $_SESSION["password"];
            $cpf = $_SESSION["cpf"];
            $date = $_SESSION["date"];
            $sex = $_SESSION["sex"];
            $randomName = $_SESSION["randomName"];
            $code = isset($_POST["code-number"]) ? $_POST["code-number"] : 000000;

            if($code == $_SESSION["code"]){
                $insert = "INSERT INTO users(usuario,nome,email,senha,cpf,datanasc,sexo,foto) VALUES(:usuario,:nome,:email,:senha,:cpf,:datanasc,:sexo,:foto)";
                try{
                    $result = $conect -> prepare($insert);
                    $result -> bindParam(":usuario",$username,PDO::PARAM_STR);
                    $result -> bindParam(":nome",$user,PDO::PARAM_STR);
                    $result -> bindParam(":email",$email,PDO::PARAM_STR);
                    $result -> bindParam(":senha",$password,PDO::PARAM_STR);
                    $result -> bindParam(":cpf",$cpf,PDO::PARAM_STR);
                    $result -> bindParam(":datanasc",$date,PDO::PARAM_STR);
                    $result -> bindParam(":sexo",$sex,PDO::PARAM_STR);
                    $result -> bindParam(":foto",$randomName,PDO::PARAM_STR);
                    $result -> execute();

                    $count = $result -> rowCount();
                    if($count > 0){   
                        session_destroy(); 
                        header("Location: login.php?reply=login");
                    }else{
                        unlink("config/media/$randomName");
                        session_destroy();
                        header("Location: register.php?reply=error");
                    }
                }catch(PDOException $error){
                    unlink("config/media/$randomName");
                    session_destroy();
                    echo "<strong>HOUVE UM ERRO: </strong>" . $error -> getMessage();
                    header("Location: register.php?reply=error");
                }
            }else{
                unlink("config/media/$randomName");
                session_destroy();
                header("Location: register.php?reply=denied");
            }
        }
    ?>
</form>