<?php
if(isset($disclaimer_articles) && count($disclaimer_articles)> 0):
?>
<!-- Categories -->
<div class="bg-color-sky-light">
    <div class="content-lg container" style="padding-top: 20px; padding-bottom: 15px;">
        <div class="row row-space-1">

            <?php
            $x = 0;
            foreach($disclaimer_articles as $disclaimer_article):
                $x++;

            ?>

            <div class="col-sm-4 col-md-<?= $x === 1 ? '3' : ( ($x === 2 ? '4 col-md-offset-1' : '3 col-md-offset-1') ) ?>  text-center">
                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                    <!-- Pricing -->
                    <div class="pricing disclaimer-relative" onclick="window.location='<?= site_url('/articolo/'.$disclaimer_article->url_tag); ?>'">
                        <div class="margin-b-30">

                            <div style="text-align: center">
                                <i class="pricing-icon icon-chemistry"></i>
                            </div>

                            <h3><?= $disclaimer_article->title; ?></h3>
                            <p><?= $disclaimer_article->small_description; ?></p>
                        </div>
                        <a href="<?= site_url('/articolo/'.$disclaimer_article->url_tag); ?>" class="btn-theme btn-theme-sm btn-default-bg text-uppercase disclaimer-btn">Leggi di piú</a>
                    </div>
                    <!-- End Pricing -->
                </div>
            </div>
            <?php
            endforeach;
            ?>

        </div>
    </div>
</div>
<!-- End Categories -->
<?php
endif;
?>
