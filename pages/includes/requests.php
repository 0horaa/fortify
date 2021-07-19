<h1 class="title-page">Seus agendamentos</h1>
<?php
    if(isset($_GET["reply"])){
        $reply = $_GET["reply"];
        if($reply === "cancel"){
            echo '
            <div class="alert-top alert-green" id="alert" style="padding:1% 2.5%;">
                <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
                <p class="alert-top-text">Agendamento cancelado com sucesso!</p>
            </div>';
        }else if($reply === "req"){
            echo '
            <div class="alert-top alert-green" id="alert" style="padding:1% 2.5%;">
                <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
                <p class="alert-top-text">Agendamento feito com sucesso!</p>
            </div>';
        }else if($reply === "fail"){
            echo '
            <div class="alert-top alert-red" id="alert" style="padding:1% 2.5%;">
                <i class="fas fa-times alert-close" onclick="closeAlert()"></i>
                <p class="alert-top-text">Não foi possível cancelar o agendamento.</p>
            </div>';
        }
    }
?>
<script>
    var numberCount = 0;
</script>
<section class="main">
    <section class="academy-controls">
        <p class="bottom"><a href="home.php" class="control"><i class="fas fa-undo"></i> Voltar para a Home</a></p>
        <p class="bottom" id="number-count" class="control"></p>
    </section>
    <?php
        $select = "SELECT * FROM requests WHERE id_user=:id ORDER BY id DESC";
        try{
            $result = $conect -> prepare($select);
            $result -> bindParam(":id",$idReturn,PDO::PARAM_INT);
            $result -> execute();
            $countSelect = $result -> rowCount();
            if($countSelect > 0){
                while($show = $result -> FETCH(PDO::FETCH_OBJ)){
                    echo "<script>++numberCount;</script>";
    ?>
                    <a href="home.php?pg=academy&id=<?php echo $show -> id_academy;?>">
                        <section class="academy-items">
                            <span class="image-circle-list">
                                <img src="../config/academy/<?php echo $show -> logo;?>" alt="Logo">
                            </span>
                            <div class="items-description">
                                <h2 class="color bottom"><?php echo $show -> nome_academy;?></h2>
                                <p class="color bottom"><?php echo $show -> descricao_academy?></p>
                                <p class="color"><i class="fas fa-map-marker-alt"></i> <?php echo $show -> estado_academy . " - " . $show -> cidade_academy;?></p>
                                <p class="color font-normal top"><strong><i class="fas fa-calendar-check"></i> Data marcada: </strong><?php echo $show -> data_marcada;?></p>
                                <p class="color font-normal top"><strong><i class="fas fa-dollar-sign"></i> Preço: </strong>R$ <?php echo $show -> preco;?></p>
                                <div class="access-span"><a href="includes/cancel.php?id=<?php echo $show -> id;?>" class="color red"><i class="fas fa-trash"></i> Cancelar agendamento</a></div>
                            </div>      
                        </section>
                    </a>

    <?php
                }
            }else{
                echo '<p class="control p-noresult">Você ainda não fez nenhum agendamento...</p>';
                echo '<div style="text-align:center;"><i class="fas fa-calendar-times control icon-noresult"></i></div>';
            }
        }catch(PDOException $error){
            echo "ERRO: " . $error -> getMessage();
        }
    ?>
    <script>
        if(numberCount === 1){
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamento feito`;
        }else{
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamentos feitos`;
        }
        document.querySelector("#number-count").setAttribute("class","control");
    </script>
</section>