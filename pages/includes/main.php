<h1 class="title-page">Todas as academias</h1>
<main class="main">
    <section class="academy-controls bottom">
        <form method="GET" style="display:flex;align-items:baseline;">
            <label for="filter" class="lbl" style="font-size:100%;margin-right:3%;"> Filtrar por:</label>
            <select name="filter" id="filter" style="font-size:100%;padding:1%">
                <option value="more-ratings" id="op1">Mais avaliados</option>
                <option value="better-ratings" id="op2">Melhor avaliados</option>
                <option value="small-price" id="op3">Menores preços</option>
                <option value="high-price" id="op4">Maiores preços</option>
            </select>
            <button name="btn-filter" class="btn" style="font-size:100%;padding:2%">Filtrar</button>
            <?php
                if(isset($_GET["btn-filter"])){
                    $filter = $_GET["filter"];
                    if($filter === "more-ratings"){
                        $select = "SELECT * FROM academys ORDER BY avaliacoes DESC";
                        echo '<script>document.getElementById("filter").selectedIndex = 0</script>';
                    }else if($filter === "better-ratings"){
                        $select = "SELECT * FROM academys ORDER BY estrelas_gerais DESC";
                        echo '<script>document.getElementById("filter").selectedIndex = 1</script>';
                    }else if($filter === "small-price"){
                        $select = "SELECT * FROM academys ORDER BY preco_diario_academia ASC";
                        echo '<script>document.getElementById("filter").selectedIndex = 2</script>';
                    }else if($filter === "high-price"){
                        $select = "SELECT * FROM academys ORDER BY preco_diario_academia DESC";
                        echo '<script>document.getElementById("filter").selectedIndex = 3</script>';
                    }else{
                        $select = "SELECT * FROM academys ORDER BY avaliacoes DESC";
                    }
                }else{
                    $select = "SELECT * FROM academys ORDER BY avaliacoes DESC";
                }
            ?>
        </form>
    </section>
    <?php
        try{
            $result = $conect -> prepare($select);
            $result -> execute();
            $countSelect = $result -> rowCount();
            if($countSelect > 0){
                while($show = $result -> FETCH(PDO::FETCH_OBJ)){
    ?>
                    <a href="home.php?pg=academy&id=<?php echo $show -> id;?>">
                        <section class="academy-items">
                            <span class="image-circle-list">
                                <img src="../config/academy/<?php echo $show -> logo_academia;?>" alt="Logo">
                            </span>
                            <div class="items-description">
                                <h2 class="color bottom"><?php echo $show -> nome_academia;?></h2>
                                <p class="color bottom"><?php echo $show -> descricao_academia?></p>
                                <p class="color"><i class="fas fa-map-marker-alt"></i> <?php echo $show -> estado_academia . " - " . $show -> cidade_academia;?></p>
                                <p class="color"><i class="fas fa-star"></i> <?php echo number_format($show -> estrelas_gerais,1);?></p>
                                <div class="access-span"><a href="home.php?pg=academy&id=<?php echo $show -> id;?>" class="access color"><i class="fas fa-running"></i> Acessar</a></div>
                            </div>      
                        </section>
                    </a>

    <?php
                }
            }else{
                echo '<p class="control p-noresult" style="text-align:center">Parece que ainda não há nada por aqui...</p>';
                echo '<div style="text-align:center;"><i class="fas fa-frown-open control icon-noresult"></i></div>';
            }
        }catch(PDOException $error){
            echo "ERRO: " . $error -> getMessage();
        }
    ?>
</main>