<?php
    if(isset($navbar)):
?>
<!--========== HEADER ==========-->
<header class="header navbar-fixed-top">
    <!-- Navbar -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="menu-container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="toggle-icon"></span>
                </button>

                <!-- Logo -->
                <div class="logo">
                    <a class="logo-wrap" href="<?= site_url('/home') ?>">
                        <img class="logo-img logo-img-main" src="<?= site_url('/resources/img/logo.png') ?>" alt="Light Life Hemp Shop Logo">
                        <img class="logo-img logo-img-active" src="<?= site_url('/resources/img/logo-dark.png') ?>" alt="Light Life Hemp Shop Logo">
                    </a>
                </div>
                <!-- End Logo -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-collapse">
                <div class="menu-container">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item"><a class="nav-item-child nav-item-hover <?= current_url() === site_url('/') ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a></li>
                        <li class="nav-item">
                            <a class="nav-item-child nav-item-hover <?= strpos(current_url(),site_url('/shop')) !== FALSE ? 'active' : '' ?>"  href="javascript:void(0);">Shop</a>
                            <ul class="subnavbar">
                                <li><a href="<?= site_url('/shop'); ?>" class="<?= strpos(current_url(),site_url('/shop')) !== FALSE ? 'active' : '' ?>">Vedi Shop</a></li>
                                <?php
                                    foreach($caller_controller->Category_model->getAll() as $cat_links): ?>

                                        <li><a href="<?= site_url('/shop/categoria/' . $cat_links->url_tag); ?>" class="<?= strpos(current_url(), site_url('/shop/categoria/' . $cat_links->url_tag)) !== FALSE ? 'active' : '' ?>"><?= $cat_links->title; ?></a></li>

                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-item-child nav-item-hover <?= current_url() === site_url('/dove-siamo') ? 'active' : '' ?>" href="<?= site_url('/dove-siamo') ?>">Dove Siamo</a></li>
                        <li class="nav-item"><a class="nav-item-child nav-item-hover <?= current_url() === site_url('/contattami') ? 'active' : '' ?>" href="<?= site_url('/contattami') ?>">Contattami</a></li>
                        <li class="nav-item"><a class="nav-item-child nav-item-hover " href="https://www.facebook.com/lightlife.italia/" target="_blank"><img width="30" src="<?= site_url('resources/img/fbm.png'); ?>"></a></li>
                        <li class="nav-item"><a class="nav-item-child nav-item-hover toggle_cart_link" href="#"><img width="30" src="<?= site_url('resources/img/cart.png'); ?>"></a></li>
                    </ul>

                </div>
            </div>
            <!-- End Navbar Collapse -->
        </div>
    </nav>
    <!-- Navbar -->
</header>
<?php if(isset($navbar_size) && $navbar_size === true): ?>
    <div class="navbar-size"></div>
<?php endif; ?>
<!--========== END HEADER ==========-->
    <?php
endif;
?>