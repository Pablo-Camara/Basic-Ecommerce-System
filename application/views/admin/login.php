<div class="container">
    <div class="logo"></div>

    <h1>Pannello di controllo</h1>
    <h2>Autenticati</h2>

    <form method="post" action="<?= site_url('/dashboard/login'); ?>">
        <div>
            <input type="email" name="email" placeholder="Email" <?= !empty($post['email']) ? ('value="' . $post['email'] .'"') : ''  ?>/>
        </div>
        <div>
            <input type="password" name="password" placeholder="Password"/>
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
        <button type="submit">Entrare</button>
        <br>
        <a href="<?= site_url('/dashboard/login/forgot'); ?>">dimenticato la password</a>
    </form>
</div>