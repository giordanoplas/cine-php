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
                            <h3 class="titulo">Modificar Franquicia</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                                                            
                                <?php if(isset($franquicia)): ?>
                                <div class="alert alert-warning text-center">
                                    <h4><strong><?php echo $franquicia['nombre']; ?></strong></h4>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $franquicia['id']; ?>">	
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" value="<?php echo $franquicia['nombre']; ?>">                                                          
                                <hr>

                                <label class="label"><strong class="text-primary">Logo:</strong> <input type="file" name="logo" id="logo" accept="image/png"></label>
                                <input type="hidden" id="logo_guardado" name="logo_guardado" value="<?php echo $franquicia['logo']; ?>">
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

                                <input type="text" name="autocomplete" id="autocomplete" placeholder="Buscar Franquicia:">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" disabled>
                                <hr>

                                <label class="label"><strong class="text-primary">Logo:</strong> <input type="file" name="logo" id="logo" accept="image/jpg, image/png" disabled></label>
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