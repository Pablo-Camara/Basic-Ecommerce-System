<?php
    if(isset($contact_box) && $contact_box):
?>
<!--========== FOOTER ==========-->
<footer class="footer">
    <!-- Links -->
    <div class="footer-seperator">
        <div class="content-lg container">
            <div class="row">

                <div class="col-sm-offset-3 col-sm-4 sm-margin-b-30">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a class="footer-list-link" href="https://www.facebook.com/lightlife.italia/" target="_blank">Facebook</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="https://www.instagram.com/lightlife.italia/" target="_blank">Instagram</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="mailto:lightlife.italia@gmail.com">Email</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="<?= site_url('/dove-siamo'); ?>">Dove Siamo</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="https://protezionedatipersonali.it/informativa-privacy-e-cookie" target="_blank">Politica di protezione dati</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <div class="col-sm-5 sm-margin-b-30" id="mandaci">
                    <h2 class="color-white">Mandaci un messaggio</h2>

                    <?php
                    if(isset($message_sent) && $message_sent === true): ?>
                        <h3 style="color: #0f0">Messaggio inviato</h3>
                    <?php
                    elseif(isset($message_sent) && $message_sent === false): ?>

                        <h3 style="color: yellow">Messaggio non inviato</h3>
                    <?php
                    endif;
                    ?>
                    <form method="post" action="<?= site_url('/contattami/inviare') ?>">
                        <input type="text" name="name" class="form-control footer-input margin-b-20" placeholder="Nome" value="<?= isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '' ?><?= isset($_SESSION['lastName']) ? ' ' . $_SESSION['lastName'] : '' ?>" required>
                        <input type="email" name="from" class="form-control footer-input margin-b-20" placeholder="Email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" required>
                        <input type="text" name="phone" class="form-control footer-input margin-b-20" placeholder="Telefono" value="<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>" required>
                        <textarea name="messaggio" class="form-control footer-input margin-b-30" rows="6" placeholder="Messaggio" required></textarea>
                        <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Inviare</button>
                    </form>
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Links -->

</footer>
<!--========== END FOOTER ==========-->
<?php
endif;
?>