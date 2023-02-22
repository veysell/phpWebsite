<?php
include("inc/ahead.php");

if (!(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789")) {
    header("location:login.php");
} else {

    if ($_GET) { //delete
        //soru sil start
        try {

            $test = (int) $_GET["testNo"];
            $soru = (int) $_GET["soruNo"];
            $sorgu = $baglanti->prepare("delete from sorubaslik where testNo=:test and soruNo=:soru");
            $sorubaslik = $sorgu->execute(["test" => $test, "soru" => $soru]);
            $sorgu = $baglanti->prepare("delete from a where testNo=:test and soruNo=:soru");
            $a = $sorgu->execute(["test" => $test, "soru" => $soru]);
            $sorgu = $baglanti->prepare("delete from b where testNo=:test and soruNo=:soru");
            $b = $sorgu->execute(["test" => $test, "soru" => $soru]);
            $sorgu = $baglanti->prepare("delete from c where testNo=:test and soruNo=:soru");
            $c = $sorgu->execute(["test" => $test, "soru" => $soru]);
            $sorgu = $baglanti->prepare("delete from d where testNo=:test and soruNo=:soru");
            $d = $sorgu->execute(["test" => $test, "soru" => $soru]);

            if ($sorubaslik && $a && $b && $c && $d) {
                echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire({title:'Başarılı', text: 'Silme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
            if(value.isConfirmed){window.history.back()}})</script>";
            }
        } catch (Exception $e) {
            echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Başarısız',
                text: 'Silme başarısız',
              })</script>";
        }
        //soru sil end
    }
}

?>