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
    &nbsp;&nbsp;&nbsp;
    <div class="mx-auto p-2" style="width: 300px;">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <form action="confirm.php" method="POST">
            <h1 class="card-title">Kontak Kami</h1>
            <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
            &nbsp;
            <h5>Masukkan :</h5>
            &nbsp;
            <div class="mb-3">
              <h5 for="exampleFormControlTextarea1" class="form-label">Nama</h5>
              <textarea name="nama" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <h5 for="exampleFormControlInput1" class="form-label">Email </h5>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com">
            <h5>Jenis Kelamin</h5>
            <select name="jenis_kelamin" class="form-select mb-3">
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            <h5 for="tanggalLahir" class="form-label">Tanggal Lahir</h5>
            <input type="date" name="tanggal_lahir" class="form-control mb-3" id="tanggalLahir">
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
       <!-- Footer -->
       <footer class="bg-primary text-light text-center py-3 mt-4">
        <p>Author: Rahmat<br>
        <a href="https://upj.ac.id/" class="text-light">Universitas Pembangunan Jaya</a></p>
        <a href="https://g.co/kgs/fxcFEtg" class="text-light">Google</a> | 
        <a href="https://www.facebook.com/?locale=id_ID" class="text-light">Facebook</a>
    </footer>
</html>
