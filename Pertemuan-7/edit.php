<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>  
<?php
include "koneksi.php";

// Fungsi untuk membersihkan input dari karakter yang tidak diinginkan
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Inisialisasi variabel $id
$id = "";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $id = bersihkan_input($_POST["id"]);
    $namaDepan = bersihkan_input($_POST["namadepan"]);
    $namaBelakang = bersihkan_input($_POST["namabelakang"]);

    // Query untuk mengupdate data di database
    $strSQL = "UPDATE biodata SET namadepan = '$namaDepan', namabelakang = '$namaBelakang' WHERE id = '$id'";

    $execStrSQL = mysqli_query($koneksi, $strSQL);
    if ($execStrSQL) {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              Data berhasil diperbarui.
              </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
              Terjadi kesalahan: " . mysqli_error($koneksi) . "
              </div>";
    }
} else {
    // Ambil data berdasarkan id yang dikirim melalui URL
    if (isset($_GET['id'])) {
        $id = bersihkan_input($_GET['id']);
        $strSQL = "SELECT * FROM biodata WHERE id = '$id'";
        $execStrSQL = mysqli_query($koneksi, $strSQL);

        // Jika data ditemukan, masukkan ke dalam variabel untuk ditampilkan di form
        if (mysqli_num_rows($execStrSQL) > 0) {
            $row = mysqli_fetch_assoc($execStrSQL);
            $namaDepan = $row['namadepan'];
            $namaBelakang = $row['namabelakang'];
        } else {
            echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>ID tidak ditemukan</div>";
    }
}
?>

<div class="container mt-3">
  <h2>Edit Data Mahasiswa</h2>
  <div class="col-sm-12">
      <span class="m-1">
        <a href="simpandata.php" class="btn btn-info">Kembali</a>
      </span>    
    </div>
  <form action="edit.php?id=<?= $id ?>" method="post">
    <div class="mb-3 mt-3">
      <label for="id">ID:</labe l>
      <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" >
    </div>
    <div class="mb-3 mt-3">
      <label for="namadepan">Nama Depan:</label>
      <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?= isset($namaDepan) ? $namaDepan : '' ?>" placeholder="Input Nama Depan">
    </div>
    <div class="mb-3 mt-3">
      <label for="namabelakang">Nama Belakang:</label>
      <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?= isset($namaBelakang) ? $namaBelakang : '' ?>" placeholder="Input Nama Belakang">
    </div>
    
    <button type="submit" class="btn btn-primary" name="tombol">Update</button>
  </form>
</div>

<?php
$koneksi->close();
?>
</body>
</html>
