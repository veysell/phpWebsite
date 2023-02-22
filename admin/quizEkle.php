<?php
include("inc/ahead.php");

if ($_POST) { //add 
    
    $cevap =(int) $_POST["cevap"];
    $testid = (int) $_POST["testid"];
    try {
        
        $ekleSoru = $baglanti->prepare("insert into sorular set soru=:soru , testid=:testid , cevap=:cevap ");
        $ekleSoru->execute([
            "soru"=>$_POST["baslik"],
            "testid"=>$testid,
            "cevap"=>$cevap
        ]);
        $sorgu = $baglanti->prepare("select max(id) from sorular where testid=:testid");
        $sorgu->execute(["testid" => $testid]);
        $sonuc = $sorgu->fetch();
        $id= $sonuc["max(id)"];
        $ekleA = $baglanti->prepare("insert into cevapa set a=:soru , testid=:testid , soruid=:soruid");
        $ekleA->execute([
            "soru"=>$_POST["a"],
            "testid"=>$testid,
            "soruid"=>$id
        ]);
        $ekleB = $baglanti->prepare("insert into cevapb set b=:soru , testid=:testid , soruid=:soruid");
        $ekleB->execute([
            "soru"=>$_POST["b"],
            "testid"=>$testid,
            "soruid"=>$id
        ]);
        $ekleC = $baglanti->prepare("insert into cevapc set c=:soru , testid=:testid , soruid=:soruid");
        $ekleC->execute([
            "soru"=>$_POST["c"],
            "testid"=>$testid,
            "soruid"=>$id
        ]);
        $ekleD = $baglanti->prepare("insert into cevapd set d=:soru , testid=:testid , soruid=:soruid");
        $ekleD->execute([
            "soru"=>$_POST["d"],
            "testid"=>$testid,
            "soruid"=>$id
        ]);

        if ($ekleSoru && $ekleD && $ekleA && $ekleB && $ekleC) {
            echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
            echo "<script> Swal.fire({title:'Başarılı', text: 'Ekleme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.history.back(window.history.back())}})</script>";
        }
    } catch (Exception $e) {
        echo $e;
        echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire({
                    icon: 'error',
                    title: 'Başarısız',
                    text: 'Ekleme başarısız lütfen alanları kontrol edin',
                  })</script>";
    }
}
?>
<main>
    <div class="container-fluid px-4">


        <div class="card mb-4">
            <div class="card-header row">
                <h5 class="col-4">Soru Ekle</h5>
                <h5 class="col">Test Adı: <?="" ?> Testi</h5>
            </div>
            <div class="card-body">
                <form action="quizEkle.php" method="post" enctype="multipart/form-data">
                    <div form-group class="m-3">
                        <label>Soru</label>
                        <input type="text" name="baslik" required class="form-control" value="<?=@"" ?>">
                        <input type="text" name="testid" required class="form-control" value="<?=@$_GET["testid"] ?>" hidden> 
                    </div>
                    <div form-group class="m-3">
                        <label>A şıkkı</label>

                        <input type="text" name="a" required class="form-control" value="<?=@"" ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>B şıkkı</label>

                        <input type="text" name="b" required class="form-control" value="<?=@"" ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>C şıkkı</label>

                        <input type="text" name="c" required class="form-control" value="<?=@"" ?>">
                    </div>
                    <div form-group class="m-3">
                        <label>D şıkkı</label>
                        <input type="text" name="d" required class="form-control" value="<?=@"" ?>">
                    </div>
                    <div form-group class="m-3">
                        <label for="cevap">Doğru Cevap</label>
                        <select name="cevap" class="form-control">
                            <option value="" selected>Doğru cevabı seçiniz</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                    </div>
                    <div form-group class="m-3">
                        <label>Soru Numarası <?="" ?></label>
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