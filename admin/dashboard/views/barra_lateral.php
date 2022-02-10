<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<div class="barra-lateral col-12 col-sm-auto">
    <input type="hidden" name="current_page" id="current_page" value="<?php echo $current_page; ?>">
    <div class="logo d-flex justify-content-center align-items-center">
        <a href="<?php echo RUTA; ?>" target="_blank"><img src="<?php echo RUTA . $cine_config['carpeta_imagenes']; ?>logotipo/gpcine.png"></a>
    </div>
    <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
        <a id="menu1" href="<?php echo $cine_admin['dashboard']; ?>"><i class="fas fa-house-user"></i><span>Inicio</span></a>

        <div class="dropdown">
            <a id="menu2" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-plus-circle"></i><span>Agregar</span></a>
            <div class="dropdown-menu bg-light" aria-labelledby="menu2">
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>agregar_cine.php">Cine</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>agregar_franquicia.php">Franquicia</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>agregar_lugar.php">Lugar</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>agregar_pelicula.php">Película</a>
            </div> 
        </div>
        <div class="dropdown">
            <a id="menu3" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-pen-fancy"></i><span>Modificar</span></a>
            <div class="dropdown-menu bg-light" aria-labelledby="menu3">
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>modificar_cine.php">Cine</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>modificar_franquicia.php">Franquicia</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>modificar_lugar.php">Lugar</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>modificar_pelicula.php">Película</a>
            </div>    
        </div>
        <div class="dropdown">
            <a id="menu4" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-map-pin"></i><span>Asignar</span></a>
            <div class="dropdown-menu bg-light" aria-labelledby="menu4">
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>asignar_peliculas_cine.php">Película Cine</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>asignar_peliculas_estrenos.php">Película Estreno</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>asignar_peliculas_proximamente.php">Película Próximamente</a>
            </div>    
        </div>
        <div class="dropdown">
            <a id="menu5" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-trash"></i><span>Quitar</span></a>
            <div class="dropdown-menu bg-light" aria-labelledby="menu5">
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>quitar_peliculas_cine.php">Película Cine</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>quitar_peliculas_estrenos.php">Película Estreno</a>
                <a class="dropdown-item text-dark" href="<?php echo $cine_admin['dashboard']; ?>quitar_peliculas_proximamente.php">Película Próximamente</a>
            </div>     
        </div>     
        
        <a href="<?php echo $cine_admin['dashboard']; ?>cerrar.php"><i class="fas fa-sign-out-alt"></i><span>Salir</span></a>
    </nav>
</div>