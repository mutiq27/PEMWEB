<html>
    <head>
        <title>Biodata Diri</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body class="background_">
        <?php
        $nama = "Mutiq Anisa Tanjung";
        
        $NPM = "21081010123";
        $jurusan ="Informatika";
        $asal= "Sidoarjo";
        $alamat= "Perumahan Bluru Permai HO-19 Sidoarjo";
        $jenisKelamin= "Perempuan";
        $instagram="@mutiqnisa_tanjung";
        $email ="mutiqnisatanjung@gmail.com";

        $dateOfBirth = "27-08-2003";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        

        //kelas css

        $hello = "hello";
        $mutiq = "mutiq";
        $student = "student";
        $bio="bio";
        $sub = "sub";


        ?>

        <div class="nav">
            <?php
            echo "<h1 class =".$bio.">Biodata</h1>";
            ?>
    
        </div>
        
        <div class="first">
            <div class="second">
                <?php
                echo "<h4 class=".$hello.">Hello, My Name is</h4>";
                echo"<h3 class=".$mutiq.">$nama</h3>";
                echo"<h6 class=".$student.">-- an Informatics Students --</h6>";
             ?>

            </div>
            
        </div>

        <div class="bg_brief"; style="top: 500px">
        
            <h3 style="margin-left: 15px; margin-top: 10px;"class="sub"> <?php echo"Brief Introduction";?></h3>
         <table>
            <tr>
                <td>
                    <img class="foto" src="KTM.jpg" alt="Foto" >
                </td>
                <td>
                <?php
                   echo "<p>
                    Saya Mahasiswa UPN Veteran Jawa Timur jurusan Informatika angkatan tahun 2021. Sesuai jurusan yang saya 
                    saya memiliki ketertarikan di bidang teknologi informasi atau pemrograman, tujuan yang ingin saya capai 
                    selepas kuliah saya harap dapat menjadi programmer yang memiliki kemampuan yang baik. 
                     </p>"; 
                     ?>
                </td>
            </tr>
         </table>
         

        </div>

       
  
        <div class="bg_brief"; style="top: 800px; height: 350px;"; >
            <b style="margin-left: 15px; margin-top: 10px;" class="sub"> <?php echo"Identity";?></b>
          
            <ul style="left: 100px">
            <?php
                echo"<li>Nama:      $nama</li>";
                echo"<li>NPM:       $NPM</li>";
                echo"<li>Jenis Kelamin: $jenisKelamin</li>";
                echo"<li>Tanggal Lahir: $dateOfBirth </li>";
                echo"<li>Umur:      " .$diff->format('%y'). "tahun </li>";
                echo"<li>Asal:      $asal</li>";
                echo"<li>Alamat:     $alamat</li>";
                echo"<li>Hobi:      Pada dasarnya saya tidak memiliki hobi yang spesifik, tetapi jika <br>
                ada waktu luang, sebagian besar saya habiskan untuk menonton film,darama, atau series yang lain. </li>";
                ?>
                </ul>
        </div>

        <div class="bg_brief"; style="top: 1200px;">
            <b style="margin-left: 15px; margin-top: 5px;" class="sub"><?php echo"Skill";?></b>
            <tr>
                <td>
                    <b class="capt"><?php echo"Bisa bekerja <br> dalam kelompok</b>";?>
                    <div class="circle"; style="background-color: #5B8FB9; left: 50px;">
                        <img src="teamwork.png" alt="teamwork" style="height: 85px; margin-top: 33px;">
                    </div>
                    
                </td>
                <td>
                    <b style="left: 210px;"class="capt"><?php echo" Mau Belajar";?></b>
                    <div class="circle"; style="background-color: #B6EADA; left: 250px;">
                        <img src="reading-book.png" alt="teamwork" style="height: 85px; margin-top: 33px;">
                    </div>
                    
                </td>
                <td>
                    <b style="left: 400px;"class="capt"><?php echo"Merancang<br>program"?></b>
                    <div class="circle"; style="background-color: #5B8FB9; left: 445px;">
                        <img src="data.png" alt="teamwork" style="height: 85px; margin-top: 33px;">
                    </div>
                    
                </td>
                <td>
                    <b style="left: 600px;"class="capt"><?php echo"Analisis";?> </b>
                    <div class="circle"; style="background-color: #B6EADA; left: 640px;">
                        <img src="study-removebg-preview.png" alt="teamwork" style="height: 85px; margin-top: 33px;">
                    </div>
                    
                </td>

            </tr>

        </div>

        <div class="bg_brief"; style="top: 1500px;">
            <b style="margin-left: 15px; margin-top: 10px;" class="sub"><?php echo" Contact: ";?></b>
            <table  cellpadding = "80"; >
                <tr>
                    <td>
                        <h4 style="margin-left: -70px" class="capt"> <?php echo" Instagram ($instagram)";?></h4>
                        <a href="https://www.instagram.com/mutiqnisa_tanjung/" target="_blank"> <br>
                            <img style="text-align:center; margin-bottom: 50px; height: 100px;" src="instagram.png" alt="instagram"  title="Menuju instagram">
                        </a>
                    </td>
                    <td>
                        <b style="margin-left: -70px" class="capt"><?php echo "Email ($email)";?></b>
                        <a href="mailto: mutiqnisatanjung@gmail.com" target="_blank"> <br>
                            <img style=" text-align: center; margin-bottom: 50px; height: 100px;" src="gmail.png" alt="email"  title="Menuju email">
                        </a>
                    </td>
                </tr>

           </table>

        </div>
        

    </body>
</html>