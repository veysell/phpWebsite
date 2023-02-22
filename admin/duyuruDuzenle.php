<?php
include("inc/ahead.php");
$sorgu = $baglanti->prepare("SELECT * FROM duyurular WHERE id=:id");
$sorgu->execute(['id'=>(int)$_GET["id"]]);
$sonuc = $sorgu->fetch();

if($_POST){ //update
    $aktif = 0;
    if (isset($_POST["aktif"])) {
        $aktif = 1;
    }
    try{
    $updateQuery=$baglanti->prepare("update duyurular set duyuruBaslik=:baslik, duyuruMetin=:metin, duyuruTarih=:tarih , active=:aktif where id=:id");
    $update = $updateQuery->execute([
        'baslik' => $_POST["baslik"],
        'metin' => $_POST["metin"],
        'tarih' =>$_POST["tarih"],
        'aktif' =>$aktif,
        'id'=>(int)$_GET["id"]
    ]);
    if($update){
        echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire({title:'Başarılı', text: 'Güncelleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='index.php'}})</script>";
    }
}
catch (Exception $e){
    echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire({
        icon: 'error',
        title: 'Başarısız',
        text: 'Güncelleme başarısız',
      })</script>";
}
   
        
    
}

?>
                         <main>
                    <div class="container-fluid px-4">

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <h6>Duyuru Güncelle</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div form-group class="m-3">
                                        <label>Başlık</label>
                                        <input type="text" name="baslik" required class="form-control" value="<?=$sonuc["duyuruBaslik"]?>">
                                    </div>
                                    <div form-group class="m-3">
                                        <label>Metin/Açıklama</label>
                                        <textarea name="metin"  cols="30" rows="10" required class="form-control" ><?=$sonuc["duyuruMetin"] ?></textarea>
                                        
                                    </div>
                                    <div form-group class="m-3">
                                        <label>Tarih(yyyy/aa/gg)</label>
                                        <input type="text" name="tarih" required class="form-control" value="<?=$sonuc["duyuruTarih"]?>">
                                    </div>
                                    <div form-group class="m-3"> 
                                        <label><input type="checkbox" name="aktif"  class="form-check-input" <?=$sonuc["active"]==1?"checked":""?>>Aktif mi?</label>
                                        
                                    </div>
                                    <div form-group class=" btn btn-primary m-3">
                                        <input type="submit"  required class="form-control"  class="btn btn-primary" value="Güncelle">
                            
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
                <?php
                include("inc/afooter.php");
?>