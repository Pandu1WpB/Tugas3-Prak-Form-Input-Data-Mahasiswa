<?php
$koneksi=mysqli_connect("localhost","root","","latihan");
if (isset($_POST['simpan'])){
    $nim=mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama=mysqli_real_escape_string($koneksi, $_POST['nama']);
    $angkatan=mysqli_real_escape_string($koneksi, $_POST['angkatan']);
    $jurusan=mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $simpan=mysqli_query($koneksi,"INSERT INTO data_mhs VALUES('$nim','$nama','$angkatan','$jurusan')");
    if ($simpan) {
        echo "<script>window.alert('Data Mahasiswa berhasil disimpan')window.location='index.php'</script>";
    }else{
        echo "<script>window.alert('Data Mahasiswa Gagal disimpan')windiow.location='index.php'</script>";
    }


}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan</title>
</head>
<body>
    <center>
        <h4>Form Input Data Mahasiswa</h4>
        <Form action="" method="post">
            <table>
                <tr>
                    <td>
                        Nim
                    </td>
                    <td>
                        <input type="text" placeholder="Nim"
                        name="nim" required>
                    </td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>
                    <input type="text" placeholder="Nama"
                        name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Angkatan</td>
                    <td>
                    <input type="number" placeholder="Angkatan"
                        maxlength="4" name="angkatan" required>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan/Prodi</td>
                    <td>
                    <input type="text" name="jurusan"
                        placeholder="Jurusan/Prodi" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="simpan" value="Simpan Data">
                    </td>
                </tr>
            </table>
        </Form>
        <br>
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <td>No.</td>
                <td>Nim</td>
                <td>Nama</td>
                <td>Angkatan</td>
                <td>Jurusan/Prodi</td>
            </tr>
            <?php
            $no=1;
            $data_mhs=mysqli_query($koneksi,"SELECT * FROM data_mhs ORDER BY nama ASC");
            while ($tampil_mhs=mysqli_fetch_array($data_mhs)) {
                ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $tampil_mhs['nim']; ?></td>
                    <td><?= $tampil_mhs['nama']; ?></td>
                    <td><?= $tampil_mhs['angkatan']; ?></td>
                    <td><?= $tampil_mhs['jurusan']; ?></td>
                </tr>
            <?php } ?>
        </table>

    </center>
</body>
</html>
