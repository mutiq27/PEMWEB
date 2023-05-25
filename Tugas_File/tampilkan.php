<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Katalog Perpustakan</h2>
    <ul>
        <li><a href="koleksi_buku.php">Tambah Data Buku</a></li>
    </ul>
    <h3>ISI FILE "perpus.txt"</h3>
        <?php
            $file_name = "perpus.txt";
        $read = file($file_name); 
         echo "<table border='1'>
         <tr>
             <td>Kode Buku</td>
             <td>Judul</td>
             <td>Pengarang</td>
             <td>Penerbit</td>
             <td>Tahun</td> 
             <td>Cover</td>
             <td>Action</td>
         </tr>";
     
     foreach ($read as $data) {
         $data_file = explode(",", $data); //arr
         echo "<tr>";
         echo "<td>$data_file[0]</td>";
         echo "<td>$data_file[1]</td>";
         echo "<td>$data_file[2]</td>";
         echo "<td>$data_file[3]</td>";
         echo "<td>$data_file[4]</td>";
         echo "<td><img src='upload/$data_file[5]' width='100' height='100'></td>";
         ?>
         <td>
                <a href="<?php echo "update.php?kode_buku=".$data_file[0]; ?>"> Update</a>
                     
                <a href="<?php echo "delete.php?kode_buku=".$data_file[0]; ?>"> Delete</a>
            </td>
        <?php
         echo "</tr>";
        }  
     echo "</table>";
    ?>
</body>
</html>