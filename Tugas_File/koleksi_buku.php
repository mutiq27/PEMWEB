<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Form Buku</h3>
<form action="simpan_buku.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="kode_buku">kode_buku</label>
                    <input type="text" id="kode_buku" name="kode_buku" class="form-control">
        </div>
                <div>
            <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control">
                </div>
                <div>
                    <label for="pengarang">pengarang</label>
                    <input type="text" class="form-control"id="pengarang" name="pengarang">
                </div>
                <div>
                    <label for="penerbit">penerbit</label>
                    <input type="text" class="form-control"id="penerbit" name="penerbit">
                </div>
                <div>
                    <label for="tahun">tahun</label>
                    <input type="number" class="form-control"id="tahun" name="tahun">
                </div>
                <div>
                    <label for="cover">cover</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>
                <div>
                    <button type="sumbit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
</body>
</html>
