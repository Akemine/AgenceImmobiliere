<?php include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <section class="container">
        <h1 class="mt-3">Liste des biens (<?php echo count($biens); ?>)</h1>
        <a href='/agenceImmobiliere/biens.php'><span
                    class="badge badge-success">TOUT AFFICHER</span></a>
        <div>
            <?php foreach ($listeVilles as $ville) {
                ?> <a href='/agenceImmobiliere/biens.php?idVille=<?php echo $ville['codeville'] ?>'><span
                            class="badge badge-secondary"><?php echo $ville['nomville'] ?></span></a>
                <?php
            }
            ?>
        </div>
        <div>
            <?php foreach ($intituleBiens as $intituleBien) {
                ?> <a href='/agenceImmobiliere/biens.php?idBiens=<?php echo $intituleBien['codebien'] ?>'><span
                            class="badge badge-warning"><?php echo strtoupper($intituleBien['intitulebien']) ?></span></a>
                <?php
            }
            ?>
        </div>
        <div>
            <?php foreach ($intituleTransactions as $intituleTransaction) {
                ?>
                <a href='/agenceImmobiliere/biens.php?idTransactions=<?php echo $intituleTransaction['codetransaction'] ?>'><span
                            class="badge badge-primary"><?php echo strtoupper($intituleTransaction['intituletransaction']) ?></span></a>
                <?php
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
