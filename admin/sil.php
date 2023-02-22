<?php
include("inc/ahead.php");

 if(!(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789") ){
    header("location:login.php");
}
else{

if($_GET){ //delete
    //duyuru sil start
    $tablo = $_GET["tablo"];
    $id = (int) $_GET["id"];
    $sorgu = $baglanti->prepare("delete from $tablo where id=:id");
    $sonuc = $sorgu->execute(["id"=>$id]);
    if ($sonuc) {
        echo '<script type="text/javascript" src="css/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire({title:'Başarılı', text: 'Silme Başarılı',icon:'success',confirmButtonText:'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='index.php'}})</script>";
    }
    //duyuru sil end

}
}

?>