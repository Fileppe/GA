<?php
require_once 'configurazione/funzioni.php';
?>
<!doctype html>
<html lang="it">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestione Agenzia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 " style="background-color: #e3f2fd;">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar" style="background-color: #e3f2fd;">
                    <div class="text-center p-3">
                        <img src="immagini/3effe.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="index.php?home" class="navbar-brand mx-0 font-weight-bold  text-nowrap" style="color: black;">TRE EFFE INFORMATICA</a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-last" id="nav">
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="index.php?cartecircolazione" class="nav-link active" style="color: black;"> Carte circolazione / Lotti</a>
                            </li>
                            <!-- <div class="dropdown"> -->
                                <a onclick="myFunction()" class="dropbtn nav-link" style="color:black">Utenti</a>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="index.php?utenti">Lista Utenti</a>
                                    <a href="index.php?casse">Utenti Casse</a>
                                    <!-- <a href="#">Link 3</a> -->
                                </div>
                            <!-- </div> -->
                            <li class="nav-item">
                                <a href="index.php?gestionecasse" class="nav-link" style="color: black;"> Gestione Casse </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col px-0 flex-row-1">
                <div class="container py-3">
                    <article>
                        <?php
                        if (isset($_GET['cartecircolazione'])) {
                            include 'includes/carte-circolazione.php';
                        }
                        if (isset($_GET['modificaid'])) {
                            include 'includes/modifica.php';
                        }
                        if (isset($_GET['utenti'])) {
                            include 'includes/utenti.php';
                        }
                        if (isset($_GET['casse']))
                            include 'includes/casse.php';

                        if(isset($_GET['gestionecasse'])){
                            include 'includes/gestionecasse.php';
                        }
                        if(isset($_GET['home'])){
                            include 'includes/homeinfo.php';
                        }    
                        ?>
                    </article>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
<script type="text/javascript" src="js/datatables.js"></script>
<script type="text/javascript" src="js/dopdown.js"></script>