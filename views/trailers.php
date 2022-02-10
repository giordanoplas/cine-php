<?php $countItems = ceil(count($trailersIndex) / 3); $actual = 0; $trailer_por_slide = 3; ?>

<div class="container-fluid my-5 mx-0">
    <div class="row text-center trailers">
        <div class="col-12">
            <img src="img/popcorn.png">
            <p class="encabezado text-white">Trailers</p>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="carousel slide" style="max-width:1400px;" id="trailerSlider" data-interval="false">
                <div class="carousel-inner">
                    <?php for($i = 0; $i < $countItems; $i++): ?>
                        <?php if($i === 0): ?>
                        <div class="carousel-item active">
                        <?php else: ?>
                        <div class="carousel-item">
                        <?php endif; ?>												
                            <div class="row p-4">
                                <?php for($x = 0; $x < $trailer_por_slide; $x++): ?>
                                <div class="col">
                                    <?php echo $trailersIndex[$actual]['iframe']; ?>						
                                </div>
                                <?php $actual++; ?>
                                <?php endfor; ?>
                            </div>			
                        </div>
                    <?php endfor; ?>
                </div>				
            </div>	
            
            <a href="#trailerSlider" class="carousel-control-prev" data-slide="prev">
                <span class="fas fa-caret-left" aria-hidden="true" style="font-size:50px;"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a href="#trailerSlider" class="carousel-control-next" data-slide="next">
                <span class="fas fa-caret-right" aria-hidden="true" style="font-size:50px;"></span>
                <span class="sr-only">Siguiente</span>
            </a>			
        </div>
    </div>
</div>