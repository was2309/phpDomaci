<?php
include 'models/Restoran.php';
include 'models/Recenzija.php';

if (isset($_GET['restoran']) && $_GET['restoran'] == 'prikaz') {
    echo json_encode(restoran::vratiSvePodatkeIzBaze());
}

if (isset($_GET['recenzija']) && $_GET['recenzija'] == 'prikaz') {
    echo json_encode(recenzija::vratiSvePodatkeIzBaze());
}

if (isset($_GET['recenzija']) && $_GET['recenzija'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(recenzija::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['recenzija']) && $_GET['recenzija'] == 'sortAsc') {
    echo json_encode(recenzija::sortAsc());
}

if (isset($_GET['recenzija']) && $_GET['recenzija'] == 'sortDesc') {
    echo json_encode(recenzija::sortDesc());
}


if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'recenzija') {
    if (recenzija::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'restoran') {
    if (restoran::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}
