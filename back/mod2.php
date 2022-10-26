<?php include '../configurazione/config.php';
$id = $_POST['id'];
$nome = $_POST['nome'];
$utente = $_POST['utente'];

$query = "UPDATE casse SET nome = '".$nome ."' , id_utente = '".$utente ."' WHERE id = $id";
$result = mysqli_query($connessione, $query);

if(!$result){
    echo 'Impossibile eseguire la query';
}else{
    header('Location: ../index.php?casse');
}