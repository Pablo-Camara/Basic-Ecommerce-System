<div class="container">
        <a href="<?= site_url('/dashboard'); ?>">
            <div class="logo"></div>
        </a>

        <h1>
            <a href="<?= site_url('/dashboard'); ?>">Pannello di controllo</a>
        </h1>

        <h2>Statistica - <?= !empty($_GET['when']) ? $_GET['when'] : 'tutto il tempo' ?></h2>


        <div style="margin-bottom: 10px;">
            <?php
                $today = (new DateTime( date('Y-m-d ') ));

                $yesterday = (new DateTime( date('Y-m-d ') ));
                $yesterday = $yesterday->sub( new DateInterval('P1D') )->format('Y-m-d');

                $monthStart = $today->format('Y-m-01');
                $monthEnd = $today->format('Y-m-t');
            ?>
            Visualizza per: <a href="<?= site_url('/dashboard/statistics/?when=oggi&start=' . $today->format('Y-m-d')); ?>">oggi</a>, <a href="<?= site_url('/dashboard/statistics/?when=yeri&start=' . $yesterday); ?>">yeri</a>, <a href="<?= site_url('/dashboard/statistics/?when=questo mese&start=' . $monthStart . '&end=' . $monthEnd); ?>">questo mese</a>, <a href="<?= site_url('/dashboard/statistics') ?>">tutto il tempo</a>, <a href="javascript:void(0);" data-ctoggle="customStatsDate">altra data</a>

            <div id="customStatsDate" style="margin-top: 10px; margin-bottom: 5px; display: none;">
                <form method="get" action="<?= site_url('/dashboard/statistics'); ?>">
                    inizio: <input type="date" placeholder="inizio" name="start"/>
                    fine: <input type="date" placeholder="fine" name="end"/>
                    <input type="submit" value="mostra">
                    <input type="hidden" name="when" value="altra data"/>
                </form>
            </div>
        </div>

    <?php
        if(count($stats) > 0):
    ?>
        <table class="margin-auto">
            <thead>
                <tr>
                    <th>Pagina</th>
                    <th>Visualizzazioni totali</th>
                    <th>Visualizzazioni uniche</th>
                    <th>Iscritti</th>
                    <th>Ultimo visitatore</th>
                    <th>Ordini totali</th>
                    <th>Acquirenti totali</th>
                </tr>
            </thead>

            <tbody>
            <?php
                for($i = 0; $i < count($stats); $i++): ?>
                    <tr>
                        <td>
                            <a href="<?= $stats[$i]->url ?>" target="_blank">
                                <?= $stats[$i]->url ?>
                            </a>
                        </td>
                        <td><?= $stats[$i]->total_views ?></td>
                        <td><?= $stats[$i]->unique_views ?></td>
                        <td><?= $stats[$i]->total_subscribers ?></td>
                        <td><?= $stats[$i]->last_visit ?> ore fa</td>
                        <td><?= $stats[$i]->total_checkouts ?></td>
                        <td><?= $stats[$i]->total_buyers ?></td>
                    </tr>
            <?php
                endfor;
            ?>
            </tbody>
        </table>
    <?php
        else: ?>

        <p>Nessuna statistica trovata</p>

    <?php
        endif;
    ?>


    </div>
</div>