 <?php
        if(isset($products) && count($products)> 0):
        ?>
        <!-- Categories -->
        <div class="bg-color-sky-light">
            <div class="content-lg container" style="padding-top: 20px; padding-bottom: 15px;">
                <div class="row row-space-1">

                    <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>

                        <div class="wbtn_container">
                            <a href="javascript:void(0);" class="addWidget product_add_toggle"></a>
                        </div>

                        <div style="display: none;" data-product-add class="product_add col-sm-5 col-sm-offset-2 text-center" >
                            <div>


                                    <div class="wbtn_container">
                                        <a href="javascript:void(0);" class="deleteWidget cancel_add_product"></a>

                                    </div>


                                <!-- Pricing -->
                                <div class="pricing">
                                    <div class="margin-b-30">

                                        <div class="margin-b-20">
                                            <div>
                                                <img style="max-height: 143px;" class="img-responsive w_image">
                                                <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>
                                                    <form class="w_add_img_form" action="<?= site_url('/dashboard/shop/product/add') ?>" method="post" enctype="multipart/form-data">
                                                        <input type="file" class="w_file" name="w_file" style="display: none"/>
                                                        <button type="button" class="w_add_img">Seleziona immagine</button>


                                                        <input type="hidden" name="return_url" value="<?= current_url(); ?>"/>
                                                        <input type="hidden" name="name" class="hidden_prod_title"/>
                                                        <input type="hidden" name="small_description" class="hidden_prod_small_desc"/>
                                                        <input type="hidden" name="category_id" value="<?= $products[0]->category_id; ?>"/>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <h3 class="w_title data_product_name"><input type="text"/></h3>
                                        <p class="w_description"><textarea></textarea></p>
                                    </div>
                                    <a href="javascript:void(0);" class="btn-theme btn-theme-sm btn-default-bg text-uppercase add_prod_final">Aggiungi prodotto</a>
                                    <div style="clear: both"></div>

                                </div>
                                <!-- End Pricing -->
                            </div>
                        </div>

                    <?php endif; ?>


                    <?php
                    $i = 0;
                    $x = 0;
                    foreach($products as $key =>$product):
                    $i++;
                    $x++;
                    ?>

                    <div data-product-id="<?= $product->id ?>" class="product_item_container <?php if(count($products) % 2 == 0 || count($products) < 3): ?>col-sm-5<?php else: ?> col-sm-4  <?php endif;?> text-center  <?= ($x === 2) ? 'col-sm-offset-2' : '' ?>" >
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">


                            <!-- Pricing -->
                            <div class="pricing" data-call-link="window.location='<?= $product->product_page ? site_url('/shop/prodotto/'.$product->url_tag) : 'tel:+393485577727' ?>'">
                                <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>
                                    <div class="wbtn_container">
                                        <a href="javascript:void(0)" data-current-list-order="<?= $product->list_order ?>" data-set-list-order="<?= isset($products[$key-1]) ? $products[$key-1]->list_order : $product->list_order ?>" class=" arrowLeft"></a>
                                        <a href="javascript:void(0)" data-current-list-order="<?= $product->list_order ?>" data-set-list-order="<?= isset($products[$key+1]) ? $products[$key+1]->list_order : $product->list_order ?>" class=" arrowRight"></a>

                                        <a href="javascript:void(0);" class="editWidget edit_product"></a>
                                        <a href="javascript:void(0);" class="saveWidget save_product" style="display: none"></a>
                                        <a href="javascript:void(0);" class="deleteWidget delete_product" style="display: none"></a>
                                        <a href="javascript:void(0);" class="changeCategory">cambia categoria</a>
                                        <select style="display: none" class="changeCategory setProductCategory" data-product-id="<?= $product->id; ?>">
                                            <option value="">Seleziona categoria</option>
                                            <?php  foreach($all_cat as $cat): ?>
                                                <?php if($cat->id != $product->category_id): ?>
                                                    <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="file" style="display: none"/>
                                    </div>
                                <?php endif; ?>


                                <div class="margin-b-30">

                                    <div class="margin-b-20">
                                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                            <img style="max-height: 143px;" class="img-responsive" src="<?= site_url($product->image_small) ?>" alt="<?= $product->name ?>">
                                            <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>
                                                <form style="display: none" class="w_change_img_form" action="<?= site_url('/dashboard/shop/product/change_image') ?>" method="post" enctype="multipart/form-data">
                                                    <input type="file" class="w_file" name="w_file" style="display: none"/>
                                                    <button type="button" class="w_change_img">Cambia immagine</button>


                                                    <input type="hidden" name="return_url" value="<?= current_url(); ?>"/>
                                                    <input type="hidden" name="prod_id" value="<?= $product->id ?>"/>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <h3 class="w_title data_product_name"><?= $product->name ?></h3>
                                    <p class="w_description"><?= $product->small_description ?></p>
                                </div>
                                <a href="<?= $product->product_page ? site_url('/shop/prodotto/'.$product->url_tag) : 'tel:+393485577727' ?>" class="btn-theme btn-theme-sm btn-default-bg text-uppercase"><?= $product->product_page ? 'Leggi di piú' : 'Chiama Subito' ?></a>
                                <div style="clear: both"></div>
                                <a  style="margin-top: 10px; margin-right: 10px; display: inline-block;" href="javascript:void(0);" class=" add_to_cart_link"><span>+</span> carrello</a>

                                <a  style="margin-top: 10px; display: inline-block;" href="javascript:void(0);" class=" remove_from_cart_link"><span>-</span> carrello</a>
                            </div>
                            <!-- End Pricing -->
                        </div>
                    </div>

                    <?php
                    if ($x === 2)$x = 0;
                    if($i === count($products)-1): ?>
                </div>
                <div class="row">
                    <?php
                    $i = 0;
                    endif;

                    endforeach;
                    ?>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Categories -->
            <?php
            endif;
            ?>
