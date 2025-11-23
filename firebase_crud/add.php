<?php
include('koneksi.php');

if(isset($_POST['submit'])){
   $judul = $_POST['judul'];
   $kategori = $_POST['kategori'];
   $deskripsi = $_POST['deskripsi'];
   $isi = $_POST['isi'];

   $newPost = [
       'judul' => $judul,
       'kategori' => $kategori,
       'deskripsi' => $deskripsi,
       'isi' => $isi,

   ];

   $postRef = $database->getReference('users')->push($newPost);

   if($postRef){
       echo "<script>
            alert('Data berhasil disimpan!');
            window.location='index.php';
       </script>";
       exit;
   } else {
       echo "<script>
            alert('Gagal menyimpan data!');
            window.location='index.php';
       </script>";
       exit;
   }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Data User</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f7;
        display: flex;
        justify-content: center;
        padding-top: 40px;
    }

    .container {
        width: 380px;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 4px rgba(0,123,255,0.5);
    }

    button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        border: none;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #0056b3;
    }
    .back {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }

    .back:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Input Data User</h2>

    <form method="POST">
        <input type="text" name="judul" placeholder="Judul" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="text" name="deskripsi" placeholder="deskripsi" required>
        <input type="text" name="isi" placeholder="isi" required>

        <button type="submit" name="submit">Simpan Data</button>
    </form>
    <a class="back" href="index.php">← Kembali</a>
</div>

</body>
</html>
