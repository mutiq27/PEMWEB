<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connect_PDO.php');

  $status = '';
  // Melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['employeeNumber'])) {
      // Query SQL
      $employeeNumber_upd = $_GET['employeeNumber'];
      $query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = :employeeNumber");

      // Binding data
      $query->bindParam(':employeeNumber', $employeeNumber_upd);
      // Eksekusi query
      $query->execute();
  }
}

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeNumber = $_POST["employeeNumber"];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officeCode = $_POST['officeCode'];
    $reportsTo = $_POST['reportsTo'];
    $jobTitle = $_POST['jobTitle'];
     
      //query SQL
      $query = $conn->prepare("UPDATE employees SET lastName= :lastName, firstName= :firstName, extension= :extension, email= :email, officeCode= :officeCode, reportsTo= :reportsTo, jobTitle=:jobTitle
       WHERE employeeNumber=:employeeNumber");

        $query->bindParam(':employeeNumber',$employeeNumber);
        $query->bindParam(':lastName',$lastName);
        $query->bindParam(':firstName',$firstName); 
        $query->bindParam(':extension',$extension);
        $query->bindParam(':email',$email);
        $query->bindParam(':officeCode',$officeCode);
        $query->bindParam(':reportsTo',$reportsTo);
        $query->bindParam(':jobTitle',$jobTitle);
        
        if ($query->execute()) {
            $status = 'ok';
        } else {
            $status = 'err';
        }

      //redirect ke halaman lain
      header('Location: indexEmployee.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Business</title>
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
                <a class="nav-link active" href="<?php echo "indexEmployee.php"; ?>">Data Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "inputEmployee.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Employee</h2>
          <form action="updateEmployee.php" method="POST">
           <?php while($data = $query->fetch(PDO::FETCH_ASSOC)): ?>
            
            <div class="form-group">
              <label>Employee Number</label>
              <input type="text" class="form-control" placeholder="employeeNumber" name="employeeNumber"value="<?php echo $data['employeeNumber'];?>" required="required">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="lastName" name="lastName" value="<?php echo $data['lastName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" placeholder="firstName" name="firstName" value="<?php echo $data['firstName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Extension</label>
              <input type="text" class="form-control" placeholder="extension" name="extension" value="<?php echo $data['extension'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $data['email'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Office Code</label>
              <input type="text" class="form-control" placeholder="officeCode" name="officeCode" value="<?php echo $data['officeCode'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Reports To</label>
              <input type="text" class="form-control" placeholder="reportsTo" name="reportsTo" value="<?php echo $data['reportsTo'];  ?> "required="required">
            </div>
            <div class="form-group">
              <label>job Title</label>
              <input type="text" class="form-control" placeholder="jobTitle" name="jobTitle" value="<?php echo $data['jobTitle'];  ?>" required="required">
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
