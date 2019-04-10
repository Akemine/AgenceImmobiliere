<?php include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <section class="container">
        <h1 class="mt-3">Liste des clients (<?php echo count($clients); ?>)</h1>
        <table id="unTab" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Titre</th>
                <th>Code postal</th>
                <th>Ville</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($clients as $client) {
                ?>
                <tr>
                    <td><strong><?php echo $client['nomclient'] ?></strong></td>
                    <td><strong><?php echo $client['prenomclient'] ?></strong></td>
                    <td><?php echo $client['titre'] ?></td>
                    <td><?php echo $client['codepostal'] ?></td>
                    <td><?php echo $client['nomville'] ?></td>
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
