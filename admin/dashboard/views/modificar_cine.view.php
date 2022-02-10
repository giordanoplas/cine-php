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
                            <h3 class="titulo">Modificar Cine</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                                                            
                                <?php if(isset($cine)): ?>
                                <div class="alert alert-warning text-center">
                                    <h4><strong><?php echo $cine['nombre']; ?></strong></h4>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $cine['id']; ?>">	
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" value="<?php echo $cine['nombre']; ?>">
                                <textarea name="descripcion" placeholder="Descripción:"><?php echo $cine['descripcion']; ?></textarea>
                                <input type="text" name="precio" placeholder="Precio:" value="<?php echo $cine['precio']; ?>"> 
                                <input type="text" name="telefono" placeholder="Teléfono:" value="<?php echo $cine['telefono']; ?>">
                                <hr>

                                <div class="form-group">
                                    <label for="franquicias">Franquicias:</label>
                                    <select name="franquicias" id="franquicias" class="custom-select">
                                        <?php if(count($franquicias) > 0): ?>                           
                                            <?php foreach($franquicias as $franquicia): ?>
                                                <?php if($franquicia['id'] == $cine['franquiciaID']): ?>
                                                    <option value="<?php echo $franquicia['id'] ?>" selected><?php echo $franquicia['nombre'] ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $franquicia['id'] ?>"><?php echo $franquicia['nombre'] ?></option>
                                                <?php endif; ?>                                                                                                                                                     
                                            <?php endforeach; ?>                         
                                        <?php endif; ?>
                                    </select>                                    
                                </div>   

                                <div class="form-group">
                                    <label for="lugares">Lugares:</label>
                                    <select name="lugares" id="lugares" class="custom-select">
                                        <?php if(count($lugares) > 0): ?>                           
                                            <?php foreach($lugares as $lugar): ?>
                                                <?php if($lugar['id'] == $cine['lugarID'] ): ?>
                                                    <option value="<?php echo $lugar['id'] ?>" selected><?php echo $lugar['nombre'] ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $lugar['id'] ?>"><?php echo $lugar['nombre'] ?></option>
                                                <?php endif; ?>                                                                                                                                                     
                                            <?php endforeach; ?>                         
                                        <?php endif; ?>
                                    </select>                                    
                                </div>                           
                                <hr>

                                <label class="label"><strong class="text-primary">Mapa:</strong> <input type="file" name="mapa" id="mapa" accept="image/jpeg, image/png"></label>
                                <label class="label"><strong class="text-primary">Thumb:</strong> <input type="file" name="thumb" id="thumb" accept="image/jpeg, image/png"></label>
                                <input type="hidden" id="mapa_guardado" name="mapa_guardado" value="<?php echo $cine['mapa']; ?>">
                                <input type="hidden" id="thumb_guardado" name="thumb_guardado" value="<?php echo $cine['thumb']; ?>">
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

                                <input type="text" name="autocomplete" id="autocomplete" placeholder="Buscar Cine:">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:" disabled>
                                <textarea name="descripcion" placeholder="Descripción:" disabled></textarea>
                                <input type="text" name="precio" placeholder="Precio:" disabled> 
                                <input type="text" name="telefono" placeholder="Teléfono:" disabled>
                                <hr>

                                <div class="form-group">
                                    <label for="franquicias">Franquicias:</label>
                                    <select name="franquicias" id="franquicias" class="custom-select" disabled>
                                        <option value="0" class="red-msn">N/A</option>                                        
                                    </select>                                    
                                </div>   

                                <div class="form-group">
                                    <label for="lugares">Lugares:</label>
                                    <select name="lugares" id="lugares" class="custom-select" disabled>
                                        <option value="0" class="red-msn">N/A</option>                                        
                                    </select>                                    
                                </div>                           
                                <hr>

                                <label class="label"><strong class="text-primary">Mapa:</strong> <input type="file" name="mapa" id="mapa" accept="image/jpg, image/png" disabled></label>
                                <label class="label"><strong class="text-primary">Thumb:</strong> <input type="file" name="thumb" id="thumb" accept="image/jpg, image/png" disabled></label>
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