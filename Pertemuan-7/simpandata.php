<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Biodata Mahasiswa</h2>
  <div class="row mb-2">
    <div class="col-sm-12">
      <span class="m-1">
        <a href="tambahdata.php" class="btn btn-info">Tambah data</a>
      </span>    
    </div> 
  </div>          
  <table id="example" class="table table-striped">
    <thead>
      <tr>
        <th><input type="checkbox" id="select_all"></th>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

    <?php
include "koneksi.php";

// Proses penghapusan data
if (isset($_GET['hapus_id'])) {
    $idToDelete = $_GET['hapus_id'];
    $deleteSQL = "DELETE FROM biodata WHERE id='$idToDelete'";
    
    if (mysqli_query($koneksi, $deleteSQL)) {
        echo "<div class='alert alert-success'>Data berhasil dihapus</div>";
    } else {
        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . mysqli_error($koneksi) . "</div>";
    }
}

// Cek apakah form disubmit untuk penambahan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tombol"])){ 
    $namaDepan = $_POST["namadepan"];
    $namaBelakang = $_POST["namabelakang"];
    
    if (!empty($namaDepan) && !empty($namaBelakang)) {
        $sql = "INSERT INTO biodata (namadepan, namabelakang) VALUES ('$namaDepan', '$namaBelakang')";
        
        if (mysqli_query($koneksi, $sql)) {
            echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        } else {
            echo "<div class='alert alert-danger'>Terjadi kesalahan: " . mysqli_error($koneksi) . "</div>";
        }
    } 
}

// Menampilkan data
$strSQL = "SELECT * FROM biodata";
$execStrSQL = mysqli_query($koneksi, $strSQL);

if (mysqli_num_rows($execStrSQL) == 0) {
    echo "<tr><td colspan='5' class='text-center'>Data Kosong</td></tr>";
} else {
    while ($row = mysqli_fetch_assoc($execStrSQL)) {
        $id = $row['id'];
?>
      <tr>
        <td><input type="checkbox" name="checked_id[]" value="<?= $id ?>"></td>
        <td> <?= $row["id"] ?> </td>
        <td> <?= $row["namadepan"] ?> </td>
        <td> <?= $row["namabelakang"] ?> </td>
        <td>
         <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a> 
         <a href="?hapus_id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a> 
        </td>
      </tr>
<?php
    }
}
?>

    </tbody>
  </table>
</div>

<?php
$koneksi->close(); 
?>
</body>
</html>
