<?php
include_once 'header.php';

// Requetes des clients
$sql = 'select nomclient, prenomclient, codepostal, nomville, titre
from clients inner join villes v on clients.codeville = v.codeville ORDER BY nomclient';
$requete = $pdo -> query($sql);
$clients = $requete->fetchAll();


// Requete des biens
$sql = 'select adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from biens
         INNER JOIN villes v on biens.codeville = v.codeville
         INNER JOIN typesbiens t on biens.codebien = t.codebien
         INNER JOIN typestransactions t2 on biens.codetransaction = t2.codetransaction
ORDER BY montant DESC';
$requete = $pdo -> query($sql);
$biens = $requete->fetchAll();

// Requete des propriétaires
$sql = 'select numeroproprietaire, nomproprietaire, prenomproprietaire, titre, telephonemobile, telephonepersonnel from proprietaires
ORDER BY nomproprietaire ASC';
$requete = $pdo -> query($sql);
$proprietaires = $requete->fetchAll();

// Requete des détails propriétaires
$infoProprio = '';
$infoBiensProprio = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select nomproprietaire, prenomproprietaire, titre, telephonemobile, telephonepersonnel, email from proprietaires
where numeroproprietaire = $id";
    $requete = $pdo->query($sql);
    $infoProprio = $requete->fetch();

    $sql = "select distinct b.adresse1, codepostal, nomville, pieces, intituletransaction, intitulebien, montant
from proprietaires
         inner join biens b on proprietaires.numeroproprietaire = b.numeroproprietaire
         inner join villes v on b.codeville = v.codeville
         inner join typesbiens t on b.codebien = t.codebien
         inner join typestransactions t2 on b.codetransaction = t2.codetransaction
where proprietaires.numeroproprietaire = $id
order by montant desc";

    $requete = $pdo -> query($sql);
    $infoBiensProprio = $requete->fetchAll();
}

