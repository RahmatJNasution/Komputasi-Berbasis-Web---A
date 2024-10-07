<!doctype html>
<html lang="en">
  <head>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="biodata.html">Biodata</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <?php
session_start(); // Memulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $jenis_kelamin = htmlspecialchars(trim($_POST['jenis_kelamin']));
    $tanggal_lahir = htmlspecialchars(trim($_POST['tanggal_lahir']));

    // Cek jika ada data yang kosong
    if (empty($nama) || empty($email) || empty($jenis_kelamin) || empty($tanggal_lahir)) {
        $_SESSION['message'] = "Semua field harus diisi!";
        header("Location: kontak.php"); // Kembali ke halaman kontak
        exit();
    } else {
        // Hitung umur
        $dob = new DateTime($tanggal_lahir);
        $today = new DateTime();
        $umur = $today->diff($dob)->y;

        // Koneksi ke database
        $servername = "localhost"; 
        $username = "root"; // Ganti sesuai kebutuhan
        $password = ""; // Ganti sesuai kebutuhan
        $dbname = "kontak_db"; // Ganti sesuai dengan nama database

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Persiapkan dan ikat
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, jenis_kelamin, tanggal_lahir) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $jenis_kelamin, $tanggal_lahir);

        // Eksekusi dan periksa kesuksesan
        if ($stmt->execute()) {
            echo "<h1>Data yang Diterima</h1>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Jenis Kelamin: $jenis_kelamin</p>";
            echo "<p>Tanggal Lahir: $tanggal_lahir</p>";
            echo "<p>Umur: $umur tahun</p>";
            echo "<p>Data berhasil disimpan ke database.</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup koneksi
        $stmt->close();
        $conn->close();
    }
} else {
    echo "<p>Tidak ada data yang dikirim.</p>";
}
?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Footer -->
    <footer class="bg-primary text-light text-center py-3 mt-4">
        <p>Author: Rahmat<br>
        <a href="https://upj.ac.id/" class="text-light">Universitas Pembangunan Jaya</a></p>
        <a href="https://g.co/kgs/fxcFEtg" class="text-lig
