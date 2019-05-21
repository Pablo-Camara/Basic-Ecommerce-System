<?php
if(isset($products)){
    $caller_controller->load->view('template/components/products',$data ? $data: null);
} ?><div class="content-lg container" style="padding-bottom: 10px">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h5><a href="<?= site_url('/shop/'); ?>">Visualizza altre categorie</a></h5>
        </div>
    </div>
    <!--// end row -->

</div>