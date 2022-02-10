<div class="col-12 col-sm-4 d-flex justify-content-center accordion">   
    <div id="accordion">
        <h1 class="text-center px-5 py-2 mb-2 mt-0">Cartelera Cines</h1>
        <?php if(empty($franquicia)): ?>
            <?php $i = 0 ?>
            <?php foreach($lugares as $lugar): ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $i; ?>">
                        <h5 class="mb-0">
                            <button class="btn" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>" class="d-flex justify-content-between">
                                <?php echo $lugar['nombre']; ?>
                            </button>
                        </h5>
                    </div>
                    <?php if($i === 0 && empty($place)): ?>
                    <div id="collapse<?php echo $i; ?>" class="collapse show" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                    <?php elseif(!empty($place) && $lugar['nombre'] === $place): ?>
                    <div id="collapse<?php echo $i; ?>" class="collapse show" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                    <?php else: ?>
                    <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                    <?php endif; ?>
                        <div class="card-body">
                        <?php 
                            $conexion = conexion($bd_config);
                            if(!$conexion) {
                                header('Location: ' . RUTA . 'error.php');
                            }

                            $cines = obtener_cines_por_lugar($conexion, (int)$lugar['id']);

                            close_conexion($conexion);
                        ?>
                        <?php foreach($cines as $cine): ?>
                            <?php if($seleccion === $cine['nombre']): ?>
                                <a href="carteleras.php?lugar=<?php echo $lugar['nombre']; ?>&sel=<?php echo $cine['nombre']; ?>" class="btn btn-link seleccion d-block"><i class="fas fa-caret-right"></i> <?php echo $cine['nombre']; ?></a>
                            <?php else: ?>
                                <a href="carteleras.php?lugar=<?php echo $lugar['nombre']; ?>&sel=<?php echo $cine['nombre']; ?>" class="btn btn-link d-block"><i class="fas fa-caret-right"></i> <?php echo $cine['nombre']; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>  
        <?php else: ?>
            <?php 
                $conexion = conexion($bd_config);
                if(!$conexion) {
                    header('Location: ' . RUTA . 'error.php');
                }

                $lugaresID = obtener_lugares_id_cine_por_franquicia($conexion, $franquicia['id']);

                $lugaresFraquicias = array();
                if($lugaresID) {
                    foreach($lugaresID as $lug) {
                        $lugaresFraquicias[] = obtener_lugar_por_id($conexion, (int)$lug['lugarID'])[0];
                    }
                }

                close_conexion($conexion);
            ?>
            <?php if(!empty($lugaresFraquicias)): ?>
                <?php $i = 0 ?>
                <?php foreach($lugaresFraquicias as $lugar): ?>
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $i; ?>">
                            <h5 class="mb-0">
                                <button class="btn" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>" class="d-flex justify-content-between">
                                    <?php echo $lugar['nombre']; ?>
                                </button>
                            </h5>
                        </div>
                        <?php if($i === 0 && empty($place)): ?>
                        <div id="collapse<?php echo $i; ?>" class="collapse show" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                        <?php elseif(!empty($place) && $lugar['nombre'] === $place): ?>
                        <div id="collapse<?php echo $i; ?>" class="collapse show" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                        <?php else: ?>
                        <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                        <?php endif; ?>
                            <div class="card-body">
                            <?php 
                                $conexion = conexion($bd_config);
                                if(!$conexion) {
                                    header('Location: ' . RUTA . 'error.php');
                                }

                                $cinesLugFran = obtener_cines_por_lugar_franquicia($conexion, (int)$lugar['id'], (int)$franquicia['id']);

                                close_conexion($conexion);
                            ?>
                            <?php foreach($cinesLugFran as $cine): ?>
                                <?php if($seleccion === $cine['nombre']): ?>
                                    <a href="carteleras.php?lugar=<?php echo $lugar['nombre']; ?>&sel=<?php echo $cine['nombre']; ?>&franq=<?php echo $franquicia['nombre'] ?>" class="btn btn-link seleccion d-block"><i class="fas fa-caret-right"></i> <?php echo $cine['nombre']; ?></a>
                                <?php else: ?>
                                    <a href="carteleras.php?lugar=<?php echo $lugar['nombre']; ?>&sel=<?php echo $cine['nombre']; ?>&franq=<?php echo $franquicia['nombre'] ?>" class="btn btn-link d-block"><i class="fas fa-caret-right"></i> <?php echo $cine['nombre']; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?> 
                            </div>
                        </div>
                    </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <h2>Esta franquicia no tiene cines registrados.</h2>
            <?php endif; ?>
        <?php endif; ?>
    </div>   
</div>