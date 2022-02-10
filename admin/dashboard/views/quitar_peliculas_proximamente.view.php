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
                            <h3 class="titulo text-danger">Quitar Película Próximamente</h3>
                            <form id="agregar-libro-form" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">                                                                                            
                                <input type="hidden" name="peliculaId" id="peliculaId">
                                <input type="text" name="autocomplete" id="autocomplete" placeholder="Buscar Película:">
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
                                    <button id="btnSubir" class="btn btn-danger py-2 px-4"><i class="far fa-trash-alt"></i> <b>Quitar</b></button>
                                </div>                                     
                            </form>
                        </div>
                    </div>

                    <?php include 'views/estadisticas.php'; ?>
                </div>
            </main>
        </div> 
    </div>
    <script src="<?php echo $cine_admin['dashboard']; ?>js/asignar_autocomplete.js"></script>
</body>
</html>