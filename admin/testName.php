<?php

use function PHPSTORM_META\type;

include("inc/ahead.php");
if ($_GET) {
    $testad = $_GET["testAd"];
    $testno = $_GET["testNo"];
    $testtanim = $_GET["testTanim"];
    $activeState = (int) $_GET["active"];
}
if ($_POST) { //add 
    if ($_POST["testAd"] != "" && $_POST["testTanim"] != '') {
        if (@$_POST["act"] == 'Yes') {
            $act = 1;} else {
            $act = 0;}
        try {
            $ekleSorgu = $baglanti->prepare("update testad set ad=:testAd, aciklama=:testTanim ,active=:active where id=:testNo");
            $ekle = $ekleSorgu->execute([
                "testAd" => $_POST["testAd"],
                "testNo" => $testno,
                "testTanim" => $_POST["testTanim"],
                "active"=> $act
            ]);

            if ($ekle) {
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({title:'Başarılı', text: 'Güncelleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.history.back(window.history.back())}})</script>";
            }
        } catch (Exception $e) {
            echo $e;
            echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
            echo "<script> Swal.fire({
                    icon: 'error',
                    title: 'Başarısız',
                    text: 'Güncelleme başarısız lütfen alanı kontrol edin',
                  })</script>";
        }
    }
}
?>
<main>
    <div class="container-fluid px-4">


        <div class="card mb-4">
            <div class="card-header row">
                <h5 class="col-4">Test Adını Güncelle</h5>
                <h5 class="col">Mevcut Test Adı: <?= $testad ?>
                </h5>
                <p>Test Tanımı: <?= $testtanim ?>
                </p>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div form-group class="m-3">
                        <label>Yeni test adı:</label>
                        <input type="text" name="testAd" required class="form-control" value="<?=$testad ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>Yeni test tanımı:</label>
                        <input type="text" name="testTanim" required class="form-control"
                            value="<?=$testtanim?>">
                    </div>
                    <div form-group class="m-3">
                        <input class="form-check-input" value="Yes" type="checkbox" id="act" name="act"<?= $activeState == 1 ? "checked" : "" ?>>
                        <label class="form-check-label" for="act">Yayın Durumu</label>
                    </div>

                    <div form-group class=" btn btn-primary m-3">
                        <input type="submit" required class="form-control" value="Güncelle">
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>



<?php
include("inc/afooter.php");
?>