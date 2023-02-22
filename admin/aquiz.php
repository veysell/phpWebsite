<?php
include("inc/ahead.php");

?>

<main>
                    <div class="container-fluid px-4">
                        
                        <div class="card mb-4">
                            <div class="card-header">
                            <?php
                            $sorgu1 = $baglanti->prepare("SELECT * FROM testad where id=:test");
                            $sorgu1->execute(["test"=>$_GET["test"]]);
                            $sonuc1 = $sorgu1->fetch();
                            $testno =(int) $sonuc1["id"];
                            $sorgu = $baglanti->prepare("SELECT * FROM sorular , cevapa , cevapb ,cevapc,cevapd WHERE sorular.id=cevapa.soruid AND sorular.id=cevapb.soruid and
                                sorular.id=cevapc.soruid and
                                sorular.id=cevapd.soruid and
                                sorular.testid=:testNo order by sorular.id");
                            $sorgu->execute(["testNo"=>(int)$testno]);
                            ?>
                                <div class="row">
                                    <div class="col-sm"><h5>Test Adı: <?= $sonuc1["ad"] ?></h5></div>
                                    <div class="col-sm"><a href="testName.php?testAd=<?= $sonuc1["ad"] ?>&testNo=<?= $testno ?>&testTanim=<?= $sonuc1["aciklama"] ?>&active=<?= $sonuc1["active"] ?>" class="btn btn-primary">Test Adını Güncelle</a></div>
                                    <div class="col-sm"><a href="quizEkle.php?testid=<?= $testno ?>" class="btn btn-primary">Yeni Soru Ekle</a></div>
                                </div>
                               
                        </div>
                         
                            <div class="card-body">
                            <?php
                            while ($sonuc = $sorgu->fetch()) {
                            ?>
                            
                                <ul class="list-group">
                                    <li class="list-group-item ">
                                       <div class="row">
                                            <div class="col-2">
                                            <b>Soru: <?=$sonuc["id"]?></b>
                                            </div>
                                            <div class="col-2">
                                            
                                            </div>
                                            <div class="col-md-3 btn btn-primary m-1">
                                            <a href="quizDuzenle.php?testNo=<?= $testno ?>&soruNo=<?= $sonuc["id"] ?>" style="color: white;">Soru Güncelle</a>
                                            </div>
                                            <div class="col-md-3 btn btn-danger m-1">
                                            <a href="quizsil.php?testNo=<?=$testno?>&soruNo=<?= $sonuc["id"] ?>" style="color: white;" onclick='var id= "<?= $sonuc["id"] ?>"

                                         var url="quizsil.php?testNo=<?=$testno?>&soruNo=<?= $sonuc["id"] ?>"
                                         var e=confirm("Silmek istediğine emin misin?");
                                         if(e){
                                            window.location.href="";//url
                                            }'>Soru Sil</a>
                                            </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                    <p> <b class="col-sm">Cevap:</b>   
                                        <?php if ($sonuc["cevap"] == 1) {
                                    echo "A";
                                } else if ($sonuc["cevap"] == 2) {
                                    echo "B";
                                } else if ($sonuc["cevap"] == 3) {
                                    echo "C";
                                } else {
                                    echo "D";
                                }
                                        ?>
                                       </p>
                                    </li>
                                    <li class="list-group-item">
                                    <p><b>Soru Başlığı:</b>   
                                        <?= $sonuc["soru"] ?>
                                    </p>
                                    
                                    </li>
                                    <li class="list-group-item ">
                                    <p> <b>A)</b>  
                                        <?= $sonuc["a"] ?>
                                      </p>
                                     
                                    </li>
                                    <li class="list-group-item">
                                    <p>   <b>B)</b>   
                                            <?= $sonuc["b"] ?>
                                        </p>
                                        
                                    </li>
                                    <li class="list-group-item  ">
                                    <p>    <b>C)</b>  <?= $sonuc["c"] ?>
                                        </p>
                                        
                                    </li>
                                    <li class="list-group-item">
                                    <p>  <b> D)</b>   
                                        <?= $sonuc["d"] ?>
                                       </p>
                                      
                                    </li>

                                </ul>
                                         <?php
                            }
                                         ?>
                                
                            </div>
                        </div>
                    </div>
                </main>


    <script type="text/javascript" src="css/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="css/sweetalert2.all.min.js"></script>


    <?php
    include("inc/afooter.php");
    ?>