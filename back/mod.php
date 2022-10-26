<?php include '../configurazione/config.php';
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['_password'];
$ruolo = $_POST['ruolo'];

$query = "UPDATE utenti SET username = '".$username ."' , _password = '".$password ."' , ruolo = '".$ruolo ."'  WHERE id = $id";
$result = mysqli_query($connessione, $query);

if(!$result){
    echo 'Impossibile eseguire la query';
}else{
    header('Location: ../index.php?utenti');
}