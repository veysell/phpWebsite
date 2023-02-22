<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Giriş - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Şifre Yenileme</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        session_start();
                                        include("../inc/db.php");
                                        if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
                                            header("location:index.php");
                                        }

                                        if ($_POST) {
                                            $name = $_POST["txtUserName"];
                                            $pass = $_POST["txtUserOldPass"];
                                            $passnew = $_POST["txtUserNewPass"];
                                            $passnew2 = $_POST["txtUserNewPass2"];


                                        }

                                        ?>
                                        <form method="post" action="sifreyenile.php">
                                            <div class="form-group mb-2">
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                                <input class="form-control" id="inputEmail" name="txtUserName"
                                                    type="text" required placeholder="Kullanıcı Adı" />
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="inputOldPassword">Mevcut Şifre</label>
                                                <input class="form-control" id="myInput" name="txtUserOldPass" required
                                                    type="password" placeholder="Mevcut Şifre" />
                                                <input type="checkbox" class="form-check-input" onclick="myFunction()"><span class="p-1 small">Şifre Göster</span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="inputNewPassword">Yeni Şifre</label>
                                                <input class="form-control" id="myInput1" name="txtUserNewPass" required
                                                    type="password" placeholder="Yeni Şifre" />
                                                <input type="checkbox" class="form-check-input" onclick="myFunction1()"><span class="p-1 small">Şifre Göster</span>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="inputNewPassword2">Yeni Şifre Tekrar</label>
                                                <input class="form-control" id="myInput2" name="txtUserNewPass2"
                                                    required type="password" placeholder="Yeni Şifre Tekrar" />
                                                <input type="checkbox" class="form-check-input" onclick="myFunction2()"><span class="p-1 small">Şifre Göster</span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                <input type="submit" class="btn btn-primary" value="Güncelle">
                                                <a href="login.php" class="btn btn-link">Giriş Yap</a>

                                            </div>
                                        </form>
                                        <?php

                                        // header("location:login.php");
                                        if ($_POST) {
                                            $sorgu = $baglanti->prepare("select * from admin where userName=:userName");
                                            $sorgu->execute(['userName' => htmlspecialchars($name)]);
                                            $sonuc = $sorgu->fetch();

                                            if ($sonuc != null) {
                                                if ((md5($pass) == $sonuc['userPass'])) {

                                                    if ($passnew == $passnew2) {
                                                        $updatesifre = $baglanti->prepare("update admin set userPass=:passnew where userName=:userName and userPass=:passold");
                                                        $updatesifre->execute([
                                                            'userName' => htmlspecialchars($name),
                                                            'passold' => md5($pass),
                                                            'passnew' => md5($passnew)
                                                        ]);
                                                        if ($updatesifre) {
                                                            echo "İşlem başarılı. Giriş yapabilirsiniz.";
                                                        } else {
                                                            echo "İşlem başarısız. Lütfen tekrar deneyiniz.";
                                                        }
                                                    } else {
                                                        echo "Şifreler uyuşmuyor";
                                                    }
                                                } else {
                                                    echo "Kullanıcı Adı veya Şifre Hatalı";
                                                }
                                            } else {
                                                echo "Kullancı adı hatalı !";
                                            }

                                        }

                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function myFunction1() {
                var x = document.getElementById("myInput1");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function myFunction2() {
                var x = document.getElementById("myInput2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>

</html>