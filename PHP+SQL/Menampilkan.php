<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('Connection.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Business Table</title>
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
                <a class="nav-link active" href="<?php echo "Menampilkan.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Data</a>
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
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal di-update</div>';
              }

            }
           ?>


          <h2 style="margin: 30px 0 30px 0;">Employee</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm" border "1">
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

                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM employees";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
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
                      
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
                      
          <h2 style="margin: 30px 0 30px 0;">Product Lines</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm" border "1">
              <thead>
                <tr>
                  <th>productLine</th>
                  <th>textDescription</th>
                  <th>htmlDescription</th>
                  <th>image</th>
                  
                  <br>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM productlines";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['productLine'];  ?></td>
                    <td><?php echo $data['textDescription'];  ?></td>
                    <td><?php echo $data['htmlDescription'];  ?></td>
                    <td><?php echo $data['image'];  ?></td>
                    <td>
                      
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