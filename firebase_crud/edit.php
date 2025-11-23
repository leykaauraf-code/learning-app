<?php
include('koneksi.php');
$id = $_GET['id'];
$ref = $database->getReference('users/'.$id);
$data = $ref->getValue();

if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $isi = $_POST['isi'];

    $updatedData = [
        'judul' => $judul,
        'kategori' => $kategori,
        'deskripsi' => $deskripsi,
        'isi' => $isi,

    ];

    $ref->update($updatedData);

    echo "<script>
            alert('Data berhasil diupdate!');
            window.location='index.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data</title>

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

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #444;
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
    <h2>Edit Data Pengguna</h2>

    <form method="POST">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $data['judul'] ?>">

        <label>Kategori</label>
        <input type="text" name="kategori" value="<?= $data['kategori'] ?>">

        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="<?= $data['deskripsi'] ?>">

        <label>Isi</label>
        <input type="text" name="isi" value="<?= $data['isi'] ?>">

        <button type="submit" name="update">Update</button>
    </form>

    <a class="back" href="index.php">← Kembali</a>
</div>

</body>
</html>
