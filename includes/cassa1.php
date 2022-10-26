<?php
session_start();
$ruolo = $_SESSION['ruolo'];
$id = $_GET['id'];
?>
<!doctype html>
<html lang="it">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestione Cassa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
</head>
<style>
    .table-sortable tbody tr {
        cursor: move;
    }

    body {
        background-color: aliceblue;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
    <?php
    if ($id) {


        include '../configurazione/config.php';
        $query = "SELECT u.*, c.* FROM utenti u, casse c WHERE u.id = c.id_utente AND c.id = $id";
        $result = mysqli_query($connessione, $query);

        while ($row = mysqli_fetch_array($result)) {
            $utente = $row['username'];
        }

    ?>
        <h3 class="text-center mt-1">GESTIONE CASSA <span style="color: #e74c3c ;"><?= $utente; ?></span></h3>
    <?php } ?>
    <div class="container mt-3">
        <form action="../back/inscasse.php" method="POST">
            <div class="row clearfix">
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    Importo
                                </th>
                                <th class="text-center">
                                    Note
                                </th>
                                <th class="text-center">
                                    Operazione
                                </th>
                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='addr0' name="addr0" data-id="0" class="hidden">
                                <input type="text" name='id' id="id" hidden value="<?= $id ?>" />
                                <input type="text" name='utente_id' id="utente_id" hidden value="<!-- <?= $utente_id ?> -->" />
                                <td data-name="importo">
                                    <input type="text" name='importo' id="importo" placeholder='Inserisci cifra' class="form-control" />
                                </td>
                                <td data-name="desc">
                                    <textarea name="note" id="note" placeholder="Descrizione" class="form-control"></textarea>
                                </td>
                                <td data-name="sel">
                                    <select name="sel0" id="sel0">
                                        <option value="">--Seleziona Operazione--</option>
                                        <option value="1">Contante</option>
                                        <option value="2">Pos</option>
                                        <option value="3">Assegno</option>
                                    </select>
                                </td>
                                <!-- <td data-name="del">
                                    <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <a id="add_row" class="btn btn-primary float-right">Aggiungi riga</a> -->
            
                <a href="../index.php?gestionecasse" class="btn btn-outline-danger">Torna indietro</a>

            <div style="float: right ; margin-top: 43px; margin-right: 21px;">
                <input type="submit" class="btn btn-success" value="Registra Valori" style="margin-top: -68px ;">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#add_row").on("click", function() {
            // Dynamic Rows Code

            // Get max row id and set new id
            var newid = 0;
            $.each($("#tab_logic tr"), function() {
                if (parseInt($(this).data("id")) > newid) {
                    newid = parseInt($(this).data("id"));
                }
            });
            newid++;

            /* var tr = $("<tr></tr>", {
                id: "addr" + newid,
                "data-id": newid
            }); */

            // loop through each td and create new elements with name of newid
            /*  $.each($("#tab_logic tbody tr:nth(0) td"), function() {
                 var td;
                 var cur_td = $(this);

                 var children = cur_td.children(); */

            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });

                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
            /* }); */

            // add delete button and td
            /*
            $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
            .click(function() {
            $(this).closest("tr").remove();
            })
            ).appendTo($(tr));
            */

            // add the new row
            $(tr).appendTo($('#tab_logic'));

            $(tr).find("td button.row-remove").on("click", function() {
                $(this).closest("tr").remove();
            });
        });




        // Sortable Code
        var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();

            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });

            return $helper;
        };

        $(".table-sortable tbody").sortable({
            helper: fixHelperModified
        }).disableSelection();

        $(".table-sortable thead").disableSelection();



        $("#add_row").trigger("click");
    });
</script>