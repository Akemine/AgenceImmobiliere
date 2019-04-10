<?php include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <section class="container">
        <div class="row">
            <aside class="col-md-4">
                <h1 class="mt-3">Information du propriétaire</h1>
                <table class="table">
                    <tbody>

                    <tr>
                        <td>Nom</td>
                        <td style="color : darkblue;" class="font-weight-bold">
                            <?php echo $infoProprio['nomproprietaire'] ?></td>
                    </tr>

                    <tr>
                        <td>Prénom</td>
                        <td><?php echo $infoProprio['prenomproprietaire'] ?></td>
                    </tr>

                    <tr>
                        <td>Téléphone personnel</td>
                        <td><?php echo $infoProprio['telephonepersonnel'] ?></td>
                    </tr>

                    <tr>
                        <td>Téléphone mobile</td>
                        <td><?php echo $infoProprio['telephonemobile'] ?></td>
                    </tr>

                    <tr>
                        <td>email</td>
                        <td><?php echo $infoProprio['email'] ?></td>
                    </tr>

                    </tbody>
                </table>
            </aside>

            <section class="col-md-8">
                <h1 class="mt-3">Listes des biens (<?php echo count($infoBiensProprio); ?>)</h1>
                <table id="unTab" class="table table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Pièce</th>
                        <th>Transaction</th>
                        <th>Bien</th>
                        <th>Montant</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($infoBiensProprio as $info) {
                        ?>
                        <tr>

                            <td><?php echo $info['adresse1'] ?></td>
                            <td><?php echo $info['codepostal'] ?></td>
                            <td><strong><?php echo $info['nomville'] ?></strong></td>
                            <td> <span class="badge <?php if ($info['pieces'] >= 3) {
                                    echo 'badge-success';
                                } else {
                                    echo 'badge-secondary';
                                } ?>"> <?php echo $info['pieces'] ?></span></td>
                            <td><?php echo $info['intituletransaction'] ?></td>
                            <td><?php echo $info['intitulebien'] ?></td>
                            <td><?php echo $info['montant'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </section>


            <footer>
                <?php include_once 'footer.php'; ?>
            </footer>

        </div>
    </section>
</section>

