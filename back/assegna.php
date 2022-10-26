<?php include '../configurazione/config.php';

$id_carta_circolazione = $_POST['id_carta_circolazione'];
$data = $_POST['data'];
$prat_ag_acquirente = $_POST['prat_ag_acquirente'];

$query = "UPDATE carte_circolazione set data_assegnazione = '$data', id_stato = 2, prat_ag_acquirente = '$prat_ag_acquirente' WHERE id = $id_carta_circolazione ";

$result = mysqli_query($connessione, $query);

if (!$result) {
    echo 'errore impossibile assegnare';
}

header('location: ../index.php?cartecircolazione');
die();
