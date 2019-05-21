<?php if(isset($featured_products) && count($featured_products) > 0): ?>
<div class="content-lg container" style="padding-bottom: 10px">
    <div class="bg-color-white" style="padding-top: 20px; padding-bottom: 20px">

        <div class="row">
            <div class="col-sm-6">
                <h2>La nostra vetrina</h2>
                <p>Controlla i nostri prodotti in vetrina</p>
            </div>
        </div>

        <!--// end row -->
        <!-- Swiper Clients -->
        <div class="swiper-slider swiper-clients">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($featured_products as $product): ?>
                    <div class="swiper-slide" onclick="window.location='<?= site_url('/shop/prodotto/'.$product->url_tag); ?>'">
                        <img class="swiper-clients-img" src="<?= site_url($product->image_small); ?>" alt="<?= $product->name; ?>">
                        <br>
                        <b><?= $product->name; ?></b>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- End Swiper Wrapper -->

            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- End Swiper Clients -->
    </div>
</div>
<?php endif; ?>