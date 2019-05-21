<?php if(isset($article) && $article): ?>

<div class="article-item">
    <div class="article-container">
        <h1 class="carousel-title medium"><?= $article->title; ?></h1>
        <p style="color: white; font-size: 16px;"><?= $article->full_description; ?></p>
    </div>
</div>

<?php
    else:

        if(isset($category) && $category):
?>
<!--========== PAGE LAYOUT ==========-->
<div class="content-lg container" style="padding-bottom: 10px">
        <div class="row">
            <div class="col-sm-12 text-center">
                    <h2><?= $category->title; ?></h2>
                    <p><?= $category->small_description; ?></p>
            </div>
        </div>
        <!--// end row -->
</div>

<?php
        endif;
    endif;
?>
<!--========== END PAGE LAYOUT ==========-->
    <?php
        $caller_controller->load->view('template/components/products',$data ? $data : null);
    ?>

<div class="content-lg container" style="padding-bottom: 10px">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h5><a href="<?= site_url('/shop'); ?>">Visualizza altre categorie</a></h5>
        </div>
    </div>
    <!--// end row -->

</div>