<?php require 'views/header.php' ?>
<main>
    <div class="container-fluid">
        <div class="row prox">
            <div class="col text-center">
                <h1 class="mt-0 mb-5">Próximamente</h1>
                <div class="frames"> 
                <?php foreach($prox as $pro): ?>
                    <?php echo $pro['iframe']; ?>
                <?php endforeach; ?>      
                </div>   
            </div>
        </div>
    </div>
</main>
<?php require 'views/footer.php' ?>