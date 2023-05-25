<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['kode_buku']) ) {
            $file_name = "perpus.txt";
            $read = file($file_name); 
            $kode_buku = $_GET['kode_buku'];

            foreach ($read as $data){
                $data_file = explode(",", $data);
                if(($data_file[0]==$kode_buku)){
                    ?>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="kode_buku">kode_buku</label>
                            <input type="text" id="kode_buku" name="kode_buku" class="form-control" value="<?php echo $data_file[0];  ?>">
                        </div>
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $data_file[1];  ?>">
                        </div>
                        <div>
                            <label for="pengarang">pengarang</label>
                            <input type="text" class="form-control"id="pengarang" name="pengarang" value="<?php echo $data_file[2];  ?>">
                        </div>
                        <div>
                            <label for="penerbit">penerbit</label>
                            <input type="text" class="form-control"id="penerbit" name="penerbit" value="<?php echo $data_file[3];  ?>">
                        </div>
                        <div>
                            <label for="tahun">tahun</label>
                            <input type="number" class="form-control"id="tahun" name="tahun" value="<?php echo $data_file[4];  ?>">
                        </div>
                        <div>
                            <label for="cover">Cover</label>
                            <input type="file" name="cover" id="cover" class="form-control" value="<?php echo $data_file[5];  ?>">
                        </div>
                        <div>
                            <label for="cover-preview">Preview Cover</label>
                            <?php
                                echo "<img src='upload/$data_file[5]' width='100' height='100'>";
                            ?>
                        </div>
                        <div>
                            <button type="sumbit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                
                    <?php
                
                }

                
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $file_name = "perpus.txt";
        $kode_buku = $_POST['kode_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $cover = $_FILES['cover']['name'];
        $insert = $kode_buku . "," . "$judul" . "," . "$pengarang" . "," . "$penerbit" . "," . "$tahun" . "," . "$cover" . "\n";

        $read = file($file_name);
        $info = [];
    
        foreach ($read as $data) {
            $data_file = explode(",", $data);
            if ($data_file[0] == $kode_buku) {
                $info[] = $insert;
            }
             else {
                $info[] = $data;
            }
        }
    
        $sementara = fopen("sementara.txt", "w");
        fwrite($sementara, implode("", $info));
        fclose($sementara);

           $fileA = 'perpus.txt';
            $fileB = 'sementara.txt';

            // Baca isi file B
            $contentsB = file_get_contents($fileB);

            // Tulis ulang isi file A dengan isi file B
            file_put_contents($fileA, $contentsB);

            file_put_contents($fileB, '');


            
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
        ?>
        <ul>
            <li><a href="tampilkan.php">Lihat Data</a></li>
            <li><a href="koleksi_buku.php">Tambah Data Buku</a></li>

        </ul>
        <?php

    }

?>