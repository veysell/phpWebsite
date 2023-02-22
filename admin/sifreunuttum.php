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
                                        <h3 class="text-center font-weight-light my-4">Şifremi Unuttum</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        session_start();
                                        include("../inc/db.php");
                                        if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
                                            header("location:index.php");
                                        }

                                        if ($_POST) {
                                            $mailAdress = $_POST["mailadres"];
                                        }

                                        ?>
                                        <form method="post" action="sifreunuttum.php">
                                            <div class="form-group mb-2">
                                                <label for="inputEmail">E-Posta Adresiniz</label>
                                                <input class="form-control" id="inputEmail" name="mailadres"
                                                    type="email" placeholder="E-Mail" />
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                <input type="submit" class="btn btn-primary" value="Yeni Şifre Gönder">
                                                <a href="login.php">Giriş Yap</a>
                                            </div>
                                        </form>
                                        <?php
                                        include('phpmail/class.smtp.php');
                                        include('phpmail/class.phpmailer.php');

                                        if ($_POST) {
                                            $mail = new PHPMailer();
                                            $mail->IsSMTP();
                                            $mail->SMTPAuth = true;
                                            $mail->Host = 'smtp.sitem.com'; //SMTP server adresi  
                                            $mail->SMTPSecure = 'tls'; //yada SSL
                                            $mail->Port = 587; //SSL kullanacaksanız portu 465 olarak değiştiriniz
                                            $mail->Username = 'benim@mailadresim.com'; //SMTP kullanıcı adı  
                                            $mail->Password = 'mail şifresi'; //SMTP şifre  
                                            $mail->SetFrom($mail->Username, 'Benim Adım');

                                            $sorgu = $baglanti->prepare("select * from admin where email=:mail");
                                            $sorgu->execute(['mail' => $mailAdress]);
                                            $sonuc = $sorgu->fetch();

                                            if($sonuc != null){
                                                $mail->AddAddress($mailAdress, 'Altınbasak Yönetim');
                                                $mail->CharSet = 'UTF-8';
                                                $mail->Subject = 'ADMİN SAYFASI ŞİFRE YENİLEME';
                                                $pass = rand(1234567, 9999999);
                                                $pass1 = md5($pass);
                                                $mesaj = 'Şifre yenileme talebinde bulundunuz. Şifrenizi kimseyle paylaşmayın. Yeni şifreniz: '.$pass;

                                                $mail->MsgHTML($mesaj);
                                                if ($mail->Send()) {
                                                    echo 'Şifre gönderildi! Lütfen mail kutunuzu kontrol ediniz.\r\n';
                                                    $updatePass = $baglanti->prepare("update admin set userPass=:pass where email=:mail");
                                                    $updatePass->execute(['pass' => "$pass1", 'mail' => $mailAdress]);
                                                    if($updatePass){
                                                        echo 'Gönderilen şifre ile giriş yapabilirsiniz.';
                                                    }
                                                    else{
                                                        echo 'Güvenlik nedeniyle gönderilen şifre kullanılamaz. Lütfen teknik ekip ile iletişime geçin.';
                                                    }
                                                } else {
                                                    echo 'Şifre gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
                                                }
                                            }
                                            else{
                                                echo 'Şifre gönderilirken bir hata oluştu: Sistemde kayıtlı olan mail adresinizi girin. ';
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
    </body>

</html>