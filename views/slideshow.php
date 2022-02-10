<div class="container-fluid mb-5">
	<div class="row">
		<div class="col d-flex justify-content-center align-items-center mr-0 p-0">
			<div class="carousel slide carousel-fade" style="max-width:1400px;" id="slider" data-ride="carousel">
				<ol class="carousel-indicators">					
					<?php for($i = 0; $i < count($slideshow); $i++): ?>
						<?php if($i === 0): ?>
						<li data-target="#slider" data-slide-to="<?php echo $i; ?>" class="active"></li>
						<?php else: ?>
						<li data-target="#slider" data-slide-to="<?php echo $i; ?>"></li>
						<?php endif; ?>
					<?php endfor; ?>
				</ol>
				<div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach($slideshow as $slider): ?>
                <?php if($i === 0): ?>
                    <div class="carousel-item active">
                <?php else: ?>
                    <div class="carousel-item">
                <?php endif; ?>
                        <img src="<?php echo $cine_config['carpeta_slideshow'] . $slider['slideshow']; ?>" class="img-fluid">    
                    </div>
                <?php $i++ ?>
                <?php endforeach; ?>					
				</div>				
			</div>					
		</div>	
	</div>
</div>
<script>
    $('.carousel').carousel({
        interval: 3000
    })
</script>