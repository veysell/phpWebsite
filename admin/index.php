<?php
include("inc/ahead.php");
?>
       
                <main>
                    <div class="container-fluid px-4">
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <div class="row">
                                    <div class="col-sm"><h5>Duyurular</h5></div>
                                    <div class="col-sm"><a href="duyuruEkle.php" class="btn btn-primary">Yeni Duyuru Ekle</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Duyuru Başlığı</th>
                                            <th>Duyuru Metni</th>
                                            <th>Duyuru Tarihi(yyyy-aa-gg)</th>
                                            <th>Aktiflik</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>
                                       
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $sorgu = $baglanti->prepare("SELECT * FROM duyurular");
                                        $sorgu->execute();
                                while ($sonuc = $sorgu->fetch()) {
                                             ?>
                                        <tr>                                           
                                            <td><?=$sonuc["duyuruBaslik"]?></td>
                                            <td><?=$sonuc["duyuruMetin"]?></td>
                                            <td><?=$sonuc["duyuruTarih"]?></td>
                                            <td><span class="fa fa-2x fa-<?=$sonuc["active"]==1 ?"check text-success":"times text-danger"?>"></span></td>
                                            <td><a  href="duyuruDuzenle.php?id=<?=$sonuc["id"]?>">
                                        <span class="fa fa-edit fa-2x" ></span></a></td>
                                        <td><a class="btns" id="<?=$sonuc["id"]?>" onclick='
                                                         var id= "<?=$sonuc["id"]?>"
                                         //console.log(id);
                                         var url="sil.php?id="+id+"&tablo=duyurular"
                                         //console.log(url);
                                         var e=confirm("Silmek istediğine emin misin?");
                                         if(e){
                                            window.location.href=url;
                                            
                                         }' href="">
                                                         <span class="fa fa-trash fa-2x" ></span></a></td>
                                        
                                        </tr>
                                       
                                        <?php
                                }
                                ?>
                                    </tbody>


                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <script  type="text/javascript" src="css/jquery-1.8.3.min.js"></script>
                <script  type="text/javascript" src="css/sweetalert2.all.min.js"></script>
                

<?php
include("inc/afooter.php");
?>