<?php include '../configurazione/config.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 " style="background-color: #e3f2fd;">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar" style="background-color: #e3f2fd;">
                    <div class="text-center p-3">
                        <img src="../immagini/3effe.png" alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="../index.php?home" class="navbar-brand mx-0 font-weight-bold  text-nowrap" style="color: black;">TRE EFFE INFORMATICA</a>
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
                <h3 class="text-center mt-2">TOTALI CASSE</h3>
                <?php
                $connessione = mysqli_connect("localhost", "root", "Aceraspire", "gestione_agenzia");
                $query = "SELECT t.*, c.nome, u.username, o.descrizione FROM tot_casse t, casse c, utenti u, operazioni o WHERE t.id_cassa = c.id AND t.id_utente = u.id AND t.id_operazione = o.id_operazione";
                $result = mysqli_query($connessione, $query); ?>
                <main class="container">
                    <div class="container py-3">
                        <article>
                            <div class="container mt-3 text-center" style="position: relative ;">
                                <div class="row">
                                    <div class="col-xs-12 ">


                                        <div class="table-responsive">
                                            <table class="table" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Note</th>
                                                        <th>Cassa</th>
                                                        <th>Utente</th>
                                                        <th>Importo</th>
                                                        <th>Data</th>
                                                        <th>Operazione</th>
                                                        <th style="width: 36px;"></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '  
                            <tr>  
                                    <td>' . $row["id"] . '</td>  
                                    <td>' . $row["note"] . '</td>  
                                    <td>' . $row["nome"] . '</td>  
                                    <td>' . $row["username"] . '</td>   
                                    <td>' . $row["importo"] . '</td>
                                    <td>' . $row["data"] . '</td>
                                    <td>' . $row["descrizione"] . '</td>
                                    <td> <a href="elimina3.php?id=' . $row["id"] . '" class="btn btn-danger">Elimina</a> </td>
                            </tr>  
                            ';
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <div class="container text-center">
                                            <a href="../index.php?gestionecasse" class="btn btn-outline-danger mt-2">TORNA INDIETRO</a>
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

</html>
<script src="../js/datatables.js"></script>
<script src="../js/dopdown.js"></script>
    
