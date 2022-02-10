<?php require '../../views/header.php'; ?>

<main>
    <div class="container">
        <div class="row p-5 d-flex justify-content-center">
            <div class="col text-center" style="max-width: 600px;">                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <h2 class="text-light">Iniciar Sesión</h2>
                    <div class="input-group-lg my-3">
                        <input type="text" id="usuario" name="usuario" class="form-control bg-dark text-white" placeholder="Usuario">   
                        <input type="password" id="password" name="password" class="form-control mt-2 bg-dark text-white" placeholder="Contraseña">                     
                    </div> 
                    
                    <?php if(isset($errores)): ?>                        
                        <div class="alert" style="background: #ba1a1a; color: white;">
                            <b><?php echo $errores ?></b>
                        </div>
                    <?php endif; ?>

                    <input type="submit" class="btn btn-lg btn-outline-light w-100" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require '../../views/footer.php'; ?>