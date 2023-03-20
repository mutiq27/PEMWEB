<?php 

  include ('Connection.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customer_Number = $_GET['customerNumber'];
          $query = "DELETE FROM customers WHERE customerNumber = '$customer_Number'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: Show_CustomerProducts.php?status='.$status);
      }  
  }