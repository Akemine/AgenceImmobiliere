
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-white <?php if($_SERVER['SCRIPT_NAME']=== '/agenceImmobiliere/index.php') echo 'active'; else echo '';?>" href="index.php">Immo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/proprietaire.php');?>" href="proprietaire.php">Propriétaire</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/biens.php'); ?>" href="biens.php">Biens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/clients.php');?>" href="clients.php">Clients</a>
            </li>
        </ul>
    </div>
    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/quisomme    nous.php');?>" href="quisommenous.php">Qui sommes-nous ?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/contact.php');?>" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php activeLien('/agenceImmobiliere/planacces.php');?>" href="planacces.php">Plan d'accès</a>
            </li>
    </div>
</nav>