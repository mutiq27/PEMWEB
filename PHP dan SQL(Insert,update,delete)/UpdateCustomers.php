<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include('Connection.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
      //query SQL
      $sql = "UPDATE customers SET customerName='$customerName',contactLastName='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', 'state'='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit' WHERE customerNumber='$customerNumber'";

        //execute the query
        $result = mysqli_query(connection(),$sql);

        if ($result) {
            $status = 'ok';
        } else {
            $status = 'err';
        }

      //redirect ke halaman lain
      header('Location: Show_CustomerProducts.php?status='.$status);
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
                <a class="nav-link active" href="<?php echo "Show_CustomerProducts.php"; ?>">Data Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "input.php"; ?>">Tambah Data</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Customers</h2>
          <form action="UpdateCustomers.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>
            
            <div class="form-group">
              <label>CustomerNumber</label>
              <input type="text" class="form-control" placeholder="CustomerNumber" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>CustomerName</label>
              <input type="text" class="form-control" placeholder="CustomerName" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required" >
            </div>
            <div class="form-group">
              <label>ContactLastName</label>
              <input type="text" class="form-control" placeholder="ContactLastName" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required" >
            </div>
            <div class="form-group">
              <label>ContactFirstName</label>
              <input type="text" class="form-control" placeholder="ContactFirstName" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required" >
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>AddressLine1</label>
              <textarea class="form-control" name="addressLine1" required="required"> <?php echo $data['addressLine1'];  ?></textarea>
            </div>
            <div class="form-group">
              <label>AddressLine2</label>
              <textarea class="form-control" name="addressLine2" required="required" ><?php echo $data['addressLine2'];  ?></textarea>
            </div>

            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $data['city'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $data['state'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>PostalCode</label>
              <input type="text" class="form-control" placeholder="PostalCode" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Country</label>
              <input type="text" class="form-control" placeholder="Country" name="country"value="<?php echo $data['country'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>SalesRepEmployeeNumber</label>
              <input type="text" class="form-control" placeholder="salesRepEmployeeNumber"  name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>"required="required">
            </div>
            <div class="form-group">
              <label>Credit Limit</label>
              <input type="text" class="form-control" placeholder="CreditLimit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required">
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
