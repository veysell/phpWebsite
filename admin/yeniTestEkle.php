<?php

use function PHPSTORM_META\type;

include("inc/ahead.php");
if ($_POST) { //add 
    $aktif = 0;
    if (isset($_POST["aktif"])) {
        $aktif = 1;
    }
    if ($_POST["testAd"] != "" && $_POST["testTanim"] != "" ) {

        try {
            $ekleSorgu = $baglanti->prepare("insert into testad set ad=:testad, aciklama=:testTanim,active=:aktif");
            $ekle = $ekleSorgu->execute([
                "testad" => $_POST["testAd"],
                "testTanim"=> $_POST["testTanim"],
                "aktif" => $aktif
            ]);
            
            if ($ekle) {
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({title:'Başarılı', text: 'Ekleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.location.href='quizes.php'}})</script>";
            }
        } catch (Exception $e) {
            echo $e; 
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({
                    icon: 'error',
                    title: 'Başarısız',
                    text: 'Ekleme başarısız lütfen alanı kontrol edin',
                  })</script>";
        } 
    }
}
?>
<main>
    <div class="container-fluid px-4">


        <div class="card mb-4">
            <div class="card-header row">
                <h5 class="col-4">Yeni Test Ekle</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div form-group class="m-3">
                        <label>Test adı:</label>
                        <input type="text" name="testAd" required class="form-control"
                            value="<?=@$_POST["testAd"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>Test Tanımı(Açıklama):</label>
                        <input type="text" name="testTanim" class="form-control"
                            value="<?=@$_POST["testTanim"] ?>">
                    </div>  
                    <div form-group class="m-3">
                        <label><input type="checkbox" name="aktif"  class="form-check-input" <?=@$sonuc["active"]==1?"checked":""?>>Aktif mi?</label>
                    </div>              
                    <div form-group class=" btn btn-primary m-3">
                        <input type="submit" required class="form-control" value="Ekle">
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>



<?php
include("inc/afooter.php");
?>