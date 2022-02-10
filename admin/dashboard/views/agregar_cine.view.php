<?php require 'views/header.php'; ?>

<body>
    <div class="container-fluid">
        <div class="row"> 
            <?php include 'views/barra_lateral.php'; ?>

            <main class="col">
                <div class="row">
                    <div class="columna col-lg-7">
                        <div class="widget">
                            <h3 class="titulo">Agregar Cine</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                            
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre:">
                                <textarea name="descripcion" placeholder="Descripción:"></textarea>
                                <input type="text" name="precio" placeholder="Precio:"> 
                                <input type="text" name="telefono" placeholder="Teléfono:">
                                <hr>

                                <div class="form-group">
                                    <label for="franquicias">Franquicias:</label>
                                    <select name="franquicias" id="franquicias" class="custom-select">
                                        <option value="0" class="red-msn">N/A</option>
                                        <?php if(count($franquicias) > 0): ?>                           
                                            <?php foreach($franquicias as $franquicia): ?>
                                                <option value="<?php echo $franquicia['id'] ?>"><?php echo $franquicia['nombre'] ?></option>                                                                                                     
                                            <?php endforeach; ?>                         
                                        <?php endif; ?>
                                    </select>                                    
                                </div>   

                                <div class="form-group">
                                    <label for="lugares">Lugares:</label>
                                    <select name="lugares" id="lugares" class="custom-select">
                                        <option value="0" class="red-msn">N/A</option>
                                        <?php if(count($lugares) > 0): ?>                           
                                            <?php foreach($lugares as $lugar): ?>
                                                <option value="<?php echo $lugar['id'] ?>"><?php echo $lugar['nombre'] ?></option>                                                                                                     
                                            <?php endforeach; ?>                         
                                        <?php endif; ?>
                                    </select>                                    
                                </div>                           
                                <hr>

                                <label class="label"><strong class="text-primary">Mapa:</strong> <input type="file" name="mapa" id="mapa" accept="image/jpeg, image/png"></label>
                                <label class="label"><strong class="text-primary">Thumb:</strong> <input type="file" name="thumb" id="thumb" accept="image/jpeg, image/png"></label>
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
                                    <button id="btnSubir" class="btn btn-primary px-5 py-2"><i class="fas fa-edit"></i> <b>Agregar Cine</b></button>
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