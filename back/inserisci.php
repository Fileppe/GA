<?php include '../configurazione/config.php';
$minstr = 6;
$username = $_POST['username'];
$password  = $_POST['_password'];
$ruolo = $_POST['ruolo'];

if(strlen($username)<$minstr){
    $mes = "Il nome utente non può essere inferiore di 6 caratteri";
    header("Location ../index.php");
}

$query = "INSERT INTO utenti (username, _password, ruolo) VALUES ('$username', '$password', '$ruolo')";
$result = mysqli_query($connessione, $query);

if (!$result) {
    echo 'errore impossibile inserire ';
    
}
header('location: ../index.php?utenti');
die();