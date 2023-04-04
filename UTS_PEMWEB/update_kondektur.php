<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  require ('Connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $id_kondektur = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];

     
      //query SQL
      $sql = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'";
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
    <title>Update Data Kondektur</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
    <h2>Update Data Kondektur</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input_kondektur.php"; ?>">Tambah Data Kondektur</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          <form action="update_kondektur.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>
            
            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="ID" name="id_kondektur"value="<?php echo $data['id_kondektur'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Nama Kondektur</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
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
