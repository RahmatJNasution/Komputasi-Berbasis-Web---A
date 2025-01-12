<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Data</title>
</head>
<body>

<?php
// Cek apakah form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form
    if (!empty($_POST['name'])) {
        $nama = $_POST['name'];
    } else {
        $nama = "Tidak diisi";
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = "Tidak diisi";
    }

    if (!empty($_POST['hobby'])) {
        $hobby = implode(", ", $_POST['hobby']);
    } else {
        $hobby = "Tidak ada hobi dipilih";
    }

    if (!empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "Tidak diisi";
    }

    if (!empty($_POST['birth'])) {
        $birth = $_POST['birth'];
    } else {
        $birth = "Tidak diisi";
    }

    // Menampilkan hasil
    echo "<h2>Data yang Anda isi:</h2>";
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Hobby: " . htmlspecialchars($hobby) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Tanggal Lahir: " . htmlspecialchars($birth) . "<br>";
} else {
    echo "Tidak ada data yang dikirim.";
}
?>

</body>
</html>
