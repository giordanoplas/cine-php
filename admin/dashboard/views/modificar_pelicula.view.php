<?php $cur_page = basename($_SERVER['PHP_SELF']); ?>

<?php require 'views/header.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row"> 
            <?php include 'views/barra_lateral.php'; ?>
            <input type="hidden" id="cur_page" name="cur_page" value="<?php echo $cur_page; ?>">
            <main class="col">
                <div class="row">
                    <div class="columna col-lg-7">
                        <div class="widget">
                            <h3 class="titulo">Modificar Película</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                                                            
                                <?php if(isset($pelicula)): ?>
                                <div class="alert alert-warning text-center">
                                    <h4><strong><?php echo $pelicula['nombre']; ?></strong></h4>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $pelicula['id']; ?>">	
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" value="<?php echo $pelicula['nombre']; ?>">                                                          
                                <textarea name="iframe" placeholder="Iframe:"><?php echo $pelicula['iframe']; ?></textarea>                                                       
                                <hr>

                                <label class="label"><strong class="text-primary">Cartelera:</strong> <input type="file" name="cartelera" id="cartelera" accept="image/jpeg, image/png"></label>
                                <label class="label"><strong class="text-primary">Slideshow:</strong> <input type="file" name="slideshow" id="slideshow" accept="image/jpeg, image/png"></label>
                                <input type="hidden" id="cartelera_guardado" name="cartelera_guardado" value="<?php echo $pelicula['cartelera']; ?>">
                                <input type="hidden" id="slideshow_guardado" name="slideshow_guardado" value="<?php echo $pelicula['slideshow']; ?>">
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

                                <div class="d-block d-sm-flex justify-content-center my-4">
                                    <button id="btnSubir" class="btn btn-primary py-2 px-4"><i class="fas fa-pen-nib"></i> <b>Modificar</b></button>
                                    <button id="btnCancelar" class="btn btn-secondary mx-0 ml-sm-2 my-2 my-sm-0 py-2 px-4"><i class="far fa-window-close"></i> <b>Cancelar</b></button>
                                </div>

                                <?php else: ?>

                                <input type="text" name="autocomplete" id="autocomplete" placeholder="Buscar Película:">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" disabled>
                                <textarea name="iframe" placeholder="Iframe:" disabled></textarea>
                                <hr>

                                <label class="label"><strong class="text-primary">Cartelera:</strong> <input type="file" name="cartelera" id="cartelera" accept="image/jpeg, image/png" disabled></label>
                                <label class="label"><strong class="text-primary">Slideshow:</strong> <input type="file" name="slideshow" id="slideshow" accept="image/jpeg, image/png" disabled></label>
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

                                <div class="d-block d-sm-flex justify-content-center my-4">
                                    <button id="btnSubir" class="btn btn-primary py-2 px-4" disabled><i class="fas fa-pen-nib"></i> <b>Modificar</b></button>
                                    <button id="btnCancelar" class="btn btn-secondary mx-0 ml-sm-2 my-2 my-sm-0 py-2 px-4" disabled><i class="far fa-window-close"></i> <b>Cancelar</b></button>
                                </div>
                                <?php endif; ?>                        
                            </form>
                        </div>
                    </div>

                    <?php include 'views/estadisticas.php'; ?>
                </div>
            </main>
        </div> 
    </div>
    <script src="<?php echo $cine_admin['dashboard']; ?>js/autocomplete.js"></script>
</body>
</html>