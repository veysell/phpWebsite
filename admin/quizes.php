<?php
include("inc/ahead.php");

?>

<main>


  <div class="container">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      <div class="row">
        <div class="col-sm">
          <h5>Testler</h5>
        </div>
        <div class="col-sm"><a href="yeniTestEkle.php" class="btn btn-primary">Yeni Test Ekle</a></div>
      </div>
    </div>
    <div class="row d-flex jutify-content-around mt-2">
      <?php
    $sorgu = $baglanti->prepare("SELECT * FROM testad");
    $sorgu->execute();
    while ($sonuc = $sorgu->fetch()) {
    ?>
      <div class="col-sm-6 mt-2">
        <div class="card">
          <div class="card-body row">
            <h5 class="card-title">
              <?= $sonuc["ad"] ?>
            </h5>
            <p class="card-text">
              <?= $sonuc["aciklama"] ?>
            </p>
            <div class="col-sm-5">
              <a href="aquiz.php?test=<?=$sonuc["id"]?>" class="btn btn-primary">Görüntüle | Düzenle</a>
            </div>
            <div class="col-sm-3 form-check ">
              <input class="form-check-input" type="checkbox" id="act" name="act" <?=$sonuc["active"]==1?"checked":""?> disabled>
              <label class="form-check-label" for="act">Yayın Durumu</label>
            </div>
            
          </div>
        </div>
      </div>
      <?php
    }
      ?>
    </div>
  </div>

</main>


<script type="text/javascript" src="css/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>


<?php
include("inc/afooter.php");
?>