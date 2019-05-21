<?php
if(isset($featured_slides) && count($featured_slides) > 0): ?>
    <!--========== SLIDER ==========-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="container">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                $i = 0;
                foreach ($featured_slides as $slide): ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?= $i; ?>" <?= $i === 0 ? 'class="active"' : ''; ?>></li>

                    <?php
                    $i++;
                endforeach;
                ?>
            </ol>
        </div>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <?php
            $i = 1;
            foreach ($featured_slides as $slide):
                ?>

                <div class="item <?= $slide->item_active_classes ? $slide->item_active_classes : '' ?>">

                    <img class="img-responsive" src="<?= site_url($slide->image); ?>" alt="<?= $slide->title; ?>">
                    <div class="container">
                        <div class="carousel-centered" <?= ($i === 2) ? 'style="top: 38% !important;"': '' ?>>


                <?php if($i != 2): ?>
                            <div class="margin-b-40 margin-t-60">
                <?php endif; ?>
                                <a href="<?= site_url($slide->cta_link); ?>">
                                    <h1 class="carousel-title medium"><?= $slide->title; ?></h1>
                                    <?= $slide->small_description; ?>
                                </a>
                <?php if($i != 2): ?>
                            </div>
                <?php endif; ?>
                                <a href="<?= site_url($slide->cta_link); ?>" class="btn-theme btn-theme-sm btn-white-brd text-uppercase <?= $slide->cta_extra_classes; ?>"><?= $slide->cta_text; ?></a>

                        </div>
                    </div>
                </div>



            <?php
            $i++;
            endforeach;
            ?>
        </div>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--========== SLIDER ==========-->
<?php
endif;
?>