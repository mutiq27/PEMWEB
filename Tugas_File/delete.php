<?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['kode_buku'])) {
        $file_name = "perpus.txt";
        $kode_buku = $_GET['kode_buku'];

        $read = file($file_name);
        $info = [];
    
        foreach ($read as $data) {
            $data_file = explode(",", $data);
            if ($data_file[0] == $kode_buku) {
                continue;
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


        //redirect ke halaman lain
        header('Location: tampilkan.php');
    }  
}
?>