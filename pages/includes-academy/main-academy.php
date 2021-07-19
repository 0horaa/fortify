<h1 class="title-page">Pessoas agendadas na sua academia</h1>
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
<main class="main">
    <script>
        var numberCount = 0;
    </script>
    <section class="academy-controls bottom">
    <form method="GET" style="display:flex;align-items:baseline;">
            <label for="filter" class="lbl" style="font-size:100%;margin-right:3%;"> Filtrar por:</label>
            <select name="f" id="filter" style="font-size:100%;padding:1%">
                <option value="all" id="op1">Todos</option>
                <option value="Masculino" id="op2">Masculino</option>
                <option value="Feminino" id="op3">Feminino</option>
                <option value="Outro" id="op4">Outro</option>
            </select>
            <button name="btn-filter" class="btn" style="font-size:100%;padding:2%">Filtrar</button>
            <?php
                if(isset($_GET["btn-filter"])){
                    $filter = $_GET["f"];
                    if($filter === "all"){
                        $select = "SELECT * FROM requests WHERE id_academy=:id ORDER BY id ASC";
                        echo '<script>document.getElementById("filter").selectedIndex = 0</script>';
                    }else if($filter === "Masculino"){
                        $select = "SELECT * FROM requests WHERE id_academy=:id AND sexo=:sexo ORDER BY id ASC";
                        echo '<script>document.getElementById("filter").selectedIndex = 1</script>';
                    }else if($filter === "Feminino"){
                        $select = "SELECT * FROM requests WHERE id_academy=:id AND sexo=:sexo ORDER BY id ASC";
                        echo '<script>document.getElementById("filter").selectedIndex = 2</script>';
                    }else if($filter === "Outro"){
                        $select = "SELECT * FROM requests WHERE id_academy=:id AND sexo=:sexo ORDER BY id ASC";
                        echo '<script>document.getElementById("filter").selectedIndex = 3</script>';
                    }else{
                        $select = "SELECT * FROM requests WHERE id_academy=:id ORDER BY id ASC";
                    }
                }else{
                    $select = "SELECT * FROM requests WHERE id_academy=:id ORDER BY id ASC";
                }
            ?>
        </form>
        <p id="number-count" class="control"></p>
    </section>
    <?php
        //$select = "SELECT * FROM requests WHERE id_academy=:id ORDER BY id ASC";
        try{
            $result = $conect -> prepare($select);
            if(isset($_GET["f"])){
                $filter = $_GET["f"];
                if($filter === "Masculino" || $filter === "Feminino" || $filter === "Outro"){
                    $result -> bindParam(":sexo",$filter,PDO::PARAM_STR);
                }
            }
            $result -> bindParam(":id",$idReturn,PDO::PARAM_INT);
            $result -> execute();
            $countSelect = $result -> rowCount();
            if($countSelect > 0){
                while($show = $result -> FETCH(PDO::FETCH_OBJ)){
                    echo "<script>++numberCount;</script>";
    ?>
                        <section class="academy-items">
                            <span class="image-circle-list" style="margin-right:1%;margin-left:2%;margin-right:1%">
                                <img src="../config/media/<?php echo $show -> foto;?>" alt="Logo">
                            </span>
                            <div class="items-description" style="margin-left:4%;">
                                <h2 class="color bottom"><i class="fas fa-user"></i> <?php echo $show -> nome;?></h2>
                                <p class="color bottom"><i class="fas fa-envelope"></i> <strong>E-mail:</strong> <?php echo $show -> email?></p>
                                <p class="color"><i class="fas fa-id-card"></i> <strong>CPF:</strong> <?php echo $show -> cpf;?></p>
                                <p class="color"><i class="fas fa-venus-mars"></i> <strong>Sexo:</strong> <?php echo $show -> sexo;?></p>     
                                <p class="color"><i class="fas fa-calendar-day"></i> <strong>Data de nascimento:</strong> <?php echo $show -> datanasc;?></p>                            
                                <p class="color"><i class="fas fa-clock"></i> <strong>Data de agendamento:</strong> <?php echo $show -> data_marcada;?></p>
                                <p class="color"><i class="fas fa-money-bill-wave-alt"></i> <strong>Preço a pagar:</strong> R$ <?php echo $show -> preco;?></p>          
                                <div class="access-span"><a href="includes-academy/cancel-academy.php?id=<?php echo $show -> id;?>" class="color red"><i class="fas fa-trash"></i> Cancelar agendamento</a></div>
                            </div>      
                        </section>
    <?php
                }
            }else{
                echo '<p class="control p-noresult" style="text-align:center">Parece que ainda não há agendamentos por aqui...</p>';
                echo '<div style="text-align:center;"><i class="fas fa-calendar-times control icon-noresult"></i></div>';
            }
        }catch(PDOException $error){
            echo "ERRO: " . $error -> getMessage();
        }
    ?>
    <script>
        if(numberCount === 1){
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamento encontrado`;
        }else{
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamentos encontrados`;
        }     
        document.querySelector("#number-count").setAttribute("class","bottom control");
    </script>
</main>