            <h2><b>Avaliações</b></h2><br><br>
            <br>
            <div class="avaliacoes">
                <form action="">
                    <label for="comentario">Comentario</label>
                    <input type="text" name="comentario" id="comentario" maxlength="255">
                    <label for="nota">Nota</label>
                    <input type="number" name="nota" id="nota" >
                    <button type="submit" disabled>enviar</button>
                </form>
                <?php 
                    if($quantidade_avaliacoes == 0){
                        echo 'Nenhuma avaliação disponivel para esse produto';
                    }else
                ?>
                <?php
                foreach ($avaliacoes as $item) { 
                ?>
                <div class="avaliacao">
                    <div class="dados"> 
                        <img src="<?php echo $item['foto']?>"  alt="usuario">
                        <h3><?php echo $item['nome']?></h3>
                        <h2><?php echo $item['nota']?></h2>
                    </div>
                   <div class="comentario">
                   <p><?php echo $item['comentario']?></p>
                   </div>
                </div>
                <?php
                    }
                ?>
            </div>