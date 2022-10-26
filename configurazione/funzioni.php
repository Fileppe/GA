<?php
require_once 'config.php';

function query($sql){
    global $connessione;
    return $sql;
}

function conferma($risultato){
    global $connessione;
    mysqli_query($connessione, $risultato);
}