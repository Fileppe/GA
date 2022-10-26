<div class="container">
    <div class="row">
        <div class="col-xs-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Carte Circolazione</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Inserisci Lotto</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about" aria-selected="false">Assegnazione carte di circolazione</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive">
                            <?php $cartecircolazione = "SELECT cc.*, sc.descrizione FROM carte_circolazione cc, stati_carte sc where cc.id_stato = sc.id ORDER BY data asc, n_carta asc";
                            $conferma = mysqli_query($connessione, $cartecircolazione);
                            ?>
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>Data Lotto</th>
                                        <th>N carta circolazione</th>
                                        <th>Stato</th>
                                        <th>Prat.Ag / Acquirente</th>
                                        <th>Data assegnazione</th>
                                        <th>Azioni</th>
                                        <!-- <th style="width: 36px;"></th> -->
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($conferma)) {
                                    echo '  
                            <tr>  
                                    <td>' . $row["data"] . '</td>  
                                    <td>' . $row["n_carta"] . '</td>  
                                    <td>' . $row["descrizione"] . '</td>   
                                    <td>' . $row["prat_ag_acquirente"] . '</td>
                                    <td>' . $row["data_assegnazione"] . '</td>
                                    <td> <a href="back/annulla.php?id=' . $row["id"] . '" class="btn btn-danger">Annulla</a> </td>
                            </tr>  
                            ';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>
                            Inserire 2 lettere e 6 numeri per l'inserimento dei lotti
                        </div>
                    </div>

                    <form class="row g-3" action="back/insert.php" method="POST">
                        <div class="row col-12">
                            <div class="col-6 offset-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="col-6 offset-3">
                                <label for="n_carta_circolazione" class="form-label mb-3">N carta circolazione da </label>
                                <input type="text" class="form-control uppercase" id="n_carta_circolazione_da" name="n_carta_circolazione_da" required placeholder="XX123456" upper>
                                <label for="n_carta_circolazione" class="form-label mb-3">N carta circolazione a </label>
                                <input type="text" class="form-control uppercase" id="n_carta_circolazione_a" name="n_carta_circolazione_a" required placeholder="XX123456">
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Inserisci</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about-tab">
                    <form class="row g-3" action="back/assegna.php" method="POST">
                        <div class="row col-12">
                            <div class="col-6 offset-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="col-6 offset-3">
                                <?php
                                $idPrimaCartaDisponibile = "";
                                $primaCartaDisponibile = "";

                                $query = "SELECT * FROM `carte_circolazione` WHERE id_stato = 1 order by data asc, id asc limit 1";
                                $result2 = mysqli_query($connessione, $query);

                                while ($row = mysqli_fetch_array($result2)) {
                                    $idPrimaCartaDisponibile = $row["id"];
                                    $primaCartaDisponibile = $row["n_carta"];
                                }
                                ?>
                                <label for="n_carta_circolazione" class="form-label mb-3">N carta circolazione </label>
                                <input type="hidden" name="id_carta_circolazione" value="<?php echo $idPrimaCartaDisponibile; ?>" />
                                <input type="text" class="form-control uppercase" id="n_carta_circolazione" name="n_carta_circolazione" required readonly value="<?php echo $primaCartaDisponibile; ?>">
                                <label for="prat_ag_acquirente" class="form-label mb-3">Prat.Ag / Acquirente </label>
                                <input type="text" class="form-control" id="prat_ag_acquirente" name="prat_ag_acquirente" required>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Assegna</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>