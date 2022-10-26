<div class="container">
    <div class="row">
        <div class="col-xs-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Utenti</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Aggiungi Utente</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Ruolo</th>
                                    <th class="text-center">Azioni</th>
                                </tr>
                            </thead>
                            <?php
                            $mostraUtenti = "SELECT * FROM utenti";
                            $result = mysqli_query($connessione, $mostraUtenti);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '  
                            <tr>
                                    <td>' . $row["id"] . '</td>
                                    <td>' . $row["username"] . '</td>  
                                    <td>' . $row["ruolo"] . '</td> 
                                    <td class="text-center"> <a href="back/elimina.php?id=' . $row["id"] . '" class="btn btn-danger text-center"><i class="bi bi-trash"></i></a> &nbsp; &nbsp;  <a href="includes/modifica.php?modificaid=' . $row["id"] . '" class="btn btn-info text-center"><i class="bi bi-pen"></i></a> </td>
                            </tr> 
                            ';
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form class="row g-3" action="back/inserisci.php" method="POST">
                        <div class="row col-12">
                            <div class="col-6 offset-3">
                                <!-- <p class="errore"><?= $mes ?></p> -->
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Inserisci Nome">
                            </div>
                            <div class="col-6 offset-3">
                                <label for="_password" class="form-label mb-3">Password </label>
                                <input type="text" class="form-control" id="_password" name="_password" required placeholder="Assegna Password" />
                                <label for="ruolo" class="form-label mb-3">Ruolo </label>
                                <select class="form-select" aria-label="Default select example" id="ruolo" name="ruolo">
                                    <option selected id="ruolo" name="ruolo">Assegna Ruolo</option>
                                    <option value="admin" id="ruolo" name="ruolo">Admin</option>
                                    <option value="user" id="ruolo" name="ruolo">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>