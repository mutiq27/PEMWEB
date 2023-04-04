<?php 
  //memanggil file conn.php yang berisi koneksi ke database
  include ('Connection.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = isset($_POST['id_driver']) ? $_POST['id_driver'] : '';
    $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';
           
    //query SQL
    $sql = "SELECT * FROM trans_upn WHERE MONTH(tanggal) = '$bulan' and id_driver='$id_driver'";
    $query = "SELECT sum(jumlah_km*3000) as jumlah from trans_upn where MONTH(tanggal) = '$bulan' and id_driver = '$id_driver'";
    $query2 = "SELECT sum(jumlah_km) as jumlah from trans_upn where MONTH(tanggal) = '$bulan' and id_driver = '$id_driver'";
      //execute the query
      $result = mysqli_query(connection(),$sql);
      $hasil = mysqli_query(connection(),$query);
      $hasil2 = mysqli_query(connection(),$query2);

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
    <title>Halaman driver</title>
    <!-- load css boostrap -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->
  </head>

  <body>
  <h2 style="margin:50px;">Gaji Driver</h2>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "pendapatan_driver_.php"; ?>">Gaji</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "hal_utama.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "input_driver.php"; ?>">Tambah Data Driver</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
            <?php
              if  ($status=='ok'):?> 
                
                <table style="text-align: center;" border "1">
                <thead>
                  <tr>
                    <th>ID driver</th>
                    <th>ID Kondektur</th>
                    <th>ID Bus</th>
                    <th>Jumlah KM</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                
                <tbody border "1">
                <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                  </tr>
                  <?php endwhile ?>
                  <?php $jumlah2 = mysqli_fetch_assoc($hasil2);?>
                  <tr>
                    </td> <td colspan = "2" > <b>Jumlah Perjalanan:</b>  </td>
                    <td colspan="3"><b><?php echo$jumlah2 = $jumlah2['jumlah'];?> km<b></td>
                  </tr>
                   <?php $jumlah = mysqli_fetch_assoc($hasil);?>
                  <tr>
                    <td colspan = "2" > <b>Jumlah Gaji:</b>  </td>
                    <td colspan="3"><b>Rp <?php echo$jumlah = $jumlah['jumlah'];?><b></td>
                  </tr>
              </tbody>
            </table>


           
          <?php endif ?>

          
        <form action="pendapatan_driver_.php" method="POST">
          <label for="id_driver">ID driver:</label>
          <input type="text" name="id_driver">

          <label for="bulan">Bulan:</label>
          <input type="number" name="bulan">

          <input type="submit" value="Submit">
        </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
