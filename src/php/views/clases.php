<p class="tituloranking">Clase</p>
<div id="panelCentro">
    <div>
        <p>Clases</p>
        <a href="index.php?action=aniadirClases&controller=clases&centro_id=<?php echo $_GET['centro_id']; ?>"><button id="aniadirclase"><p>+</p></button></a>
    </div>
    <div>
        <?php 
            foreach ($retornado as $clase) {
        ?>
            <div>
                <p><?php echo $clase['etapa']; ?></p>
                <p><?php echo $clase['clase']; ?></p>
               
                <a href="index.php?action=modificarClases&controller=clases&centro_id=<?php echo $_GET['centro_id']; ?>&id=<?php echo $clase['id']; ?>&etapa=<?php echo $clase['etapa']; ?>&clase=<?php echo $clase['clase']; ?>"><p>M</p></a>

                <a href="index.php?action=borrarClases&controller=clases&id=<?php echo $clase['id']; ?>&centro_id=<?php echo $_GET['centro_id']; ?>"><img src="img/iconos/basura.png"></a>
            </div>
        <?php
            }
        ?>
    </div>
</div>
<p id="botonatras"><a href="index.php">ATRAS</a></p>
