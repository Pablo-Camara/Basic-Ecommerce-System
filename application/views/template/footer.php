
<?php
if(isset($map_first) && $map_first){
    $caller_controller->load->view('template/components/map',$data ? $data: null);
}
    $caller_controller->load->view('template/components/contact_box',$data ? $data: null);
if((isset($map_first) && !$map_first) || !isset($map_first)) {
    $caller_controller->load->view('template/components/map', $data ? $data : null);
}
    $caller_controller->load->view('template/components/disclaimer_articles',$data ? $data: null);
?>

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>
<div style="height: 40px; line-height: 40px; background-color: #386304; text-align: center; color: white">
   Light Life - Hemp Shop - Copyright @ 2018
</div>


<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- CORE PLUGINS -->
<script src="<?= site_url('/resources/vendor/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?= site_url('/resources/vendor/jquery-migrate.min.js') ?>" type="text/javascript"></script>
<script src="<?= site_url('/resources/vendor/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    $.ajax({
        type : "POST",
        url  : "<?= site_url("user_activity") ?>"<?= isset($_SESSION['subscribed']) && !empty($_SESSION['subscribed']) ? ',' : '' ?>
        <?= isset($_SESSION['subscribed']) && !empty($_SESSION['subscribed']) ? 'data: { email: "' . $_SESSION['subscribed'] . '" }' : ''?>
    });
</script>

<!-- PAGE LEVEL PLUGINS -->
<script defer src="<?= site_url('/resources/vendor/jquery.easing.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/jquery.back-to-top.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/jquery.smooth-scroll.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/jquery.wow.min.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/jquery.parallax.min.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/swiper/js/swiper.jquery.min.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/masonry/jquery.masonry.pkgd.min.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/vendor/masonry/imagesloaded.pkgd.min.js') ?>" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script defer src="<?= site_url('/resources/js/layout.min.js?now=' . date('YmdHis')) ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/js/components/wow.min.js') ?>" type="text/javascript"></script>

<script defer src="<?= site_url('/resources/js/components/swiper.min.js') ?>" type="text/javascript"></script>
<script defer src="<?= site_url('/resources/js/components/masonry.min.js') ?>" type="text/javascript"></script>

<?php
if(isset($show_map) && $show_map):
    ?>

    <script src="<?= site_url('/resources/js/components/gmap.min.js') ?>" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&amp;callback=initMap" async defer></script>


<?php
endif;
?>




