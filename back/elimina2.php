<?php include '../configurazione/config.php';

$id = $_GET["id"];

$query = "DELETE FROM casse WHERE id = $id";

$result = mysqli_query($connessione, $query);

if (!$result) {
    echo 'Errore imprevisto, riprova';
}
header('location: ../index.php?casse');
die();
