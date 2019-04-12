<?php include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php';
        $href = '/agenceImmobiliere/biens.php?';
        $idVille = '';
        $idBien = '';
        $idTransaction = '';
        if (isset($_GET['idVille'])) {
            $idVille = $_GET['idVille'];
        }
        if (isset($_GET['idBien'])) {
            $idBien = $_GET['idBien'];
        }
        if (isset($_GET['idTransaction'])) {
            $idTransaction = $_GET['idTransaction'];
        }
        $tri = array(
            'idVille' => $idVille,
            'idBien' => $idBien,
            'idTransaction' => $idTransaction);
        var_dump($tri);


        ?>

    </header>
    <section class="container">
        <h1 class="mt-3">Liste des biens (<?php echo count($biens); ?>)</h1>
        <a href='/agenceImmobiliere/biens.php'><span
                    class="badge badge-success">TOUT AFFICHER</span></a>
        <div>
            <?php foreach ($listeVilles as $ville) {
                ?> <a href="<?php echo getLink('idVille', $ville['codeville']); ?>"><span
                            class="badge badge-secondary"><?php echo $ville['nomville'] ?></span></a>
                <?php

            }


            ?>
        </div>
        <div>
            <?php foreach ($intituleBiens as $intituleBien) {
                ?> <a href="<?php echo getLink('idBien', $intituleBien['codebien']); ?>"><span
                            class="badge badge-warning"><?php echo strtoupper($intituleBien['intitulebien']) ?></span></a>
                <?php
            }
            ?>
        </div>
        <div>

            <?php

            foreach ($intituleTransactions as $intituleTransaction) {
                ?>
                <a href="<?php echo getLink('idTransaction', $intituleTransaction['codetransaction']); ?>"><span
                            class="badge badge-primary"><?php echo strtoupper($intituleTransaction['intituletransaction']) ?></span></a>
                <?php
            }

            if (isset($_GET['idTransactions'])) {
                if (isset($_GET['idVille'])) {
                    $tri['idVille'] = $_GET['idVille'];
                }
                echo $_GET['idVille'];;
                $tri['idTransaction'] = $_GET['idTransactions'];
                var_dump($tri);
            }
            ?>
        </div>

        <table id="unTab" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Pièces</th>
                <th>Transaction</th>
                <th>type des biens</th>
                <th>Montant</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($biens as $bien) {

                ?>
                <tr>
                    <td><?php echo $bien['adresse1'] ?></td>
                    <td><?php echo $bien['codepostal'] ?></td>
                    <td><strong><?php echo $bien['nomville'] ?></strong></td>
                    <td><span class="badge <?php if ($bien['pieces'] >= 3) {
                            echo 'badge-success';
                        } else {
                            echo 'badge-secondary';
                        } ?>"> <?php echo $bien['pieces'] ?></span></td>
                    <td><?php echo $bien['intituletransaction'] ?></td>
                    <td><?php echo $bien['intitulebien'] ?></td>
                    <td class="<?php if ($bien['montant'] >= 300000) {
                        echo 'font-weight-bold';
                    } ?>"><?php echo $bien['montant'] ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <footer>
            <?php include_once 'footer.php'; ?>
        </footer>
    </section>
</section>
