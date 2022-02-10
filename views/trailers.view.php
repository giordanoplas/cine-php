<?php require 'views/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="row trailers">
            <div class="col text-center">
                <h1 class="mt-0 mb-5">Trailers</h1>
                <div class="frames"> 
                <?php foreach($trailers as $trailer): ?>
                    <?php echo $trailer['iframe']; ?>
                <?php endforeach; ?>       
                </div>   
            </div>
            <div class="col-12 mt-5">
                <?php require 'views/paginacion.php'; ?>
            </div>
        </div>        
    </div>    
</main>
<?php require 'views/footer.php' ?>