<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connection.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman Utama</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>
    <h2>Trans UPN</h2>
    <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data  berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di-update</div>';
              }

            }
           ?>


         <br>
    <h3 style="margin: 30px 0 30px 0;">BUS</h3>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:50px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input_bus.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         
          <div class="table-responsive">
            <table  border "1">
              <thead>
                <tr>
                  <th>ID BUS</th>
                  <th>Plat</th>
                  <th>Jumlah KM</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                    <th>EDIT</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM bus";
                  $sql = "SELECT bus.id_bus, SUM(trans_upn.jumlah_km) as jumlah
                  FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus
                  GROUP BY bus.id_bus;";
                  $result = mysqli_query(connection(),$query);
                  $hasil = mysqli_query(connection(),$sql);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result)): ?>
                    <?php $jarak=0;
                        while($jumlah = mysqli_fetch_array($hasil)) {
                        if($jumlah['id_bus']==$data['id_bus']){
                            $jarak = $jumlah['jumlah'];
                            break;
                        }
                    }?>
                 
                 <?php $color = ($data['status'] == 0) ? "merah" : (($data['status'] == 1) ? "hijau" : "kuning");?>
                 
                 <tr class="<?php echo $color?>">
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td><?php echo $jarak;?></td>
                    <td><?php echo $data['status'];  ?></td>
                    <?php $ket = ($data['status']== 0) ? "Perbaikan/Rusak" : (($data['status']== 1) ? "Beroperasi" : "Cadangan");?>
                    <td><?php echo $ket; ?></td>
                    <td >
                      <a href="<?php echo "update_bus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a  href="<?php echo "delete_bus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
          <h3 style="margin: 30px 0 30px 0;">Driver</h3>
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:50px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "Show_CustomerProducts.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_driver.php"; ?>">Tambah Data Driver</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "pendapatan_driver_.php"; ?>">PENDAPATAN</a>
              </li>
            </ul>
          </div>
        </nav>
          <div class="table-responsive">
            <table class="table table-striped table-sm" border "1">
              <thead>
                <tr>
                  <th>ID DRIVER</th>
                  <th>NAMA</th>
                  <th>NO SIM</th>
                  <th>ALAMAT</th>
                  <TH>EDIT DATA</TH>
                  
                  <br>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "update_driver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_driver.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
           </div>  
           
          
        </main>
      </div>
    </div>
    <h3 style="margin: 30px 0 30px 0;">Kondektur</h3>
          
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:50px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_kondektur.php"; ?>">Tambah Data Kondektur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "pendapatan_kondektur.php"; ?>">PENDAPATAN</a>
              </li>
              
            </ul>
          </div>
        </nav>
          <div class="table-responsive">
            <table class="table table-striped table-sm" border "1">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                  <th>EDIT DATA</th>
                  <br>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "update_kondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_kondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
           </div>  
           
          
        </main>
      </div>
    </div>
    <h3 style="margin: 30px 0 30px 0;">History Perjalanan</h3>
        
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:50px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_trans_upn.php"; ?>">Tambah Data Perjalanan</a>
              </li>
            </ul>
          </div>
        </nav>
          <div class="table-responsive">
            <table class="table table-striped table-sm" border "1">
              <thead>
                <tr>
                  <th>ID Perjalanan</th>
                  <th>ID Kondektur</th>
                  <th>ID Bus</th>
                  <th>ID Driver</th>
                  <th>Jumlah KM</th>
                  <th>Tanggal</th>
                  <th>EDIT</th>
                  <br>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM trans_upn";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "update_trans_upn.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_trans_upn.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
           </div>  
           
          
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>