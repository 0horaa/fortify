<section class="main">
    <script>
        var numberCount = 0;
    </script>
    <section class="academy-controls">
        <p class="bottom"><a href="home.php" class="control"><i class="fas fa-undo"></i> Voltar para a Home</a></p>
        <p class="bottom" id="number-count" class="control"></p>
    </section>
    <?php
        if(isset($_GET["q"])){
            $question = $_GET["q"];
            $selectSearch = "SELECT * FROM academys WHERE UPPER(nome_academia) LIKE '%$question%' OR UPPER(cidade) LIKE '%$question%' OR UPPER(nome_empresa) LIKE '%$question%'";
            try{
                $resultSearch = $conect -> prepare($selectSearch);
                //$resultSearch -> bindParam(":nome",$question,PDO::PARAM_STR);
                $resultSearch -> execute();
                $countResultSearch = $resultSearch -> rowCount();
                if($countResultSearch > 0){
                    while($show = $resultSearch -> FETCH(PDO::FETCH_OBJ)){  
                        echo "<script>++numberCount;</script>"                 
    ?>
                        <a href="home.php?pg=academy&id=<?php echo $show -> id;?>">
                            <section class="academy-items">
                                <span class="image-circle-list">
                                    <img src="../config/academy/<?php echo $show -> logo_academia;?>" alt="Logo">
                                </span>
                                <div class="items-description">
                                    <h2 class="color bottom"><?php echo $show -> nome_academia;?></h2>
                                    <p class="color bottom"><?php echo $show -> descricao_academia;?></p>
                                    <p class="color"><i class="fas fa-map-marker-alt"></i> <?php echo $show -> estado_academia . " - " . $show -> cidade_academia;?></p>
                                    <p class="color"><i class="fas fa-star"></i> <?php echo $show -> estrelas_gerais;?></p>
                                    <div class="access-span"><a href="home.php?pg=academy&id=<?php echo $show -> id;?>" class="access color"><i class="fas fa-running"></i> Acessar</a></div>
                                </div>
                            </section>
                        </a>
    <?php
                    }
                }else{
                    echo '<p class="control p-noresult">Sem resultados para essa pesquisa...</p>';
                    echo '<div style="text-align:center;"><i class="fas fa-frown-open control icon-noresult"></i></div>';
                }
            }catch(PDOException $error){
                echo "ERRO: " . $error -> getMessage();
            }
        }
    ?>
    <script>
        if(numberCount === 1){
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> academia encontrada`;
        }else{
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> academias encontradas`;
        }     
        document.querySelector("#number-count").setAttribute("class","control");
    </script>
</section>