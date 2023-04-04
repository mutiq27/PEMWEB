<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connection.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_trans_upn = $_POST['id_trans_upn'];
      $id_kondektur= $_POST['id_kondektur'];
      $id_bus = $_POST['id_bus'];
      $id_driver = $_POST['id_driver'];
      $jumlah_km = $_POST['jumlah_km'];
      $tanggal = $_POST['tanggal'];


      //query SQL
      $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal)
       VALUES('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Input Data Perjalanan</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
  <h2 style="margin:50px;">Form Input Data Perjalanan Trans UPN</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_trans_upn.php"; ?>">Tambah Data Perjalanan Trans UPN</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data trans_upn berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data trans_upn gagal disimpan</div>';
              }
           ?>

          
          <form action="input_trans_upn.php" method="POST">
            
            <div class="form-group">
              <label>ID Trans UPN</label>
              <input type="text" class="form-control" placeholder="ID trans upn" name="id_trans_upn" required="required">
            </div>
            <div class="form-group">
              <label>id_kondektur </label>
              <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required">
            </div>
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="ID BUS" name="id_bus" required="required">
            </div>
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="ID Driver" name="id_driver" required="required">
            </div>
            <div class="form-group">
              <label>Jumlah KM</label>
              <input type="text" class="form-control" placeholder="KM" name="jumlah_km" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="" name="tanggal" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>