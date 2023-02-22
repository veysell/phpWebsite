<?php
$sayfa = "Testler | ";
include("inc/head.php");
include("inc/db.php");
?>


<style>
    .answers {
        /* border-color: black; */
        border: none;
        color: black;
    }

    .answers:hover {
        color: white;
    }

    .active, .answers:hover {
        background-color: forestgreen;
        color: white;
    }
    .false {
        background-color:firebrick;
        color: white;
    }
    .true{
        background-color: forestgreen;
        color: white;
    }
</style>
<!-- about -->
<div class="container py-6 ">
    <?php
    
$sorgu1 = $baglanti->prepare("SELECT * FROM testadi where testNo=1");
$sorgu1->execute();
$sonuc1 = $sorgu1->fetch();
$sorgu = $baglanti->prepare("SELECT * FROM sorubaslik , a , b ,c,d WHERE sorubaslik.soruNo=a.soruNo AND sorubaslik.soruNo=b.soruNo and
    sorubaslik.soruNo=c.soruNo and
    sorubaslik.soruNo=d.soruNo order by sorubaslik.soruNo");
$sorgu->execute();
?>
    <div class="container ">
        <h4 class="text-center border-bottom">
            <?= $sonuc1["testAd"] ?>
        </h4>
    </div>
    <?php
    while ($sonuc = $sorgu->fetch()) {
    ?>
    <div class="container mb-2 col-md">
        <div class="container col-md-9">
            <h5 class="m-1 <?= $sonuc["soruNo"] ?>">
                <?= $sonuc["soruNo"] ?>. Soru:  <?= $sonuc["baslikMetin"] ?> 
            </h5>
        </div>
        <div class="container col-md-9" id="myAnswer">
            <div class="container m-2 "><button class="btn btn-outline-dark rounded-pill choise answers<?=$sonuc["soruNo"]?>" id="1" onclick='var soruNo="<?=$sonuc["soruNo"]?>";
    userAnswer("<?=$sonuc["soruNo"]?>",1);
    realAnswer("<?=$sonuc["soruNo"]?>",<?=$sonuc["cevap"]?>);
   
    let buttons=document.querySelectorAll(".answers<?=$sonuc["soruNo"]?>");
    buttons.forEach(button=>{
        button.addEventListener("click",function(){
            buttons.forEach(btn=>btn.classList.remove("active"));
            this.classList.add("active");
        });
    });' >
            A) <?= $sonuc["soruA"] ?></button></div>

            <div class="container m-2 "><button class="btn btn-outline-dark rounded-pill choise  answers<?=$sonuc["soruNo"]?>" id="2" onclick='var soruNo="<?=$sonuc["soruNo"]?>";
    userAnswer("<?=$sonuc["soruNo"]?>",2);
    realAnswer("<?=$sonuc["soruNo"]?>",<?=$sonuc["cevap"]?>);
    let buttons=document.querySelectorAll(".answers<?=$sonuc["soruNo"]?>");
    buttons.forEach(button=>{
        button.addEventListener("click",function(){
            buttons.forEach(btn=>btn.classList.remove("active"));
            this.classList.add("active");
        });
    });' >
            B) <?= $sonuc["soruB"] ?></button></div>

            <div class="container m-2 "><button class="btn btn-outline-dark rounded-pill choise  answers<?=$sonuc["soruNo"]?>" id="3" onclick='var soruNo="<?=$sonuc["soruNo"]?>";
    userAnswer("<?=$sonuc["soruNo"]?>",3);
    realAnswer("<?=$sonuc["soruNo"]?>",<?=$sonuc["cevap"]?>);
    let buttons=document.querySelectorAll(".answers<?=$sonuc["soruNo"]?>");
    buttons.forEach(button=>{
        button.addEventListener("click",function(){
            buttons.forEach(btn=>btn.classList.remove("active"));
            this.classList.add("active");
        });
    });' >
            C) <?= $sonuc["soruC"] ?></button></div>
                    
            <div class="container m-2 "><button class="btn btn-outline-dark rounded-pill choise answers<?=$sonuc["soruNo"]?>" id="4" onclick='var soruNo="<?=$sonuc["soruNo"]?>";
    userAnswer("<?=$sonuc["soruNo"]?>",4);
    realAnswer("<?=$sonuc["soruNo"]?>",<?=$sonuc["cevap"]?>);
    let buttons=document.querySelectorAll(".answers<?=$sonuc["soruNo"]?>");
    buttons.forEach(button=>{
        button.addEventListener("click",function(){
            buttons.forEach(btn=>btn.classList.remove("active"));
            this.classList.add("active");
        });
    });' >
            D) <?= $sonuc["soruD"] ?></button></div>
        </div>
        
    </div>
    <?php
    }
    ?>
    <div class="container col-md-10 m-5 text-center"><button id="testEnd" class="btn btn-success rounded-pill">Testi Bitir</button></div>
    <p id="yaz"></p>
    <p id="yaz2"></p>
    <p id="yaz3"></p>
</div>
<?php

?>
<!-- about end -->
<script type="text/javascript" src="js/quiz.js"></script>
<?php
include("inc/footer.php")
    ?>

