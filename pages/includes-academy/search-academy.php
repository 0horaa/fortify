<section class="main">
    <script>
        var numberCount = 0;
    </script>
    <section class="academy-controls">
        <p class="bottom"><a href="home-academy.php" class="control"><i class="fas fa-undo"></i> Voltar para a Home</a></p>
        <p class="bottom" id="number-count" class="control"></p>
    </section>
    <?php
        if(isset($_GET["q"])){
            $question = $_GET["q"];
            $selectSearch = "SELECT * FROM requests WHERE id_academy=:id AND (UPPER(nome) LIKE '%$question%' OR UPPER(cpf) LIKE '%$question%' OR UPPER(data_marcada) LIKE '%$question%') ORDER BY id ASC";
            try{
                $resultSearch = $conect -> prepare($selectSearch);
                $resultSearch -> bindParam(":id",$idReturn,PDO::PARAM_INT);
                $resultSearch -> execute();
                $countResultSearch = $resultSearch -> rowCount();
                if($countResultSearch > 0){
                    while($show = $resultSearch -> FETCH(PDO::FETCH_OBJ)){  
                        echo "<script>++numberCount;</script>"                 
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
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamento encontrado`;
        }else{
            document.querySelector("#number-count").innerHTML = `<strong>${numberCount}</strong> agendamentos encontrados`;
        }     
        document.querySelector("#number-count").setAttribute("class","control");
    </script>
</section>