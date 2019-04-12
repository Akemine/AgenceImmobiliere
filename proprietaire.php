<?php include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <section class="container">
        <h1 class="mt-3">Liste des propriétaires (<?php echo count($proprietaires); ?>)</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Titre</th>
                <th>Mobile</th>
                <th>Téléphone perso.</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($proprietaires as $proprietaire) {
                ?>
                <tr>

                    <td style="color : darkblue;" class="font-weight-bold"><a
                                href='/agenceImmobiliere/detailProprio.php?id=<?php echo $proprietaire['numeroproprietaire']; ?>'>
                            <?php echo $proprietaire['nomproprietaire'] ?></a></td>
                    <td><?php echo $proprietaire['prenomproprietaire'] ?></td>
                    <td><?php echo $proprietaire['titre'] ?></td>
                    <td><?php echo $proprietaire['telephonemobile'] ?></td>
                    <td><?php echo $proprietaire['telephonepersonnel'] ?></td>
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
