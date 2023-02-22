<?php

use function PHPSTORM_META\type;

include("inc/ahead.php");
$sorgu = $baglanti->prepare("select * from sorular where testid=:testNo and id=:soruNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"],'soruNo'=>$_GET["soruNo"]]);
$sorubaslik = $sorgu->fetch();

$sorgu = $baglanti->prepare("select * from cevapa where testid=:testNo and soruid=:soruNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"],'soruNo'=>$_GET["soruNo"]]);
$a = $sorgu->fetch();

$sorgu = $baglanti->prepare("select * from cevapb where testid=:testNo and soruid=:soruNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"],'soruNo'=>$_GET["soruNo"]]);
$b = $sorgu->fetch();

$sorgu = $baglanti->prepare("select * from cevapc where testid=:testNo and soruid=:soruNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"],'soruNo'=>(int)$_GET["soruNo"]]);
$c = $sorgu->fetch();

$sorgu = $baglanti->prepare("select * from cevapd where testid=:testNo and soruid=:soruNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"],'soruNo'=>(int)$_GET["soruNo"]]);
$d= $sorgu->fetch();

$sorgu = $baglanti->prepare("select * from testad where id=:testNo");
$sorgu->execute(['testNo'=>(int)$_GET["testNo"]]);
$testad= $sorgu->fetch();

if($_POST){ //update

    try{
    $cevap = (int)$_POST["cevap"];
            
    $updateQuery=$baglanti->prepare("update sorular set soru=:baslik, cevap=:cevap where testid=:testNo and id=:soruNo");
    $updateSorubaslik = $updateQuery->execute([
        'baslik' => $_POST["baslik"],
        'cevap' => $cevap,
        'testNo'=>(int)$_GET["testNo"],
        'soruNo'=>(int)$_GET["soruNo"]
    ]);

    $updateQuery=$baglanti->prepare("update cevapa set a=:a where testid=:testNo and soruid=:soruNo");
    $updateA = $updateQuery->execute([
        'a' => $_POST["a"],
        'testNo'=>(int)$_GET["testNo"],
        'soruNo'=>(int)$_GET["soruNo"]
    ]);

    $updateQuery=$baglanti->prepare("update cevapb set b=:b where testid=:testNo and soruid=:soruNo");
    $updateB = $updateQuery->execute([
        'b' => $_POST["b"],
        'testNo'=>(int)$_GET["testNo"],
        'soruNo'=>(int)$_GET["soruNo"]
    ]);

    $updateQuery=$baglanti->prepare("update cevapc set c=:c where testid=:testNo and soruid=:soruNo");
    $updateC = $updateQuery->execute([
        'c' => $_POST["c"],
        'testNo'=>(int)$_GET["testNo"],
        'soruNo'=>(int)$_GET["soruNo"]
    ]);

    $updateQuery=$baglanti->prepare("update cevapd set d=:d where testid=:testNo and soruid=:soruNo");
    $updateD = $updateQuery->execute([
        'd' => $_POST["d"],
        'testNo'=>(int)$_GET["testNo"],
        'soruNo'=>(int)$_GET["soruNo"]
    ]);
    
    if($updateSorubaslik && $updateA && $updateB && $updateC && $updateD  ){
        echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire({title:'Başarılı', text: 'Güncelleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.history.back(window.history.back()) }})</script>";
       
    }
}
catch (Exception $e){
        echo $e;
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
            <div class="card-header row">
                <h5 class="col-4">Soru Güncelle</h5>
                <h5 class="col">Test Adı: <?=$testad['ad']?> Testi</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div form-group class="m-3">
                        <label>Soru</label>
                        <input type="text" name="baslik" required class="form-control"
                            value="<?=$sorubaslik["soru"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>A şıkkı</label>
                        
                        <input type="text" name="a" required class="form-control"
                            value="<?=$a["a"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>B şıkkı</label>
                        
                        <input type="text" name="b" required class="form-control"
                            value="<?=$b["b"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>C şıkkı</label>
                        
                        <input type="text" name="c" required class="form-control"
                            value="<?=$c["c"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>D şıkkı</label>
                        <input type="text" name="d" required class="form-control"
                            value="<?=$d["d"] ?>">
                    </div>
                    <div form-group class="m-3">
                        <label for="cevap">Doğru Cevap</label>
                        <select id="cevap" name="cevap" class="form-control">
                            <option value="1" <?php if($sorubaslik["cevap"]==1) echo "selected"?>>A</option>
                            <option value="2" <?php if($sorubaslik["cevap"]==2) echo "selected"?>>B</option>
                            <option value="3" <?php if($sorubaslik["cevap"]==3) echo "selected"?>>C</option>
                            <option value="4" <?php if($sorubaslik["cevap"]==4) echo "selected"?>>D</option>
                        </select>
                    </div>
                     <div form-group class="m-3 col-3">
                         <input type="submit" required class="btn btn-success" value="Güncelle">
                     </div>
                </form>

            </div>
        </div>
    </div>
</main>


<?php
include("inc/afooter.php");
?>