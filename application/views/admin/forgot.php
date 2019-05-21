<div class="container">
    <div class="logo"></div>

    <h1>Pannello di controllo</h1>
    <h2>Dimenticato la password</h2>

    <form method="post" action="<?= site_url('/dashboard/login/forgot'); ?>">
        <?php
        if(!isset($feedback_message)):
        ?>
            <div>
                <input type="email" name="email" placeholder="Email"/>
            </div>
        <?php
        endif;
        ?>

        <?php
            if(isset($feedback_message)):
        ?>
        <div class="feedback <?= !empty($feedback_type) ? $feedback_type : '' ?>">
            <?= $feedback_message ?>
        </div>
        <?php
            endif;
        ?>
        <?php
        if(!isset($feedback_message)):
        ?>
        <button type="submit">recupera la password</button>
        <?php
        endif;
        ?>
        <br>
        <a href="<?= site_url('/dashboard/login'); ?>">Autenticati</a>
    </form>
</div>