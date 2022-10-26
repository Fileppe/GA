<?php include '../configurazione/config.php';

$nome = $_POST['nome'];
$utente = $_POST['utente'];

$query = "INSERT INTO casse (nome, id_utente)VALUES ('$nome', $utente)";
$result = mysqli_query($connessione, $query);

header('location: ../index.php?casse');
die();