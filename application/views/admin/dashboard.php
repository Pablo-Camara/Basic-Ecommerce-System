<div class="container">
        <div class="logo"></div>

        <h1>Pannello di controllo</h1>
        <h2>Dashboard</h2>


        <div class="menu">

            <a href="<?= site_url('/dashboard/statistics?when=oggi&start=' . date('Y-m-d')); ?>">
                <button type="button">Statistica</button>
            </a>
            <a href="<?= site_url('/dashboard/shop'); ?>">
                <button type="button">Gestire Shop</button>
            </a>
<!--            <a href="--><?//= site_url('/dashboard/settings'); ?><!--">-->
<!--                <button type="button">Altre impostazione</button>-->
<!--            </a>-->


            <br>
            <form method="post" action="<?= site_url('/dashboard/logout'); ?>">
                <a href="javascript:void();" id="logout">disconnettersi</a>
                <input type="hidden" name="logout" value="now">
            </form>

        </div>

    </div>
</div>