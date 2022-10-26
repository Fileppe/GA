<?php include '../configurazione/config.php';
$id = $_GET['id'];
$query = "SELECT * FROM casse WHERE id ='" . $id . "'";
$result = mysqli_query($connessione, $query);
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 " style="background-color: #e3f2fd;">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar" style="background-color: #e3f2fd;">
                    <div class="text-center p-3">
                        <img src="../immagini/3effe.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="#" class="navbar-brand mx-0 font-weight-bold  text-nowrap" style="color: black;">TRE EFFE INFORMATICA</a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-last" id="nav">
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="../index.php?cartecircolazione" class="nav-link active" style="color: black;"> Carte circolazione / Lotti</a>
                            </li>
                            <a onclick="myFunction()" class="dropbtn nav-link" style="color:black">Utenti</a>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="../index.php?utenti">Lista Utenti</a>
                                <a href="../index.php?casse">Utenti Casse</a>
                                <!-- <a href="#">Link 3</a> -->
                            </div>
                            <li class="nav-item">
                                <a href="../index.php?gestionecasse" class="nav-link" style="color: black;"> Gestione Casse </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col px-0 flex-row-1">
                <div class="container py-3">
                    <article>
                        <div class="container mt-3 text-center" style="position: relative ;">
                            <div class="row">
                                <div class="col-xs-12 ">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Modifica Utente</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="well text-center">
                                                <form class="row g-3" action="../back/mod2.php" method="POST">
                                                    <div class="row col-12">
                                                        <div class="col-6 offset-3">
                                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                                <input type="text" class="form-control" id="id" name="id" value="<?= $row['id']; ?>" hidden>
                                                                <label for="nome" class="form-label">Nome Cassa</label>
                                                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $row['nome']; ?>">
                                                        </div>
                                                        <div class="col-6 offset-3">
                                                            <label for="_password" class="form-label mb-2 mt-2">Nome Utente</label>
                                                            <select name="utente" class="form-control">
                                                                <option value="">Seleziona utente</option>
                                                            <?php  } ?>
                                                            <?php
                                                            $idUtenteCassa = $row['id_utente'];
                                                            $query2 = "SELECT * FROM utenti";
                                                            $resultUtenti = mysqli_query($connessione, $query2);

                                                            while ($rowUtenti = mysqli_fetch_array($resultUtenti)) {
                                                                $selected = "";
                                                                if ($idUtenteCassa == $rowUtenti["id"]) {
                                                                    $selected = "selected";
                                                                }
                                                                echo "<option value='" . $rowUtenti["id"] . "' $selected >" . $rowUtenti["username"] . "</option>";
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="btn btn-primary mt-3">Modifica</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </main>
        </div>
    </div>
</body>
<script type="text/javascript" src="../js/dopdown.js"></script>