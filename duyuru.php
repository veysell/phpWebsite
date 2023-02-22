<?php
$sayfa = "Duyurular | ";
include("inc/db.php");
include("inc/head.php");


?>
<div class="container-xxl h-100 py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">Altınbaşak Sürücü Kursu</h6>
            <h1 class="display-6 mb-4">Bilgilendirme ve Duyurular</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
        $sorgu = $baglanti->prepare("SELECT * FROM duyurular WHERE active=1");
        $sorgu->execute();
        while ($sonuc = $sorgu->fetch()) {
        ?>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                    <div class="text-center p-4 pt-0">
                        <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4"><i class="fa fa-bullhorn"
                                aria-hidden="true"></i></div>
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item small"><i class="fa fa-calendar-alt text-primary me-2"></i>
                                <?php
                                $orgDate = $sonuc["duyuruTarih"];  
                                $newDate = date("d-m-Y", strtotime($orgDate));  
                                echo "$newDate"; 
                                ?>
                            </li>
                        </ol>
                        <h5 class="mb-3">
                            <h4><?php echo $sonuc["duyuruBaslik"] ?></h4>
                        </h5>
                        <p class="fs-6">
                            <?php echo $sonuc["duyuruMetin"] ?>
                        </p>

                    </div>

                </div>
            </div>
            <?php
        }
            ?>
        </div>
    </div>
</div>

<?php
include("inc/footer.php")
    ?>