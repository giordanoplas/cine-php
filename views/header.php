<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="<?php echo RUTA ?>img/favicon.ico"/>
    <script src="https://kit.fontawesome.com/ba3661d33a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Lato:wght@400;700&family=Open+Sans:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/cubo3d.css">
    <title>Cine GP Design</title>
</head>
<body>
    <header>
        <input type="hidden" name="seleccion" id="seleccion" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
        <div class="container-fluid">
            <div class="row my-4 d-flex justify-content-center align-items-center">
                <div class="col-auto mx-2 my-2 d-flex">
                    <a href="<?php echo RUTA; ?>"><img src="<?php echo RUTA . $cine_config['carpeta_imagenes']; ?>logotipo/gpcine.png" class="logo"></a>
                </div>
                <div class="menu_bar d-sm-none d-flex justify-content-end align-items-center mx-5">
                    <a href="#" id="btn-menu"><i class="fas fa-bars"></i></a>
                </div>
                <nav class="col-auto menu d-none d-sm-flex justify-content-center">
                    <a href="<?php echo RUTA ?>carteleras.php" id="carteleras">
                        <i class="fab fa-accusoft d-none d-md-inline"></i> 
                        <p class="d-inline p-menu">Carteleras</p>
                    </a>
                    <a href="<?php echo RUTA ?>estrenos.php" id="estrenos">
                        <i class="fas fa-video d-none d-md-inline"></i>
                        <p class="d-inline p-menu">Estrenos</p>
                    </a>
                    <a href="<?php echo RUTA ?>proximamente.php" id="proximamente">
                        <i class="fab fa-algolia d-none d-md-inline"></i>
                        <p class="d-inline p-menu">Próximamente</p>
                    </a>
                    <a href="<?php echo RUTA ?>trailers.php" id="trailers">
                        <i class="fab fa-youtube d-none d-md-inline" id="trailers"></i>
                        <p class="d-inline p-menu">Trailers</p>
                    </a>
                </nav>               
            </div>
        </div>

        <!-- Barra lateral izquierda -->
        <div class="col-md-3 barra-lateral-izquierda d-block d-sm-none" id="barra-lateral-izquierda">
            <div class="d-flex justify-content-center my-3">
                <img src="<?php echo RUTA . $cine_config['carpeta_imagenes']; ?>logotipo/gpcine.png" width="130px">
            </div>            
            <nav>
                <a href="<?php echo RUTA ?>carteleras.php" id="carteleras">
                    <i class="fab fa-accusoft"></i> 
                    <p class="d-inline p-menu">Carteleras</p>
                </a>
                <a href="<?php echo RUTA ?>estrenos.php" id="estrenos">
                    <i class="fas fa-video"></i>
                    <p class="d-inline p-menu">Estrenos</p>
                </a>
                <a href="<?php echo RUTA ?>proximamente.php" id="proximamente">
                    <i class="fab fa-algolia"></i>
                    <p class="d-inline p-menu">Próximamente</p>
                </a>
                <a href="<?php echo RUTA ?>trailers.php" id="trailers">
                    <i class="fab fa-youtube"></i>
                    <p class="d-inline p-menu">Trailers</p>
                </a>
            </nav>
        </div>
        <a href="#" class="fondo-enlace d-md-none" id="fondo-enlace"></a>

        <script src="<?php echo RUTA ?>js/menu.js"></script>
    </header>