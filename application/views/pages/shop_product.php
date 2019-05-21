<!--========== END PAGE LAYOUT ==========-->
<?php if(isset($product) && $product): ?>

    <div class="article-item">
        <div class="article-container">
            <h1 class="carousel-title medium"><?= $product->name; ?></h1>
            <p style="color: white; font-size: 16px;"><?= $product->small_description; ?></p>
        </div>
    </div>



<!--========== PAGE LAYOUT ==========-->
<!-- Our Exceptional Solutions -->
<div class="content-lg container" style="padding-top: 40px">

    <!-- About -->
    <div class="content-lg container">
        <!--// end row -->

        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <img class="img-responsive" src="<?= $product->image_small ?>" alt="<?= $product->name ?>">
            </div>
            <div class="col-sm-7 sm-margin-b-50">
                <div class="margin-b-30">
                    <p><?= strlen($product->big_description) > 0 ? $product->big_description : $product->small_description; ?></p>
                </div>

                <?php
                $extra_info = json_decode($product->extra_info);

                if($extra_info):

                    ?>
                    <div>
                        <table class="table">
                            <tbody>
                            <?php
                            foreach ($extra_info as $key => $value):
                                ?>
                                <tr>
                                    <th><?= $key ?></th>
                                    <td><?= $value ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                endif;
                ?>

            </div>
        </div>
        <!--// end row -->
    </div>
    <!-- End About -->


        <div class="row">
            <div class="col-sm-12 text-center">
                <h4><a href="tel:+393485577727">Chiama Subito: <br><i>(+39) 348 557 7727</i></a></a></h4>
            </div>
            <div class="col-sm-12 text-center">
                <h5><a href="<?= site_url('/shop/categoria/'.$category->url_tag); ?>">Torna alla categoria: <?= $category->title; ?></a></h5>
            </div>
        </div>
        <!--// end row -->

    </div>
<?php
endif;
?>

