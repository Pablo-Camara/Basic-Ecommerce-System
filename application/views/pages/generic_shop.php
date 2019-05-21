<!--========== PAGE LAYOUT ==========-->
<div class="content-lg container" style="padding-bottom: 10px">
        <div class="row">
            <div class="col-sm-12 text-center">
                    <h2>Categorie di prodotti in primo piano</h2>
                    <p>Qui troverai tutte le categorie dei nostri prodotti!</p>
            </div>
        </div>
        <!--// end row -->

    <!--========== END PAGE LAYOUT ==========-->
</div>
<!--========== END PAGE LAYOUT ==========-->
    <?php
        $caller_controller->load->view('template/components/categories',$data ? $data : null);
        $caller_controller->load->view('template/components/featured_products',$data ? $data : null);
    ?>



