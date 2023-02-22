<?php

use function PHPSTORM_META\type;

include("inc/ahead.php");

if ($_POST) { //add 

    $aktif = 0;
    if (isset($_POST["aktif"])) {
        $aktif = 1;
    }
    $hata = '';

    if ($_POST["baslik"] != "" && $_POST["metin"] != "" && $_POST["tarih"] != "") {

        try {
            $ekleSorgu = $baglanti->prepare("insert into duyurular set duyuruBaslik=:baslik,duyuruMetin=:metin,duyuruTarih=:tarih,
            active=:aktif");
            $ekle = $ekleSorgu->execute([
                "baslik" => $_POST["baslik"],
                "metin" => $_POST["metin"],
                "tarih" => $_POST["tarih"],
                "aktif" => $aktif
            ]);
            if ($ekle) {
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({title:'Başarılı', text: 'Ekleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.location.href='index.php'}})</script>";
            }
        } catch (Exception $e) { 
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({
                    icon: 'error',
                    title: 'Başarısız',
                    text: 'Ekleme başarısız lütfen tarih alanına 2022-12-30 formatında giriş yapınız',
                  })</script>";
        } 
    }
}
?>
<main>
    <div class="container-fluid px-4">


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Duyuru Ekle
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div form-group class="m-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" required class="form-control"
                            value="<?=@$_POST["duyuruBaslik"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>Metin/Açıklama</label>
                        
                        <textarea name="metin"  cols="30" rows="10" required class="form-control" value="<?=@$_POST["duyuruMetin"] ?>"></textarea>
                    </div>
                    <div form-group class="m-3">
                        <label>Tarih</label>
                        <input type="text" name="tarih" required placeholder="<?=date("Y/m/d")?>" class="form-control"
                            value="<?=@$_POST["duyuruTarih"] ?>">
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