<?php
extract($_POST); // extract fonksiyonu ile değişkenleri gelen isimleriyle kullanılır hale getirdik ve aldık. 
if ($_POST) { // eğer post işlemi varsa
    $length = (int) $_POST["length"];
    $count = 1;
    $dogru = 0;
    $yanlis = 0;
    $bos = 0;

    while ($count <= $length) {
        $dogru = 0;
        $yanlis = 0;
        $bos = 0;
        $mesaj = "";
        $c = "";
        $cevap = @$_POST["cevap$count"];
        if ($cevap == "1" || $cevap == 1) {
            $c = "A";
        } else if ($cevap == "2" || $cevap == 2) {
            $c = "B";
        } else if ($cevap == "3" || $cevap == 3) {
            $c = "C";
        } else if ($cevap == "4" || $cevap == 4) {
            $c = "D";
        } else {
            $c = "x";
        }
        if (@$_POST["answer$count"] == $c) {
            $dogru = 1;
        } else if (@$_POST["answer$count"] == "") {
            $bos = 1;
        } else {
            $yanlis = 1;
        }
        $mesaj = "$dogru$yanlis$bos$c";
        echo $mesaj;
        $count += 1;

    }


}
?>