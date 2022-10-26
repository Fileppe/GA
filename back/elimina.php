<?php include '../configurazione/config.php';
$id_utente = $_GET['id'];
$eliminaUtente = "DELETE FROM utenti WHERE id = $id_utente";
$conferma = mysqli_query($connessione, $eliminaUtente);
header('Location: ../index.php?utenti');