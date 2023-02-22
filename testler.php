<?php
$sayfa = "Testler | ";
include("inc/head.php");
include("inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM testad where active=1");
$sorgu->execute();
?>

<div class="container">
    <div class="row d-flex jutify-content-around mt-2">
    <?php
    while ($sonuc = $sorgu->fetch()) {
    ?>
      <div class="col-sm-6 mt-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $sonuc["ad"] ?></h5>
            <p class="card-text"><?= $sonuc["aciklama"] ?></p>
            <a href="test?test=<?=$sonuc["id"]?>" class="btn btn-primary">Çözmek için tıkla</a>
          </div>
        </div>
      </div>
      <?php
    }
?>
    </div>
</div>

<?php
include("inc/footer.php")
?>