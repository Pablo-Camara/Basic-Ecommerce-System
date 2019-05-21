<?php
    if(isset($use_parallax) && $use_parallax): ?>
<!--========== PARALLAX ==========-->
<div class="parallax-window" data-parallax="scroll" data-image-src="<?= site_url($parallax_image ? $parallax_image : 'No image') ?>">
    <div class="parallax-content container">
        <h1 class="carousel-title"><?= $parallax_title ? $parallax_title : 'No title'?></h1>
        <p class="white bigger"><?= $parallax_description ? $parallax_description : 'No description'?></p>
    </div>
</div>
<!--========== PARALLAX ==========-->
<?php
    endif;
?>