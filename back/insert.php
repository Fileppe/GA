<?php include '../configurazione/config.php';

$data = $_POST['data'];
$n_carta_circolazione_da = $_POST['n_carta_circolazione_da'];
$n_carta_circolazione_a = $_POST['n_carta_circolazione_a'];

$prefisso_carta = strtoupper(substr($n_carta_circolazione_da, 0, 2));
$progr_carta_da = substr($n_carta_circolazione_da, 2);
$progr_carta_a = substr($n_carta_circolazione_a, 2);

for ($i = $progr_carta_da; $i < ($progr_carta_a + 1); $i++) {
    $num_carta_6 = str_pad($i, 6, "0", STR_PAD_LEFT);

    $num_carta = $prefisso_carta . $num_carta_6;

    $query = "INSERT INTO carte_circolazione (data, n_carta, id_stato)VALUES ('$data', '$num_carta', 1) ";

    $result = mysqli_query($connessione, $query);

    if (!$result) {
        echo 'errore impossibile inserire ';
        break;
    }
}


header('location: ../index.php?cartecircolazione');
die();
