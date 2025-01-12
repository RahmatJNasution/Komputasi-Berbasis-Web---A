<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
<form action="konfirmasi.php" method="POST">
    <label for="name">Nama:</label>
    <input type="text" id="name" name="name" ><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" ><br><br>

    <label for="hobby">Hobby:</label><br>
    <input type="checkbox" name="hobby[]" value="Bersepeda"> Bersepeda<br>
    <input type="checkbox" name="hobby[]" value="Berenang"> Berenang<br>
    <input type="checkbox" name="hobby[]" value="Naik Gunung"> Naik Gunung<br><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" value="Laki-laki" > Laki-laki
    <input type="radio" name="gender" value="Perempuan" > Perempuan<br><br>

    <label for="birth">Tanggal Lahir:</label>
    <input type="date" name="birth" ><br><br>

    <input type="submit" value="Konfirmasi">
</form>
</body>
</html>
