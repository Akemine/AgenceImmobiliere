<?php

function displayConstructionPage()  {
    include_once 'header.php'; ?>
<body>
<section class="container-fluid">
    <header>
        <?php include_once 'navbar.php'; ?>
    </header>
    <section class="container py-3">
        <?php include_once 'jumbotronconstruction.php'; ?>
    </section>
    <footer>
        <?php include_once 'footer.php'; ?>
        <script src="vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    </footer>
</section>
</body>
</html>";
<?php }

function activeLien($nomPage) {
if ($_SERVER['SCRIPT_NAME'] === "$nomPage")
    echo 'active';
else
    echo ''; ?>"
<?php
}


function getLink($param, $value)
{
    global $tri;
    $tabhref = $tri;
    $tabhref[$param] = $value;
    $href = 'biens.php?';
    foreach($tabhref as $key => $val){
        $href .= "$key=$val&";
    }
    return $href;
}
