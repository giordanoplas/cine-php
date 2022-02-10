<?php require 'views/header.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row"> 
            <?php include 'views/barra_lateral.php'; ?>

            <main class="col">
                <div class="row">
                    <div class="columna col-lg-7">
                        <div class="widget">
                            <h3 class="titulo">Agregar Película</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                            
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:">
                                <textarea name="iframe" placeholder="Iframe:"></textarea>
                                <hr>

                                <label class="label"><strong class="text-primary">Cartelera:</strong> <input type="file" name="cartelera" id="cartelera" accept="image/jpeg, image/png"></label>
                                <label class="label"><strong class="text-primary">Slideshow:</strong> <input type="file" name="slideshow" id="slideshow" accept="image/jpeg, image/png"></label>
                                <hr>

                                <?php if(!empty($errores)): ?>                        
                                    <div class="alert" style="background: #ba1a1a; color: white;">
                                        <b><?php echo $errores ?></b>
                                    </div>
                                <?php elseif(!empty($success)): ?>
                                    <div class="alert alert-info">
                                        <b><?php echo $success ?></b>
                                    </div>
                                <?php endif; ?>     

                                <div class="d-flex justify-content-center my-4">
                                    <button id="btnSubir" class="btn btn-primary px-5 py-2"><i class="fas fa-edit"></i> <b>Agregar Película</b></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php include 'views/estadisticas.php'; ?>
                </div>
            </main>
        </div> 
    </div>
</body>
</html>