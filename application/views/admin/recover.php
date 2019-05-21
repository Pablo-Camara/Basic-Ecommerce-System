<div class="container">
    <div class="logo"></div>

    <h1>Pannello di controllo</h1>
    <h2>Imposta una nuova password</h2>

    <form method="post" action="<?= site_url('/dashboard/login/setpassword'); ?>">

            <div>
                <input type="email" name="email" placeholder="Email" <?= !empty($post['email']) ? ('value="' . $post['email'] .'"') : ''  ?>/>
                <input type="password" name="password" placeholder="Nuova password"/>
                <input type="password" name="password_confirmation" placeholder="Conferma la tua password"/>
            </div>


        <?php
            if(isset($feedback_message)):
        ?>
        <div class="feedback <?= !empty($feedback_type) ? $feedback_type : '' ?>">
            <?= $feedback_message ?>
        </div>
        <?php
            endif;
        ?>


        <input type="hidden" name="token_id" value="<?= $token_id ?>"/>
        <input type="hidden" name="ready" value="true"/>
        <button type="submit">Continua</button>

        <br>
        <a href="<?= site_url('/dashboard/login'); ?>">Autenticati</a>
    </form>
</div>