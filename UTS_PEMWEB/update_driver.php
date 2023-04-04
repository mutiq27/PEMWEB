<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  require ('Connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $id_driver = $_GET['id_driver'];
          $query = "SELECT * FROM driver WHERE id_driver = '$id_driver'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
     
      //query SQL
      $sql = "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'";
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
    <title>Update Data driver</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
    <h2>Update Data driver</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input_driver.php"; ?>">Tambah Data driver</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          <form action="update_driver.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>
            
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="ID driver" name="id_driver"value="<?php echo $data['id_driver'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Nama Driver</label>
              <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>No SIM</label>
              <input type="text" class="form-control" placeholder="SIM" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
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
