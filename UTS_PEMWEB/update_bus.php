<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  require ('Connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status_ = $_POST['status'];
     
      //query SQL
      $sql = "UPDATE bus SET plat='$plat', status='$status_' WHERE id_bus='$id_bus'";
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
    <title>Update Data Bus</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
    <h2>Update Data Bus</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input_bus.php"; ?>">Tambah Data Bus</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <form action="update_bus.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>
            
            <div class="form-group">
              <label>ID BUS</label>
              <input type="text" class="form-control" placeholder="ID BUS" name="id_bus"value="<?php echo $data['id_bus'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Plat BUS</label>
              <input type="text" class="form-control" placeholder="Plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="number" class="form-control" placeholder="0/1/2" name="status" value="<?php echo $data['status'];  ?>" required="required">
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
