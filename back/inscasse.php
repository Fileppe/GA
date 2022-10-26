<?php
include '../configurazione/config.php';

$id = $_POST['id'];
$importo = $_POST['importo'];
$note = $_POST['note'];
$operazione = $_POST['sel0'];

$query = "INSERT INTO tot_casse (note, id_cassa, importo, data, id_operazione) VALUES ('$note', $id, $importo, now(), $operazione)";
$result = mysqli_query($connessione, $query);

if(!$result){
    echo 'Errore nella query';
}else{
    header('Location: ../index.php?gestionecasse');
}