<div class="entrance_popup overlay dontDisplay">
    <div class="white-box-container">
        <div class="white-box">

            <div class="close_btn">X</div>

            <div class="box-top c_mb10">
                <div class="logo-lightlife"></div>
                <div class="box-heading">Light Life - <span>Shop Online</span></div>
                <div style="clear: both"></div>
            </div>

            <div class="white-box-main ">
                <div class="btns-container _2btns c_mb10">
                    <a class="btn-left" data-close-white-box="true">
                        entra
                    </a>

                    <a class="btn-right" href="<?= site_url('/contattami'); ?>">
                        contattacci
                    </a>

                    <div style="clear: both"></div>
                </div>

                <div class="btns-container">
                    <a class="select_btn btn_carrelo c_mb10" data-toggle-class="carrelo_expand1">
                        carrello <span class="carrelo_count">(<?= isset($_SESSION['cart_products']) && count($_SESSION['cart_products']) > 0 ? count($_SESSION['cart_products']) : 'vuoto' ?>)</span>
                    </a>

                    <ul class="<?= ((isset($_SESSION['cart_products']) && count($_SESSION['cart_products']) > 0) ? '' : 'dontDisplay'); ?> carrelo_expand1">
                    <?php if(isset($_SESSION['cart_products']) && count($_SESSION['cart_products']) > 0): ?>

                        <?php
                            foreach($_SESSION['cart_products'] as $key => $product): ?>
                            <li data-product-id="<?= $key ?>"><?= '<div style="display: inline;" class="data_product_name">' . $product['name'] . '</div> <span>(' . $product['count'] . ')</span> <span class="add_to_cart_link">+</span><span  class="remove_from_cart_link">-</span>' ?></li>
                        <?php
                            endforeach;
                        ?>

                            <li class="check_out_button">ordine</li>
                    <?php endif; ?>
                    </ul>
                </div>

                <div class="btns-container">
                    <a class="select_btn btn_carrelo c_mb10" data-toggle-class="categorie_expand1">
                        categorie
                    </a>

                    <ul class="dontDisplay categorie_expand1">
                        <?php
                            foreach($caller_controller->Category_model->getAll() as $cat_links): ?>

                                <li><a href="<?= site_url('/shop/categoria/' . $cat_links->url_tag); ?>" class="<?= strpos(current_url(), site_url('/shop/categoria/' . $cat_links->url_tag)) !== FALSE ? 'active' : '' ?>"><?= $cat_links->title; ?></a></li>

                            <?php
                            endforeach;
                        ?>
                    </ul>
                </div>

                <?php if(!isset($_SESSION['subscribed']) || empty($_SESSION['subscribed'])): ?>
                <div class="btns-container">
                    <a class="btn-highlighted c_mb10 c_f16 c_newsletter_opener">
                        vieni a ritirare il tuo 10% di sconto
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="white-box-newsletter dontDisplay">
                <p class="white-box-heading1">
                    BENVENUTO !!<br>
                    RITIRA IL TUO BUONO SCONTO
                </p>

                <p class="white-box-description">
                    Spendi 50 euro sui nostri prodotti e potrai<br>
                    usufruire di uno sconto del 10%
                </p>


                <div class="newsletter-box">

                    <div class="nb-heading">
                        Inscriviti nella nostra Mailing List
                        <div class="nb-scizor"></div>
                    </div>

                    <div class="discount-dashed">
                        <div class="dd-greenbar">
                            <div class="dd-text">il tuo buono sconto 10%</div>
                        </div>

                    </div>
                    <div class="nb-inputs">
                        <form>
                            <div class="nb-txtbox">
                                <input type="email" name="email" placeholder="Inserisci la tua email..." value="<?= (isset($_SESSION['email']) && !empty($_SESSION['email'])) ? $_SESSION['email']:''?>"/>
                            </div>

                            <div class="nb-go"></div>
                        </form>
                    </div>
                </div>

                <div class="newsletter-result white-box-heading1 dontDisplay">
                    Riceverai i tuoi sconti via email!<br>
                    <span>(dopo aver confermato di accettarlo nella tua email)</span>
                </div>

                <div class="newsletter-waiting white-box-heading1 dontDisplay">
                    <span>attendere prego ..</span>
                </div>

            </div>

            <div class="white-box-checkout dontDisplay">
                <p class="white-box-heading1">
                    BENVENUTO !!<br>
                    RITIRA IL TUO BUONO SCONTO
                </p>

                <p class="white-box-description">
                    Spendi 50 euro sui nostri prodotti e potrai<br>
                    usufruire di uno sconto del 10%
                </p>

                <form id="checkout_form">
                    <div class="txtbox-container">
                        <input type="text" name="firstName" placeholder="Nome" value="<?= empty($_SESSION['firstName']) ? '' : $_SESSION['firstName'] ?>"/>
                    </div>

                    <div class="txtbox-container">
                        <input type="text" name="lastName" placeholder="Cognome" value="<?= empty($_SESSION['lastName']) ? '' : $_SESSION['lastName'] ?>"/>
                    </div>

                    <div class="txtbox-container">
                        <input type="email" name="email" placeholder="Email" value="<?= empty($_SESSION['email']) ? '' : $_SESSION['email'] ?>"/>
                    </div>

                    <div class="txtbox-container">
                        <input maxlength="19" type="text" name="phone" placeholder="Telefono" value="<?= empty($_SESSION['phone']) ? '' : $_SESSION['phone'] ?>"/>
                    </div>

                    <div class="txtbox-container">
                        <input type="text" name="address" placeholder="Indirizzo" value="<?= empty($_SESSION['address']) ? '' : $_SESSION['address'] ?>"/>
                    </div>

                    <div class="btns-container">
                        <a href="javascript:void(0);" class="try_checkout">finire l'ordine</a>
                    </div>

                </form>

                <div class="checkout-result white-box-heading1 dontDisplay">
                    Completato l'ordine, riceverai ulteriori informazioni via email o telefono.
                </div>

                <div class="checkout-waiting white-box-heading1 dontDisplay">
                    <span>attendere prego ..</span>
                </div>

            </div>

            <div class="social-btns">
                <a class="btn-fb" href="https://www.facebook.com/lightlife.italia/" target="_blank"></a>
                <a class="btn-insta" href="https://www.instagram.com/lightlife.italia/" target="_blank"></a>
            </div>

        </div>
    </div>

    <style type="text/css">

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.58);
            padding-top: 30px;
            z-index: 999999999999;
        }
        .white-box-container {
            background-color: #172A07;
            min-height: 385px;
            width: 100%;
            max-width: 320px;
            margin: auto;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .white-box-container .white-box {
            background-color: #FFFFFF;
            width: 100%;
            max-width: 300px;
            min-height: 365px;
            margin: auto;
            padding: 13px 12px;
            position: relative;
        }

        .white-box-container .white-box .box-top  {
            position: relative;
        }

        .white-box-container .white-box  .close_btn {
            color: red;
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            z-index: 999999999;
        }

        .white-box-container .white-box .box-top .logo-lightlife {
            float: left;
            width: 71px;
            height: 71px;
            background-image: url('<?= site_url('/resources/img/logo.png') ?>');
            background-size: cover;
            background-position-x: -7px;
            background-position-y: 4px;
        }

        .white-box-container .white-box .box-top .box-heading {
            float: left;
            height: 71px;
            line-height: 71px;
            font-family: Arial, sans-serif;
            font-size: 18px;
            color: #172A06;
            margin-left: 10px;
        }


        .white-box-container .white-box .box-top .box-heading span {
            color: #386304;
            text-decoration: underline;
            font-size: 18px;
        }



        .white-box-container .white-box .btns-container > a {
            cursor: pointer;
            width: 100%;
            background-color: #386304;
            height: 41px;
            line-height: 41px;
            color: #FFFFFF;
            font-size: 15px;
            font-family: Arial,sans-serif;
            padding-left: 14px;
            display: block;

        }

        .white-box-container .white-box .btns-container .select_btn {
            background-image: url("<?= site_url('/resources/img/ard_select.png') ?>");
            background-size: 20px 10px;
            background-repeat: no-repeat;
            background-position: right 15px top 15px;

        }

        .white-box-container .white-box .btns-container .select_btn.open {
            background-image: url("<?= site_url('/resources/img/aru_select.png') ?>");
        }


        .white-box-container .white-box .btns-container .btn-left {
            float: left;
        }

        .white-box-container .white-box .btns-container .btn-right {
            float: right;
        }

        .white-box-container .white-box .btns-container .btn-highlighted {
            color: #d3e022;
            text-align: center;
        }

        .white-box-container .white-box .btns-container._2btns > a {
            max-width: 130px;
        }

        .white-box-container .white-box .btns-container {
            clear: both;
        }

        .c_mb10 {
            margin-bottom: 10px;
        }

        .c_f16 {
            font-size: 16px !important;
        }

        .white-box-container .white-box .white-box-heading1 {
            font-size: 18px;
            text-align: center;
            color: #386304;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .white-box-container .white-box .white-box-heading1 span {
            font-size: 12px;
        }

        .white-box-container .white-box p.white-box-description {
            font-size: 14px;
            font-family: Arial, sans-serif;
            text-align: center;
            color: black;
        }

        .white-box-container .white-box .social-btns {
            height: 59px;
            margin-top: 10px;
            width: 100%;
            text-align: center;
        }

        .white-box-container .white-box .social-btns > a {
            height: 59px;
            width: 59px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            display: inline-block;
        }

        .white-box-container .white-box .social-btns .btn-fb {
            background-image: url('<?= site_url('/resources/img/fbm.png') ?>');
        }


        .white-box-container .white-box .social-btns .btn-insta {
            background-image: url('<?= site_url('/resources/img/instagreen.png') ?>');
        }



        .white-box-container .white-box .white-box-newsletter .newsletter-box {
            width: 100%;
            margin-top: 20px;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-heading {
            font-size: 14px;
            color: #386304;
            text-align: right;
            position: relative;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-heading .nb-scizor {
            width: 36px;
            height: 24px;
            position: absolute;
            top: -3px;
            left: 0;
            display: block;
            background-image: url("<?= site_url('/resources/img/scissors.png'); ?>");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .discount-dashed {
            border: 1px dashed black;
            height: 41px;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .discount-dashed .dd-greenbar {
            float: left;
            background-color: #386304;
            height: 41px;
            width: 100%;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .discount-dashed .dd-text {
            float: right;
            background-color: #FFFFFF;
            height: 41px;
            line-height: 41px;
            width: 94%;
            text-align: center;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs {
            width: 100%;
            height: 41px;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-go {
            float: right;
            height: 41px;
            background-color: #2b4e02;
            width: 18%;

            background-image: url("<?= site_url('/resources/img/arrow_right.png'); ?>");
            background-repeat: no-repeat;
            background-size: 34px 21px;
            background-position: right 6px center;
            cursor: pointer;
            cursor: hand;

        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-txtbox {
            float: left;
            width: 80%;
            height: 41px;
            background-color: #386304;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-txtbox input[type="email"] {
            height: 41px;
            width: 100%;
            background-color: transparent;
            font-size: 12px;
            line-height: 41px;
            padding-left: 10px;
            border: 0;
            color: #FFFFFF;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-txtbox input[type="email"]::placeholder,
        .txtbox-container input[type="text"]::placeholder,
        .txtbox-container input[type="email"]::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #FFFFFF;
            opacity: 1; /* Firefox */
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-txtbox input[type="email"]:-ms-input-placeholder,
        .txtbox-container input[type="text"]:-ms-input-placeholder,
        .txtbox-container input[type="email"]:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #FFFFFF;
        }

        .white-box-container .white-box .white-box-newsletter .newsletter-box .nb-inputs .nb-txtbox input[type="email"]::-ms-input-placeholder,
        .txtbox-container input[type="text"]::-ms-input-placeholder,
        .txtbox-container input[type="email"]::-ms-input-placeholder { /* Microsoft Edge */
            color: #FFFFFF;
        }

        .add_to_cart_link  {
            color: darkgreen;
            font-size: 20px;
            margin-right: 4px;
            cursor: pointer;
        }


        .remove_from_cart_link {
            color: rgb(255, 0, 0);
            font-size: 20px;
            cursor: pointer;
        }

        .check_out_button {
            list-style: none;
            text-align: center;
            background-color: #386304;
            color: white;
            cursor: pointer;
        }

        .txtbox-container {
            display: block;
            width: 100%;
            height: 41px;
            background-color: #568221;
            margin-bottom: 10px;
        }

        .txtbox-container input[type="text"],
        .txtbox-container input[type="email"] {
            height: 41px;
            width: 100%;
            background-color: transparent;
            font-size: 12px;
            line-height: 41px;
            padding-left: 10px;
            border: 0;
            color: #FFFFFF;
        }

        .carrelo_expand1 {
            padding-left: 20px;
        }

        <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>

        .wbtn_container {
            position: relative;
        }

        .editWidget,.saveWidget,.deleteWidget, .addWidget {
            display: block;
            width: 46px;
            height: 46px;
            position: absolute;
            top: 0;
            z-index: 999999;
        }

        .changeCategory {
            position: absolute;
            bottom: 10px;
            right: 0;
            text-decoration: underline;
            z-index: 9999990;
        }

        select.changeCategory {
            width: 100%;
        }

        .editWidget {
            background: transparent url('<?= site_url('/resources/img/edit.png'); ?>') no-repeat;
            background-size: contain;
            right: 0;
        }

        .saveWidget {
            background: transparent url('<?= site_url('/resources/img/save.png'); ?>') no-repeat;
            background-size: contain;
            right: 50px;
        }

        .deleteWidget {
            background: transparent url('<?= site_url('/resources/img/delete.png'); ?>') no-repeat;
            background-size: contain;
            right: 0;
        }

        .addWidget {
            background: transparent url('<?= site_url('/resources/img/widgets/add.png'); ?>') no-repeat;
            background-size: contain;
            left: 0;

            top: -45px !important;
        }

        .arrowLeft,.arrowRight {
            display: block;
            width: 46px;
            height: 46px;
            position: absolute;
            top: 0;
            z-index: 9999999;
        }

        .arrowLeft {
            background: transparent url('<?= site_url('/resources/img/arrowLeft.png'); ?>') no-repeat;
            background-size: contain;
            left: 0;
        }

        .arrowRight {
            background: transparent url('<?= site_url('/resources/img/arrowRight.png'); ?>') no-repeat;
            background-size: contain;
            left: 60px;
        }

        .full_ta {
            width: 100%;
            min-height: 80%;
        }

        .w_title input {
            width: 100%;
        }

        .w_description textarea {
            width: 100%;
            min-height: 80px;
        }

        .loading_gif {
            background-image: url('<?= site_url('/resources/img/loading.gif'); ?>');
        }

        <?php endif; ?>



    </style>
</div>

<div class="cookies_privacy dontDisplay">
    <p>Questo sito utilizza i cookie di Google per la fornitura dei propri servizi. Utilizzando il sito acconsenti all'uso dei cookie , e di essere maggiore di 18 anni.</p>

    <span class="ok">OK</span>
    <a href="https://policies.google.com/technologies/cookies?hl=es" target="_blank" class="more_info">ULTERIORI INFORMAZIONI</a>
</div>

<script type="text/javascript">



    $(document).ready(function(){

        if(readCookie('closedOverlay') !== 'true'){
            $('.overlay').show();
        }

    });



    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 *1000));
            var expires = "; expires=" + date.toGMTString();
        }
        else {
            var expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1,c.length);
            }
            if (c.indexOf(nameEQ) == 0) {
                return c.substring(nameEQ.length,c.length);
            }
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name,"",-1);
    }

    $('[data-close-white-box]').on('click',function(){
       $(this).closest('.overlay').hide();
        createCookie('closedOverlay')
    });

    $('[data-toggle-class]').on('click',function(){
        $('.' + $(this).attr('data-toggle-class')).toggle();
        $(this).toggleClass('open');
    });


    $('.entrance_popup .newsletter-box .nb-go').on('click',function(){
        $(this).closest('form').submit();
        $('.entrance_popup .newsletter-box').hide();
    });

    $('.entrance_popup .newsletter-box form').on('submit',function(event){
        event.preventDefault();
        var email = $(this).find('input[type="email"]');


        $('.entrance_popup .newsletter-waiting').show();

        $.ajax({
            type : "POST",
            url  : "<?= site_url("/newsletter/subscribe") ?>",
            data : {
                email: email.val()
            },
            success: function(data){
                $('.entrance_popup .newsletter-waiting').hide();

                if(data === 'true'){

                    $('.entrance_popup .newsletter-box').hide();
                    $('.entrance_popup .newsletter-result').show();
                    $('.c_newsletter_opener').hide();
                    return;
                }

                if(data === 'invalid-email'){
                    email.css('color','red');
                    alert('email non valida, per favore controlla');
                    $('.entrance_popup .newsletter-box').show();
                    return;
                }

                alert('qualcosa è andato storto, prova più tardi');

            },
        });



    });

    $('.entrance_popup .c_newsletter_opener').on('click',function(){
        $('.entrance_popup .white-box-main').hide();
        $('.entrance_popup .white-box-newsletter').show();
    });

    $('.entrance_popup .close_btn').on('click',function(){
        if($('.entrance_popup .white-box-newsletter').is(':visible')){
            $('.entrance_popup .white-box-newsletter').hide();
            $('.entrance_popup .white-box-main').show();
        } else if($('.entrance_popup .white-box-checkout').is(':visible')){
            $('.entrance_popup .white-box-checkout').hide();
            $('.entrance_popup .white-box-main').show();
        } else if( $('.entrance_popup .white-box-main').is(':visible')) {
            $('.entrance_popup .white-box-main').closest('.overlay').hide();
            createCookie('closedOverlay','true',1);
        }


    });

    function updateCarreloCount(){
        $.get('<?= site_url('/shop/cart/items_li') ?>',function(data){
            $('.carrelo_expand1').html(data);
            $('.carrelo_count').text('('  + ($('.carrelo_expand1').find('li[data-product-id]').length === 0 ? 'vuoto' : $('.carrelo_expand1').find('li[data-product-id]').length) + ')');
        });
    }
    $(document).on('click','.add_to_cart_link',function(){
       var prod = $(this).closest('[data-product-id]');
       var prod_id = prod.attr('data-product-id');
       var prod_name = prod.find('.data_product_name').text();

       $.get('<?= site_url('/shop/cart/add?prod_id=') ?>' + prod_id  + '&prod_name=' + prod_name,function(data){
           if(data === 'true'){
               alert('prodotto aggiunto al carrello');
               updateCarreloCount();
           }
       });
      



    });

    $(document).on('click','.remove_from_cart_link',function(){
        var prod = $(this).closest('[data-product-id]');
        var prod_id = prod.attr('data-product-id');

        $.get('<?= site_url('/shop/cart/remove?prod_id=') ?>' + prod_id,function(data){
            if(data === 'true'){
                alert('prodotto rimosso dal carrello');
            }
            updateCarreloCount();
        });



    });



    $('.toggle_cart_link').on('click',function(){
       $('.entrance_popup.overlay').toggle();

        $('.carrelo_expand1').find('li').remove();
        updateCarreloCount();

    });

    $(document).on('click','.check_out_button',function(){
        $('.white-box-main').hide();
        $('.white-box-checkout').show();
        $('.checkout-result').hide();
        $('#checkout_form').show();
    });

    $('.try_checkout').on('click',function(){
       $(this).closest('form').submit();
    });

    $('#checkout_form').on('submit',function(event){
        event.preventDefault();
        var fdata = $(this).serialize();
        var hasFilledAll = true;

        var inputs = $(this).find('input');
        $.each(inputs,function(key,value){
            if($(value).val().length === 0){
                hasFilledAll = false;
            }
        });


        if(!hasFilledAll){
            alert('Per favore riempi tutti i campi.');
            return false;
        }

        $('.checkout-waiting').show();
        $('#checkout_form').hide();
        $.ajax({
            url: '<?= site_url('/shop/cart/checkout?')?>' + fdata,
            success: function(data) {
                if (data === 'true') {
                    $('.checkout-result').show();
                    $('.checkout-waiting').hide();
                    updateCarreloCount();
                    $('.carrelo_expand1').hide();
                    $('.carrelo_count').text('0');

                    return;
                }
                alert('Qualcosa è andato storto, ti preghiamo di riprovare più tardi.');
            },
            error: function(){
                alert('Qualcosa è andato storto, ti preghiamo di riprovare più tardi.');
            },
            fail: function(){
                alert('Qualcosa è andato storto, ti preghiamo di riprovare più tardi.');
            }
        });




    });


    <?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>

        <?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>

        alert('<?= $_GET['msg'] ?>');

        <?php endif; ?>



        $('.w_change_img').on('click',function(){
            var file_h = $(this).closest('form').find('input.w_file');

            file_h.on('change',function(){
                $(this).closest('form').submit();
            });

            file_h.trigger('click');


        });

        $('[data-category-add]').find('.w_add_img').on('click',function(){
            var file_h = $(this).closest('form').find('input.w_file');

            file_h.on('change',function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                var w_image = $(this).closest('[data-category-add]').find('.w_image');

                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "ico"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        w_image.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);

                }
            });

            file_h.trigger('click');


        });



        $('.editWidget.edit_category').on('click',function(){
            var cat_container = $(this).closest('.category_item_container');
            var cat_title = cat_container.find('.w_title');
            var cat_small_desc = cat_container.find('.w_description');

            cat_title.html('<input type="text" value="' + cat_title.text() + '"/>');
            cat_small_desc.html('<textarea>' + cat_small_desc.text() + '</textarea>');

            $(this).hide();
            var btns_cont = $(this).closest('.wbtn_container');
            btns_cont.find('.saveWidget.save_category').show();
            btns_cont.find('.deleteWidget.delete_category').show();
            btns_cont.find('.deleteWidget.delete_category').show();
            cat_container.find('.w_change_img_form').show();
        });


    $('.saveWidget.save_category').on('click',function(){
        var cat_container = $(this).closest('.category_item_container');
        var btns_cont = $(this).closest('.wbtn_container');
        var cat_id = cat_container.data('category-id');
        var cat_title = cat_container.find('.w_title').find('input').first().val();
        var cat_small_desc = cat_container.find('.w_description').find('textarea').first().val();
        $(this).addClass('loading_gif');


        $.ajax({
            type : "POST",
            url  : "<?= site_url("/dashboard/shop/category/edit") ?>",
            data : {
                id: cat_id,
                title: cat_title,
                small_description: cat_small_desc
            },
            success: function(data){
                btns_cont.find('.saveWidget.save_category').removeClass('loading_gif');

                if(data === 'true'){
                    cat_container.find('.w_title').html(cat_title);
                    cat_container.find('.w_description').html(cat_small_desc);



                    btns_cont.find('.saveWidget.save_category').hide();
                    btns_cont.find('.deleteWidget.delete_category').hide();
                    cat_container.find('.w_change_img_form').hide();
                    btns_cont.find('.editWidget.edit_category').show();
                    alert('Salvato con successo');
                    return;
                }

                alert('qualcosa è andato storto, prova più tardi');

            }
        });

    });







    $('.editWidget.edit_product').on('click',function(){
        var cat_container = $(this).closest('.product_item_container');
        var cat_title = cat_container.find('.w_title');
        var cat_small_desc = cat_container.find('.w_description');

        cat_title.html('<input type="text" value="' + cat_title.text() + '"/>');
        cat_small_desc.html('<textarea>' + cat_small_desc.text() + '</textarea>');

        $(this).hide();
        var btns_cont = $(this).closest('.wbtn_container');
        btns_cont.find('.saveWidget.save_product').show();
        btns_cont.find('.deleteWidget.delete_product').show();
        cat_container.find('.w_change_img_form').show();
    });


    $('.deleteWidget.delete_category').on('click',function(){
        var category = $(this).closest('[data-category-id]');
        var category_id = category.data('category-id');
        var btns_cont = $(this).closest('.wbtn_container');

        var confirmation = prompt('Scrie "da" pentru a șterge','d');

        if(confirmation === 'da'){

            btns_cont.find('.deleteWidget.delete_category').addClass('loading_gif');
            $.ajax({
                type : "POST",
                url  : "<?= site_url("/dashboard/shop/category/delete") ?>",
                data : {
                    id: category_id
                },
                success: function(data){
                    btns_cont.find('.deleteWidget.delete_category').removeClass('loading_gif');

                    if(data === 'true'){
                        category.hide();
                        alert('Categorie rimosso');
                        return;
                    }

                    alert('qualcosa è andato storto, prova più tardi');

                },
                error: function(){
                    btns_cont.find('.deleteWidget.delete_category').removeClass('loading_gif');

                    alert('qualcosa è andato storto, prova più tardi');
                }
            });


        }
    });


    $('.deleteWidget.delete_product').on('click',function(){
        var product = $(this).closest('[data-product-id]');
        var product_id = product.data('product-id');
        var btns_cont = $(this).closest('.wbtn_container');

        var confirmation = prompt('Scrie "da" pentru a șterge','d');

        if(confirmation === 'da'){

            btns_cont.find('.deleteWidget.delete_product').addClass('loading_gif');
            $.ajax({
                type : "POST",
                url  : "<?= site_url("/dashboard/shop/product/delete") ?>",
                data : {
                    id: product_id
                },
                success: function(data){
                    btns_cont.find('.deleteWidget.delete_product').removeClass('loading_gif');

                    if(data === 'true'){
                        product.hide();
                        alert('Prodotto rimosso');
                        return;
                    }

                    alert('qualcosa è andato storto, prova più tardi');

                },
                error: function(){
                    btns_cont.find('.deleteWidget.delete_product').removeClass('loading_gif');

                    alert('qualcosa è andato storto, prova più tardi');
                }
            });


        }
    });

    $('.saveWidget.save_product').on('click',function(){
        var cat_container = $(this).closest('.product_item_container');
        var btns_cont = $(this).closest('.wbtn_container');
        var cat_id = cat_container.data('product-id');
        var cat_title = cat_container.find('.w_title').find('input').first().val();
        var cat_small_desc = cat_container.find('.w_description').find('textarea').first().val();
        $(this).addClass('loading_gif');


        $.ajax({
            type : "POST",
            url  : "<?= site_url("/dashboard/shop/product/edit") ?>",
            data : {
                id: cat_id,
                name: cat_title,
                small_description: cat_small_desc
            },
            success: function(data){
                btns_cont.find('.saveWidget.save_product').removeClass('loading_gif');

                if(data === 'true'){
                    cat_container.find('.w_title').html(cat_title);
                    cat_container.find('.w_description').html(cat_small_desc);



                    btns_cont.find('.saveWidget.save_product').hide();
                    btns_cont.find('.deleteWidget.delete_product').hide();
                    cat_container.find('.w_change_img_form').hide();
                    btns_cont.find('.editWidget.edit_product').show();
                    alert('Salvato con successo');
                    return;
                }

                alert('qualcosa è andato storto, prova più tardi');

            }
        });

    });


    $('.cancel_category_add').on('click',function(){
        $(this).closest('.category_add').hide();
    });

    $('.cancel_add_product').on('click',function(){
        $(this).closest('.product_add').hide();
    });

    $('.category_add_toggle').on('click',function(){
        $('.category_add').toggle();
    });

    $('.product_add_toggle').on('click',function(){
        $('.product_add').toggle();
    });


    $('[data-category-add]').find('.add_cat_final').on('click',function(){
        var cont = $(this).closest('[data-category-add]');
        var form = cont.find('form.w_add_img_form');

        form.find('.hidden_cat_title').val(cont.find('.w_title').find('input').val());
        form.find('.hidden_cat_small_desc').val(cont.find('.w_description').find('textarea').val());

        form.submit();
    });


    $('[data-product-add]').find('.add_prod_final').on('click',function(){
        var cont = $(this).closest('[data-product-add]');
        var form = cont.find('form.w_add_img_form');

        form.find('.hidden_prod_title').val(cont.find('.w_title').find('input').val());
        form.find('.hidden_prod_small_desc').val(cont.find('.w_description').find('textarea').val());

        form.submit();
    });


    $('[data-product-add]').find('.w_add_img').on('click',function(){
        var file_h = $(this).closest('form').find('input.w_file');

        file_h.on('change',function(){
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            var w_image = $(this).closest('[data-product-add]').find('.w_image');

            if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg" || ext == "ico"))
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                    w_image.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);

            }
        });

        file_h.trigger('click');


    });


    $('a.changeCategory').on('click',function(){
        var cont = $(this).closest('.wbtn_container');
        $(this).hide();
        cont.find('select.changeCategory').show();
    });

    $('select.setProductCategory').on('change',function(){
        var product_id = $(this).data('product-id');
        var new_cat_id = $(this).val();
        var cont = $(this).closest('.wbtn_container');
        var thisThing = cont.find('a.changeCategory');
        var thisOtherThing = $(this);

        $.ajax({
            type : "POST",
            url  : "<?= site_url("/dashboard/shop/product/change_category") ?>",
            data : {
                product_id: product_id,
                new_cat_id: new_cat_id
            },
            success: function(data){
                thisOtherThing.hide();
                thisThing.text('cambiando ... per favore aspetta.');
                thisThing.show();

                if(data === 'true'){
                    alert('categoria cambiata');
                    thisThing.text('cambia categoria');
                    return;
                }
                thisThing.text('cambia categoria');
                alert('qualcosa è andato storto, prova più tardi');
            },
        });
    });

    jQuery.fn.swapWith = function(to) {
        return this.each(function() {
            var copy_to = $(to).clone(true);
            var copy_from = $(this).clone(true);
            $(to).replaceWith(copy_from);
            $(this).replaceWith(copy_to);
        });
    };

    $('[data-set-list-order]').on('click',function(){
        var currentProd = $(this).closest('[data-product-id]');
        var prevProd = currentProd.prev('[data-product-id]');
        var nextProd = currentProd.next('[data-product-id]');

        var direction = "right";
        if($(this).hasClass('arrowLeft')){
            direction = "left";
        }


        var product_id = currentProd.data('product-id');
        var current_list_order = $(this).data('current-list-order');
        var next_list_order = $(this).data('set-list-order');

        if(current_list_order === next_list_order)return;

        var swap_with = direction === "right" ? nextProd.data('product-id') : prevProd.data('product-id');

        $.ajax({
            type : "POST",
            url  : "<?= site_url("/dashboard/shop/product/change_order") ?>",
            data : {
                "product_id": product_id,
                "swap_with": swap_with,
                "next_list_order": next_list_order,
                "current_list_order": current_list_order
            },
            success: function(data){
                if(data === 'true'){

                    window.location.reload();
                    return;
                }
                alert('qualcosa è andato storto, prova più tardi');
            }
        });
    });



    <?php endif; ?>
</script>

<?php if(isset($_SESSION['manage_site']) && $_SESSION['manage_site'] === TRUE): ?>

    <div onclick="window.location = '<?= site_url('/dashboard') ?>'" style="cursor: pointer; width: 58px; height: 58px; position: fixed; top: 0; left: 0; background: transparent url('<?= site_url('/resources/img/backk.png') ?>') no-repeat; background-size: contain; z-index: 999999999; margin: 10px 20px;">

<?php endif; ?>
</div>
</body>
<!-- END BODY -->
</html>