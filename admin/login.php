<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Giriş -  Admin</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Giriş</h3></div>
                                    <div class="card-body">
                                        <?php
                                        session_start();
                                        include("../inc/db.php");
                                      if(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="6789" ){
                                            header("location:index.php");
                                      }

                                        if($_POST){
                                            $name=$_POST["txtUserName"];
                                            $pass = $_POST["txtUserPass"];
                                            //echo md5("12345g12345");
                                            
                                        }
                                           
                                        ?>
                                        <form method="post" action="login.php">
                                            <div class="form-group mb-2">
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                                <input class="form-control" id="inputEmail" name="txtUserName" type="text" placeholder="Kullanıcı Adı" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="inputPassword">Şifre</label>
                                                <input class="form-control" id="inputPassword" name="txtUserPass" type="password" placeholder="Şifre" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    
                                                <input type="submit" class="btn btn-primary" value="Giriş">
                                                <a href="sifreunuttum.php" class="btn btn-link">Şifremi Unuttum</a>
                                                <a href="sifreyenile.php" class="btn btn-link">Şifre yenile</a>
                                                
                                            </div>
                                        </form>
                                        <?php
                                        
                                      
                                        if($_POST){
                                            $sorgu = $baglanti->prepare("select * from admin where userName=:userName");
                                            $sorgu->execute(['userName'=>htmlspecialchars($name)]);
                                            $sonuc = $sorgu->fetch();
                                            
                                           if ($sonuc!=null){
                                            if((md5($pass)==$sonuc['userPass'])){
                                                $_SESSION["Oturum"] = 6789;
                                                $_SESSION["usernaname"] = $username;
                                                $_SESSION["role"] = $sonuc["role"];
                                                header("location:index.php");
                                            }
                                            else{
                                                echo "Kullanıcı Adı veya Şifre Hatalı";
                                            }
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
