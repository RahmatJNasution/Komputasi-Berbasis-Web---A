
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
    </div> 
  </div>          
  <table id="example" class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

    <?php
include "koneksi.php";

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tombol"])){ 
    $namaDepan = $_POST["namadepan"];
    $namaBelakang = $_POST["namabelakang"];
    
   
    if (!empty($namaDepan) && !empty($namaBelakang)) {
        
        $sql = "INSERT INTO biodata (namadepan, namabelakang) VALUES ('$namaDepan', '$namaBelakang')";
        
        // Eksekusi query
        if (mysqli_query($koneksi, $sql)) {
            echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
        } else {
            echo "<div class='alert alert-danger'>Terjadi kesalahan: " . mysqli_error($koneksi) . "</div>";
        }
    } 
}
?>

    <?php
     
      $strSQL = "SELECT * FROM biodata";
      $execStrSQL = mysqli_query($koneksi, $strSQL);

      if (mysqli_num_rows($execStrSQL) > 0) {
        while ($row = mysqli_fetch_assoc($execStrSQL)) {
    ?>
      <tr>
        <td> <?= $row["id"] ?> </td>
        <td> <?= $row["namadepan"] ?> </td>
        <td> <?= $row["namabelakang"] ?> </td>
        <td>
          <button type="button" class="btn btn-primary">Edit</button>
          <button type="button" class="btn btn-danger">Hapus</button>
        </td>
      </tr> 
    <?php
        }
      } else {
        echo "<tr><td colspan='4' class='text-center'>Tidak ada data ditemukan</td></tr>";
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
