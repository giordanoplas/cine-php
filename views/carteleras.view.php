<?php require 'views/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="row">
        <?php if(!empty($franquicia)): ?>
            <div class="col-12 d-flex justify-content-center mb-5">
                <img src="<?php echo $cine_config['carpeta_imagenes'] . $franquicia['logo']; ?>" class="img-fluid" style="max-width: 300px;">
            </div>
        <?php endif; ?>
            <?php require 'views/acordeon.php' ?>
            <?php require 'views/info_carteleras.php' ?>
        </div>
    </div>
</main>
<?php require 'views/footer.php' ?>