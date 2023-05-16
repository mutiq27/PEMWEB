<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connect_PDO.php'); 

  $status = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['employeeNumber'])) {
          //query SQL
          $employeeNumber_upd = $_GET['employeeNumber'];
          $query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = :employeeNumber");
          //binding data
          $query->bindParam(':employeeNumber',$employeeNumber_upd);
          //eksekusi query
          $query->execute(); 
      }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $employeeNumber = $_POST['employeeNumber'];
      $lastName = $_POST['lastName'];
      $firstName = $_POST['firstName'];
      $extension = $_POST['extension'];
      //query SQL
      $query = $conn->prepare("UPDATE employees SET lastName=:lastName, firstName=:firstName, extension=:extension WHERE employeeNumber=:employeeNumber"); 

      //binding data
      $query->bindParam(':employeeNumber',$employeeNumber);
      $query->bindParam(':lastName',$lastName);
      $query->bindParam(':firstName',$firstName);
      $query->bindParam(':extension',$extension);

      //eksekusi query
      if ($query->execute()) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: indexEmployee.php?status='.$status);
  }
  

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
         <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="updateEmployee.php" method="POST">
            <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="form-group">
              <label>employeeNumber</label>
              <input type="text" class="form-control" placeholder="employeeNumber mahasiswa" name="employeeNumber" value="<?php echo $data['employeeNumber'];  ?>" readonly required="required">
            </div>
            <div class="form-group">
              <label>lastName</label>
              <input type="text" class="form-control" placeholder="lastName mahasiswa" name="lastName" value="<?php echo $data['lastName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <<input type="text" class="form-control" placeholder="firstName mahasiswa" name="firstName" value="<?php echo $data['firstName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>extension</label>
              <textarea class="form-control" name="extension" required="required"><?php echo $data['extension'];  ?></textarea>
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>