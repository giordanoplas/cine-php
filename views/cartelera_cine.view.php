<?php require 'views/header.php' ?>
<main>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row cartelera-cine">        
            <?php if(!$carteleras): ?>
            <div class="col text-center">
                <p class="titulo">Este cine no tiene carteleras</p>   
            </div>
            <?php else: ?>
            <div class="col-12">
                <img src="<?php echo RUTA . $cine_config['carpeta_thumb'] . $carteleras[0]['thumb']; ?>" class="img-fluid thumb mb-3">
            </div>
            <div class="col-12 mb-3">
                <p class="titulo m-0 p-0"><?php echo $cine ?></p>
                <p class="subtitulo">En exhibición:</p>
            </div>                
            <div class="col-12 text-center">
            <?php foreach($carteleras as $cartelera): ?>
                <div class="portada d-inline">
                    <div class="box">
                        <div class="front">
                            <img src="<?php echo RUTA . $cine_config['carpeta_carteleras'] . $cartelera['cartelera']; ?>">                                                         
                        </div>
                        <div class="back">
                            <div class="info">
                                <p><?php echo $cartelera['horarios'] ?></p>
                            </div>   
                        </div>
                    </div>                       
                </div>           
            <?php endforeach; ?>  
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php require 'views/footer.php' ?>