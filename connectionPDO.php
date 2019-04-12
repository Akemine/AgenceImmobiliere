<?php
include_once 'header.php';

// Requetes des clients
$sql = 'select nomclient, prenomclient, codepostal, nomville, titre
from clients inner join villes v on clients.codeville = v.codeville ORDER BY nomclient';
$requete = $pdo->query($sql);
$clients = $requete->fetchAll();


// Requete des biens
$sql = 'select adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from biens
         INNER JOIN villes v on biens.codeville = v.codeville
         INNER JOIN typesbiens t on biens.codebien = t.codebien
         INNER JOIN typestransactions t2 on biens.codetransaction = t2.codetransaction
ORDER BY montant DESC';
$requete = $pdo->query($sql);
$biens = $requete->fetchAll();

// Requete des propriétaires
$sql = 'select numeroproprietaire, nomproprietaire, prenomproprietaire, titre, telephonemobile, telephonepersonnel from proprietaires
ORDER BY nomproprietaire ASC';
$requete = $pdo->query($sql);
$proprietaires = $requete->fetchAll();
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
// Requete des détails propriétaires
$infoProprio = '';
$infoBiensProprio = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select nomproprietaire, prenomproprietaire, titre, telephonemobile, telephonepersonnel, email from proprietaires
where numeroproprietaire = $id";
    $requete = $pdo->query($sql);
    $infoProprio = $requete->fetch();

    // Requete qui récupère les biens d'un propriétaire
    $sql = "select distinct b.adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires.numeroproprietaire = b.numeroproprietaire
         inner join villes v on b.codeville = v.codeville
         inner join typesbiens t on b.codebien = t.codebien
         inner join typestransactions t2 on b.codetransaction = t2.codetransaction
where proprietaires.numeroproprietaire = $id
order by montant desc";

    $requete = $pdo->query($sql);
    $infoBiensProprio = $requete->fetchAll();
}


//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------//
$where = '';
$codeville = '';
$codebien = '';
$codetransaction = '';

    if (isset($_GET['idTransactions'])) {
        $codetransaction = $_GET['idTransactions'];
        $where = "where t2.codetransaction = '$codetransaction'";
        $sql = "select b.adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires.numeroproprietaire = b.numeroproprietaire
         inner join villes v on b.codeville = v.codeville
         inner join typesbiens t on b.codebien = t.codebien
         inner join typestransactions t2 on b.codetransaction = t2.codetransaction
        $where
order by montant desc";
        $requete = $pdo->query($sql);
        $biens = $requete->fetchAll();
    }


    elseif (isset($_GET['idVille'])) {
        $codeville = $_GET['idVille'];

        $where = "where b.codeville = $codeville";
        $sql = "select b.adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires.numeroproprietaire = b.numeroproprietaire
         inner join villes v on b.codeville = v.codeville
         inner join typesbiens t on b.codebien = t.codebien
         inner join typestransactions t2 on b.codetransaction = t2.codetransaction
        $where
order by montant desc";
        $requete = $pdo->query($sql);
        $biens = $requete->fetchAll();
    }

    elseif (isset($_GET['idBiens'])) {
        $codebien = $_GET['idBiens'];
        $where = "where b.codebien = '$codebien'";
        $sql = "select b.adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires.numeroproprietaire = b.numeroproprietaire
         inner join villes v on b.codeville = v.codeville
         inner join typesbiens t on b.codebien = t.codebien
         inner join typestransactions t2 on b.codetransaction = t2.codetransaction
        $where";
        $requete = $pdo->query($sql);
        $biens = $requete->fetchAll();
    }
 else {
    $sql = 'select b . adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires . numeroproprietaire = b . numeroproprietaire
         inner join villes v on b . codeville = v . codeville
         inner join typesbiens t on b . codebien = t . codebien
         inner join typestransactions t2 on b . codetransaction = t2 . codetransaction';
    $requete = $pdo->query($sql);
    $biens = $requete->fetchAll();
}


// Requete pour afficher les villes
$sql = 'select distinct villes.codeville, villes.nomville
from villes INNER JOIN biens b on villes.codeville = b.codeville
group by villes.nomville, villes.codeville';
$requete = $pdo->query($sql);
$listeVilles = $requete->fetchAll();

//Requete types de biens
$sql = 'select * from typesbiens';
$requete = $pdo->query($sql);
$intituleBiens = $requete->fetchAll();

//Requete types de biens
$sql = 'select * from typestransactions';
$requete = $pdo->query($sql);
$intituleTransactions = $requete->fetchAll();



