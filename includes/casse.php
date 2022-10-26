<div class="container mt-1 mb-5">
    <div class="row">
        <div class="col-md-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home" aria-selected="true">Utenti Cassa</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="false">Aggiungi Cassa/Assegna Cassa</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form class="row g-3" action="back/inserisci2.php" method="POST">
                        <div class="row col-12">
                            <div class="col-6 offset-3">
                                <label for="usernamecassa" class="form-label">Nome Cassa</label>
                                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Inserisci Nome">
                            </div>
                            <div class="col-6 offset-3">
                                <label for="username" class="form-label">Nome Utente</label>
                                <select class="form-select" name="utente" id="utente">
                                    <?php
                                    $query = "SELECT * FROM utenti";
                                    $risultato = mysqli_query($connessione, $query);

                                    while ($row = mysqli_fetch_array($risultato)) {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                    ?>
                                        <option value="<?= $id ?>"><?= $row['username']; ?></option>

                                    <?php  } ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                        </div>
                    </form>
                </div>
                <?php
                $query2 = "SELECT c.id, c.nome, c.id_utente, u.username FROM casse c LEFT OUTER JOIN utenti u ON c.id_utente = u.id ";
                $result = mysqli_query($connessione, $query2); ?>
                <div class="tab-pane fade show active" id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cassa</th>
                                    <th>Utente</th>
                                    <th class="text-center">Azioni</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '  
                            <tr>
                                    <td>' . $row["id"] . '</td>
                                    <td>' . $row["nome"] . '</td> 
                                    <td>' . $row["username"] . '</td>  
                                    <td class="text-center"> <a href="back/elimina2.php?id=' . $row["id"] . '" class="btn btn-danger text-center"><i class="bi bi-trash"></i></a> &nbsp; &nbsp;  <a href="includes/modifica2.php?id=' . $row["id"] . '" class="btn btn-info text-center"><i class="bi bi-pen"></i></a> </td>
                            </tr> 
                            ';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>