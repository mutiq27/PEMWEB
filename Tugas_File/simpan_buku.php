<?php
    $file_name = "perpus.txt";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$kode_buku = $_POST['kode_buku'];
        $read=file($file_name);
        foreach ($read as $data) {
            $data_file = explode(",", $data);
            if ($data_file[0] == $kode_buku) {
                $kode_buku = false;
                echo "Kode buku sudah terdaftar";
                break;
            }
        }
		$judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $cover = $_FILES ['cover']['name'];
        if ($kode_buku!=false){
            $insert = $kode_buku . "," . "$judul" . "," . "$pengarang" . "," . "$penerbit". "," . "$tahun" . ",". "$cover"."\n";

		    if (file_put_contents($file_name, $insert, FILE_APPEND) > 0){
			echo "<p> Book with code {$_POST['kode_buku']} has 
				been registered </p>";
                $targetDirectory = "upload/"; // Direktori tujuan penyimpanan file
                    $targetFile = $targetDirectory . basename($_FILES["cover"]["name"]);
                
                    // Memeriksa apakah file yang diunggah adalah file cover
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                    echo "File yang diunggah harus berupa file cover (JPG, JPEG, PNG).";
                    exit;
                    }
                
                    // Menyimpan file cover ke direktori tujuan
                    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile)) {
                    echo "File cover berhasil diunggah dan disimpan.";
                    } else {
                    echo "Terjadi kesalahan saat mengunggah file cover.";
                    }

            }else{
			echo "<p>Registration error!</p>";
        }
        }
		
    }else{
		echo "<p>Insert book information.</p>";
    }
    
    echo '<br><br><a href="koleksi_buku.php">Kembali ke Form</a>';
    echo '<br><br><a href="tampilkan.php">Lihat Data</a>';
 ?>
       

<!-- kode buku
2. judul
3. pengarang
4. penerbit
5. tahun
6. cover buku (upload file, yang disimpan kode_buku file, yang ditampilkan covernya)
 -->
