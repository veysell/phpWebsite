<?php
$sayfa = "Testler | ";
include("inc/head.php");
include("inc/db.php");

if ($_GET) {
  $testid = @$_GET["test"];
  $sorular = array();
  $soruNo = 0;
  $sorgu = $baglanti->prepare("select * from sorular where testid=:id");
  $sorgu->execute(["id" => $testid]);
  while ($soru = $sorgu->fetch()) {
    $soruNo += 1;
    $temp = [];
    $sorgu1 = $baglanti->prepare("select * from cevapa,cevapb,cevapc,cevapd where cevapa.testid=:test1 and cevapa.soruid=:soru1 and
  cevapb.testid=:test2 and cevapb.soruid=:soru2 and cevapc.testid=:test3 and cevapc.soruid=:soru3 and cevapd.testid=:test4 and cevapd.soruid=:soru4");
    $sorgu1->execute([
      "test1" => $testid,
      "soru1" => $soru["id"],
      "test2" => $testid,
      "soru2" => $soru["id"],
      "test3" => $testid,
      "soru3" => $soru["id"],
      "test4" => $testid,
      "soru4" => $soru["id"]
    ]);
    $cevap = $sorgu1->fetch();
    $temp = [$soruNo, $soru["soru"], $cevap["a"], $cevap["b"], $cevap["c"], $cevap["d"], $soru["cevap"]];
    array_push($sorular, $temp);
  }
}



?>
<style>
  #deneme2 {
    width: 450px;
    height: auto;
    position: relative;
    margin: auto;
  }
</style>

<div class="container mt-4">
  <div id="deneme2" class="">
    <?php
    $soruNo = 0;
    foreach ($sorular as $soru) {
      $soruNo += 1;
    ?>
    <div class="p-3">
      <form id="testForm">
        <div class="form-label">
          <b>Soru <?= $soruNo ?>: <?= $soru[1] ?></b>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer<?= $soru[0] ?>" id="q<?= $soru[0] ?>a" value="A" />
          <label class="form-check-label" for="q<?= $soru[0] ?>a">
            <?= $soru[2] ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input text-center" type="radio" name="answer<?= $soru[0] ?>" id="q<?= $soru[0] ?>b"
            value="B" />
          <label class="form-check-label" for="q<?= $soru[0] ?>b">
            <?= $soru[3] ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer<?= $soru[0] ?>" id="q<?= $soru[0] ?>c" value="C" />
          <label class="form-check-label" for="q<?= $soru[0] ?>c">
            <?= $soru[4] ?>
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer<?= $soru[0] ?>" id="q<?= $soru[0] ?>d" value="D" />
          <label class="form-check-label" for="q<?= $soru[0] ?>d">
            <?= $soru[5] ?>
          </label>
        </div>
        <input class="form-check-input" hidden type="radio" checked name="cevap<?= $soru[0] ?>" value="<?= $soru[6] ?>" />
        <div class="form-check">
          <b>
            <label id="result<?=$soruNo?>" class="form-check-label p-1"></label>
          </b>
        </div>
    </div>
    <?php
    }
    ?>
    <input class="form-check-input" hidden type="radio" checked name="length" value="<?= $soruNo ?>" />
    <button id="buton" type="submit" class="btn btn-secondary">Testi Bitir</button>
    </form>
  </div>
</div>

<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
  $(document).ready(function () {
    $("#buton").on("click", function () { // buton idli elemana tıklandığında
      $("#buton").prop("disabled", true);
      var gonderilenform = $("#testForm").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı

      var deger = 0;
      var sonuc="";
      var c=1;
      $.ajax({
        url: 'result.php', // serileştirilen değerleri ajax.php dosyasına
        type: 'POST', // post metodu ile 
        data: gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
        success: function (e) {
          deger = e.length;
          for (let i = 0; i < deger-3; i+=4) {
             if(e[i]==1){sonuc="Cevabınız Doğru";}
             else if(e[i+1]==1){sonuc="Cevabınız Yanlış, Doğru Cevap: "+e[i+3];}
             else if(e[i+2]==1) {sonuc="Boş, Doğru Cevap: "+e[i+3];}
             $("#result"+c).html("").html(sonuc);
             sonuc="";
             c+=1;
          }
          
        }
      });

    });
  });
</script>


<?php
include("inc/footer.php")
  ?>