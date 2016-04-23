<?php include 'login-header.php';
    if (isset($_POST["goruntule"])){
        $_SESSION["id"] = $_POST["id"];
    }
    include 'dbsettings.php';
    $result = mysqli_query($connection,
    "CALL ariza_guncelleme_kontrol('".$_SESSION["id"]."',@bilgi)") or die("Query fail: " . mysqli_error());
    $row = mysqli_fetch_array($result);
    $onay = $row[@bilgi];
 ?>
 <?php 
    echo '<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Arıza Kayıt Detayları</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Durum</th>
                            <th>Telefon Marka</th>
                            <th>Telefon Model</th>
                            <th>Detay</th>
                            <th>Ücret</th>
                            <th>Verilme Tarihi</th>
                            <th>İşlem Geçmişi</th>
                            <th>Kaydı Güncelle</th>
                            <!--<th>Kaydı Sil</th>-->
                        </tr>
                        </thead>
                        <tbody>';
                        include 'dbsettings.php';
                        $result = mysqli_query($connection,
                        "CALL ariza_detay_goster('".$_SESSION["id"]."')") or die("Query fail: " . mysqli_error());
                        while($row = mysqli_fetch_array($result)) {
                            echo '
                            
                            <tr>
                                <td>'.$row[0].'</td>
                                <td>'.$row[1].'</td>
                                <td>'.$row[2].'</td>
                                <td>'.$row[3].'</td>
                                <td><i class="fa fa-try"></i> '.$row[4].'</td>
                                <td>'.$row[5].'</td>
                                <td><a href="admin-order-detail.php" class="btn btn-primary"><i class="fa fa-eye"></i> Görüntüle</a></td>';
                                if ($onay == "guncellenemez"){
                                    $class = "disabled";
                                }
                                else{
                                    $class = "";
                                }
                                echo '
                                <td><a href="admin-order-update.php" class="btn btn-success '.$class.'"><i class="fa fa-refresh"></i> Güncelle</a></td>
                                <!--<td><a href="#" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i> Sil</a></td>-->
                            </tr>
                            ';
                        }   
                        echo '
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="admin-dashboard.php" class="btn btn-primary"><i class="fa fa-step-backward"></i> Geri Dön</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Dikkat!</h3>
            </div>
            <div class="modal-body">
                <p>Kaydı <b>silmek</b> istediğinize emin misiniz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete-confirm" href="#">Evet</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hayır</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>';
 ?>
