<?php
// Mendapatkan data dari form
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Confirmation</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Rahmat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="latihan1.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Confirmation Message -->
    <div class="container mt-5">
        <h2>Contact Confirmation</h2>
        <p>Thank you for reaching out, <strong><?php echo $name; ?></strong>!</p>
        <p>We have received your message:</p>
        <blockquote class="blockquote">
            <p><?php echo $message; ?></p>
        </blockquote>
        <p>We will contact you at <strong><?php echo $email; ?></strong> soon.</p>
        <a href="latihan1.html" class="btn btn-primary">Back to Home</a>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p>Author: Rahmat<br><a href="https://upj.ac.id/" class="text-light">Universitas Pembangunan Jaya</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
