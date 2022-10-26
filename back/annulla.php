<?php

use LDAP\Result;

include '../configurazione/config.php';
$id_carta_circolazione = $_GET['id'];
$data = date("y-m-d");

$query = "UPDATE carte_circolazione set data_assegnazione = '$data', id_stato = 3 WHERE id = $id_carta_circolazione ";
$result = mysqli_query($connessione, $query);
if(!$result){
    echo 'Errore';
}else{
    header('Location: ../index.php?cartecircolazione#nav-home');
}