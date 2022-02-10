<?php require 'views/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="row estrenos">
            <div class="col text-center">
                <h1 class="mt-0 mb-5">Estrenos</h1>
                <div class="frames"> 
                    <?php foreach($estrenos as $estreno): ?>
                        <?php echo $estreno['iframe']; ?>
                    <?php endforeach; ?>        
                </div>   
            </div>
        </div>
    </div>
</main>
<?php require 'views/footer.php' ?>