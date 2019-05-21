<?php
if(isset($categories) && count($categories)> 0):
    ?>
    <!-- Categories -->
    <div class="bg-color-sky-light">
    <div class="content-lg container" style="padding-top: 20px; padding-bottom: 15px;">
        <div class="row row-space-1">

            <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>

                <div class="wbtn_container">
                    <a href="javascript:void(0);" class="addWidget category_add_toggle"></a>
                </div>

                <div style="display: none;" class="category_add col-sm-5 col-sm-offset-2 text-center" data-category-add>


                    <div class="">


                            <div class="wbtn_container">
                                <a href="javascript:void(0);" class="saveWidget category_add"></a>
                                <a href="javascript:void(0);" class="deleteWidget cancel_category_add"></a>
                            </div>

                        <!-- Pricing -->
                        <div class="pricing">

                            <div class="margin-b-30" >

                                    <div class="margin-b-20">
                                        <div>
                                            <img style="max-height: 143px; " class="img-responsive w_image">

                                            <form class="w_add_img_form" action="<?= site_url('/dashboard/shop/category/add') ?>" method="post" enctype="multipart/form-data">
                                            <input type="file" class="w_file" name="w_file" style="display: none"/>
                                            <button type="button" class="w_add_img">Seleziona immagine</button>


                                            <input type="hidden" name="return_url" value="<?= current_url(); ?>"/>
                                            <input type="hidden" name="title" class="hidden_cat_title"/>
                                            <input type="hidden" name="small_description" class="hidden_cat_small_desc"/>

                                            </form>
                                        </div>
                                    </div>

                                    <h3 class="w_title"><input type="text"/></h3>
                                    <p class="w_description"><textarea></textarea></p>

                            </div>
                            <a href="javascript:void(0);" class="btn-theme btn-theme-sm btn-default-bg text-uppercase add_cat_final">Aggiungi categorie</a>
                        </div>
                        <!-- End Pricing -->
                    </div>
                </div>

            <?php endif; ?>

            <?php
            $i = 0;
            $x = 0;
            foreach($categories as $category):
            $i++;
            $x++;
            ?>

            <div class="category_item_container col-sm-5 <?= ($x === 2) ? 'col-sm-offset-2' : '' ?> text-center" data-category-id="<?= $category->id ?>">

                <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">

                    <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>
                    <div class="wbtn_container">
                        <a href="javascript:void(0);" class="editWidget edit_category"></a>
                        <a href="javascript:void(0);" class="saveWidget save_category" style="display: none"></a>
                        <a href="javascript:void(0);" class="deleteWidget delete_category" style="display: none"></a>
                    </div>
                    <?php endif; ?>
                    <!-- Pricing -->
                    <div class="pricing">

                        <div class="margin-b-30" >

                            <div class="margin-b-20">
                                <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                    <img style="max-height: 143px;" class="img-responsive w_image" src="<?= site_url($category->image_small) ?>" alt="<?= $category->title ?>">
                                    <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>
                                        <form style="display: none" class="w_change_img_form" action="<?= site_url('/dashboard/shop/category/change_image') ?>" method="post" enctype="multipart/form-data">
                                            <input type="file" class="w_file" name="w_file" style="display: none"/>
                                            <button type="button" class="w_change_img">Cambia immagine</button>


                                            <input type="hidden" name="return_url" value="<?= current_url(); ?>"/>
                                            <input type="hidden" name="cat_id" value="<?= $category->id ?>"/>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <h3 class="w_title"><?= $category->title ?></h3>
                            <p class="w_description"><?= $category->small_description ?></p>
                        </div>
                        <a href="<?= site_url('/shop/categoria/'.$category->url_tag) ?>" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Leggi di piú</a>
                    </div>
                    <!-- End Pricing -->
                </div>
            </div>

            <?php
            if ($x === 2)$x = 0;
            if($i === count($categories)-1): ?>
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
