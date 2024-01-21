<p class="tituloranking">CENTRO</p>
<div id="panelCentro">
    <div>
        <p>CENTRO</p>
        <a href="index.php?action=aniadirCentro&controller=centros"><button id="aniadircentro"><p>+</p></button></a>
    </div>
    <div>
    <?php 
     
        if (is_array($retornado)) {
            foreach ($retornado as $centro) {
            ?>
                        <div>
                            <p><?php echo $centro['nombre']; ?></p>
                            <p><?php echo $centro['localidad']; ?></p>
                            <a href="index.php?controller=clases&action=listarClases&centro_id=<?php echo $centro['id']; ?>"><p>></p></a> 
                            <a href="index.php?action=modificarCentro&controller=centros&id=<?php echo $centro['id']; ?>&nombre=<?php echo $centro['nombre']; ?>&localidad=<?php echo $centro['localidad']; ?>"><p>M</p></a>
                            <a href="index.php?action=borrarCentro&controller=centros&id=<?php echo $centro['id']; ?>"><img src="img/iconos/basura.png"></a>
                        </div>
            <?php
            }
         } else {
            
          echo $retornado;
        }
    ?>
    </div>
</div>
<p id="botonatras"><a href="index.php">ATRAS</a></p>
