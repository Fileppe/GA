<div class="row mbr-justify-content-center">
    <?php
    $sql = "SELECT c.id, c.nome, u.username FROM casse c left outer join utenti u on c.id_utente = u.id";
    $res = mysqli_query($connessione, $sql);

    while ($row = mysqli_fetch_array($res)) {

        $id = $row['id'];
        $nome = $row['nome'];
        $utente = $row['username'];
    ?>

        <div class="col-lg-6 mbr-col-md-10">
            <div class="wrap">
                <div class="ico-wrap">
                    <a href="includes/cassa1.php?id=<?= $row['id']; ?>"><span><i class="bi bi-cash-coin"></i></span></a>
                </div>
                <div class="text-wrap vcenter">
                    <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"><?php echo $row['nome']; ?></h2>
                    <p class="mbr-fonts-style text1 mbr-text display-6"><?php echo $utente; ?> </p>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-lg-6 offset-3 mbr-col-md-10">
        <div class="wrap">
            <div class="ico-wrap">
                <a href="includes/cassatot.php"> <span><i class="bi bi-cash-coin"></i></span></a>
            </div>
            <div class="text-wrap vcenter">
                <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Casse <span></span></h2>
                <p class="mbr-fonts-style text1 mbr-text display-6">OPERAZIONI</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 offset-3 mbr-col-md-10">
        <div class="wrap">
            <div class="ico-wrap">
                <a href="includes/totalicasse.php"> <span><i class="bi bi-piggy-bank"></i></span></a>
            </div>
            <div class="text-wrap vcenter">
                <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Casse <span></span></h2>
                <p class="mbr-fonts-style text1 mbr-text display-6">TOTALI</p>
            </div>
        </div>
    </div>
</div>