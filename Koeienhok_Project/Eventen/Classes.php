<?php

$smt = "SELECT 
    ARTIEST.NAAM as artiest_NAAM,
    PODIUM.NAAM as Locatie,
    OPTREDEN.ID, DATUM, TIJD, TITEL, OPTREDEN.OMSCHRIJVING as optreden_omschrijving  FROM ARTIEST
        INNER JOIN OPTREDEN ON ARTIEST.ID=OPTREDEN.ARTIEST_ID
        INNER JOIN PODIUM ON PODIUM.ID=OPTREDEN.PODIUM_ID";


$smt = $pdo->prepare($smt);
$smt->execute();
$resultaten = $smt->fetchAll(PDO::FETCH_ASSOC);

class OPTREDEN
{
    public  $Locatie;
    public  $artiest_NAAM;
    public  $ID;
    public  $DATUM;
    public  $TIJD;
    public  $TITEL;
    public  $OMSCHRIJVING;

};

$oPTREDEN = [];
foreach ($resultaten as $row) {
    $OPTREDEN = new OPTREDEN();
    $OPTREDEN->artiest_NAAM = $row['artiest_NAAM'];
    $OPTREDEN->ID = $row['ID'];
    $OPTREDEN->DATUM = $row['DATUM'];
    $OPTREDEN->TIJD = $row['TIJD'];
    $OPTREDEN->TITEL = $row['TITEL'];
    $OPTREDEN->OMSCHRIJVING = $row['optreden_omschrijving'];
    array_push($oPTREDEN, $OPTREDEN);
}