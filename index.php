<?php
$sayfa = "";
include("inc/head.php")
?>

        <!-- Carousel Start -->
        <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/kursaraba1.jpg" width="1260px" height="708px" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <h1 class="display-2 text-light mb-5 animated slideInDown">ALTINBAŞAK <br>
                                            Sürücü Kursu
                                        </h1>
                                        <a href="document.php" class="btn btn-primary py-sm-3 px-sm-5">Dokümanlar</a>
                                        <a href="#contact" class="btn btn-light py-sm-3 px-sm-5 ms-3">İletişim</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/kursaraba2.jpg" width="1260px" height="708px" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <h1 class="display-2 text-light mb-5 animated slideInDown">Ehliyetsiz Kimse
                                            Kalmasın</h1>
                                        <a href="process.php" class="btn btn-primary py-sm-3 px-sm-5">Süreci Öğren</a>
                                        <a href="#contact" class="btn btn-light py-sm-3 px-sm-5 ms-3">İletişim</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
        
        <!-- Features Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow" data-wow-delay="0.1s">
                        <h6 class="text-primary text-uppercase mb-2">Neden Biz ?</h6>
                        <h1 class="display-6 mb-4">Alanında Uzman Eğitmenlerden Ders Alarak Sürüş Hayatına Başla</h1>
                        <p class="mb-5"><b>Yenişehir'de</b> Altınbaşak Sürücü Kursu olarak <script type="text/javascript">
                            document.write("<strong>" + (new Date().getFullYear()-2015).toString() + "</strong>");
                        </script>
                            yıllık tecrübemizle eğitim
                            vermekteyiz. <b>Bizi bize değil bizi müşterimize sorun.</b>
                        </p>
                        <div class="row gy-5 gx-4">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary me-3">
                                        <i class="fa fa-check text-white"></i>
                                    </div>
                                    <h5 class="mb-0">Teorik Dersler</h5>
                                </div>
                                <span>Verilecek teorik dersler ile kendinizi geliştirin.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary me-3">
                                        <i class="fa fa-check text-white"></i>
                                    </div>
                                    <h5 class="mb-0">Dökümanlar</h5>
                                </div>
                                <span>Dökümanları ücretsiz indirerek yazılı sınava hazırlan.
                                </span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary me-3">
                                        <i class="fa fa-check text-white"></i>
                                    </div>
                                    <h5 class="mb-0">Simülasyonla Eğitim</h5>
                                </div>
                                <span>Gerçek araç donanımına sahip simülasyonlarla eğitime başla, gerçek araç sürüşüne
                                    hazırlan.</span>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square bg-primary me-3">
                                        <i class="fa fa-check text-white"></i>
                                    </div>
                                    <h5 class="mb-0">Uzman Eğitmenler</h5>
                                </div>
                                <span>Kurum bünyesinde bulunan uzman eğitmenlerden kurs alarak sürüş hayatına
                                    başla.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="position-relative overflow-hidden pe-5 pt-5 h-100" style="min-height: 400px;">
                            <img class="position-absolute w-100 h-100" src="img/coursePhoto/tabela3.jpg" alt=""
                                style="object-fit: cover;">
                            <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3"
                                src="img/coursePhoto/isretler.jpg" alt="" style="width: 200px; height: 200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->


        <!-- Team Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h3 class="text-primary text-uppercase mb-2">DENEYİMLİ EĞİTMENLERİMİZ <br> </h3>
                    <h5 class="display-6 mb-4"><script type="text/javascript">
                        document.write("<strong>" + (new Date().getFullYear()-2015).toString() + "</strong>");
                    </script> YILLIK TECRÜBEMİZLE</h5>
                    <h5>KALİTELİ VE GÜVENLİ EĞİTİM ALMANIZ İÇİN BURADAYIZ</h5>
                </div>
            </div>
        </div>
        </div>
        <!-- Team End -->


        <!-- Testimonial Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase border-bottom mb-2">HİZMETLERİMİZ</h6>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="testimonial-item text-center border border-dark">
                            <div class="position-relative mb-5">
                                <i class="fa fa-1x" aria-hidden="true"></i>
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-motorcycle fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="small">A SINIFI SÜRÜCÜ BELGESİ</h3>
                            <p class="fs-6">Yaş şartı : 18 yaşınızı doldurmuş olmanız gerekmektedir.<br>
                                Geçerlilik süresi : 10 yılın ardından yenilenmesi gerekmektedir.</p>
                            <hr class="w-25 mx-auto">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="testimonial-item text-center border border-dark">
                            <div class="position-relative mb-5">
                                <i class="fa fa-1x" aria-hidden="true"></i>
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-car fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="small">B SINIFI SÜRÜCÜ BELGESİ</h3>
                            <p class="fs-6">Yaş şartı : 18 yaşınızı doldurmuş olmanız gerekmektedir.<br>
                                Geçerlilik süresi : 10 yılın ardından yenilenmesi gerekmektedir.</p>
                            <hr class="w-25 mx-auto">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="testimonial-item text-center border border-dark">
                            <div class="position-relative mb-5">
                                <i class="fa fa-1x" aria-hidden="true"></i>
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-car fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="small">B SINIFI OTOMATİK SÜRÜCÜ BELGESİ</h3>
                            <p class="fs-6">Yaş şartı : 18 yaşınızı doldurmuş olmanız gerekmektedir.<br>
                                Geçerlilik süresi : 10 yılın ardından yenilenmesi gerekmektedir.</p>
                            <hr class="w-25 mx-auto">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="testimonial-item text-center border border-dark ">
                            <div class="position-relative mb-5">
                                <i class="fa fa-1x" aria-hidden="true"></i>
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-car fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3 class="small">ÖZEL DİREKSİYON EĞİTİMİ</h3>
                            <p class="fs-6">İsterseniz OTOMATİK, İsterseniz MANUEL araçlarımızla güvenli direksiyon
                                eğitimi vermekteyiz.
                            </p>
                            <hr class="w-25 mx-auto">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Testimonial End -->
<?php
include("inc/footer.php")
?>