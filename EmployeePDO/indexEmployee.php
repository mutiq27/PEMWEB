<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connect_PDO.php'); 
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
                <a class="nav-link active" href="<?php echo "indexEmployee.php"; ?>">Data Employee</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "inputEmployee.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Employee berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Employee gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Employee</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
              <tr>
                  <th>EmployeeNumber</th>
                  <th>lastNama</th>
                  <th>firstName</th>
                  <th>extension</th>
                  <th>email</th>
                  <th>officeCode</th>
                  <th>reportsTo</th>
                  <th>jobTitle</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
              <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM employees";
                  $result = $conn->query($query);
                 ?>
        

                 <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                    <tr>
                    <td><?php echo $data['employeeNumber'];  ?></td>
                    <td><?php echo $data['lastName'];  ?></td>
                    <td><?php echo $data['firstName'];  ?></td>
                    <td><?php echo $data['extension'];  ?></td>
                    <td><?php echo $data['email'];  ?></td>
                    <td><?php echo $data['officeCode'];  ?></td>
                    <td><?php echo $data['reportsTo'];  ?></td>
                    <td><?php echo $data['jobTitle'];  ?></td>
                    <td>
                      <a href="<?php echo "updateEmployee.php?employeeNumber=".$data['employeeNumber']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteEmployee.php?employeeNumber=".$data['employeeNumber']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
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