<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  require ('Connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur= $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
     
      //query SQL
      $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver',jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";
        //execute the query
        $result = mysqli_query(connection(),$sql);

        if ($result) {
            $status = 'ok';
        } else {
            $status = 'err';
        }

      //redirect ke halaman lain
      header('Location: hal_utama.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Update Data trans_upn</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
    <h2>Update Data trans_upn</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input_trans_upn.php"; ?>">Tambah Data trans_upn</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          <form action="update_trans_upn.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>
            
            <div class="form-group">
              <label>ID Trans UPN</label>
              <input type="text" class="form-control" placeholder="ID Trans UPN" name="id_trans_upn"value="<?php echo $data['id_trans_upn'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="ID kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="ID BUS" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="ID Driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jumlah KM</label>
              <input type="text" class="form-control" placeholder="KM" name="jumlah_km" value="<?php echo $data['jumlah_km'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" placeholder="" name="tanggal" value="<?php echo $data['tanggal'];  ?>" required="required">
            </div>

            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
          <?php endwhile; ?>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
