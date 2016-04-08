<?php include 'login-header.php';
        $sayac=0; 
        include 'dbsettings.php';
        $result = mysqli_query($connection, 
        "CALL butun_ariza_kayitlarini_goster()") or die("Query fail: " . mysqli_error());
        while($row = mysqli_fetch_array($result)) {
            $sayac++;
        }
        echo '<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    Admin Paneli <small>Genel Bakış</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Hoşgeldiniz!</strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-edit fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right count">
                                        <div class="huge">'.$sayac.'</div>
                                        <div>Arıza Kayıtları</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin-all-orders.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Tümünü Gör</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right count">
                                        <div class="huge">5</div>
                                        <div>Destek Talepleri</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin-all-tickets.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Tümünü Gör</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-edit fa-fw"></i> Arıza Kayıtları</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Arıza No #</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Telefon Marka</th>
                                        <th>Telefon Model</th>
                                        <th>Kayıt Durumu</th>
                                        <th>Kayıt Detayları</th>
                                    </tr>
                                </thead>
                                <tbody>';           
                                            include 'dbsettings.php';
                                            $result = mysqli_query($connection, 
                                            "CALL butun_ariza_kayitlarini_goster()") or die("Query fail: " . mysqli_error());
                                                
                                            while($row = mysqli_fetch_array($result)) {                                            

                                            echo '<tr>
                                                    
                                                    <td name="ariza_no" id="ariza_no" class="col-xs-2">'.$row[0].'</td>
                                                    <td class="col-xs-2">'.$row[1].'</td>
                                                    <td class="col-xs-2">'.$row[2].'</td>
                                                    <td class="col-xs-2">'.$row[3].'</td>
                                                    <td class="col-xs-2">'.$row[4].'</td>
                                                    <td class="col-xs-2"><input type="submit" class="btn btn-primary" value="Görüntüle" onclick=""></td>
                                                </tr>';
                                                    }                                               
                                echo '</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>';
?>