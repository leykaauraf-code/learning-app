<?php
include('koneksi.php');
$reference = $database->getReference('users');
$snapshot = $reference->getValue();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Materi</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f3f6fa;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    th {
        background: #007bff;
        color: #fff;
        padding: 12px;
        text-transform: uppercase;
        font-size: 14px;
        text-align: center; /* Judul kolom di tengah */
    }
    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: center; /* Isi tabel di tengah */
    }
    tr:hover {
        background: #f9f9f9;
    }
    .aksi a {
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }
    .add {
        background: #fbff17ff;
        color: #fff.;
    }
    .edit {
        background: #28a745;
        color: #fff;
    }
    .hapus {
        background: #dc3545;
        color: #fff.;
    }
    .tutorial {
        background: #dc3545;
        color: #fff.;
    }
   
</style>

</head>
<body>
    <a class='tutorial' href='tutorial.php?id=$id'>Tutorial</a>

<h2>MATERI BELAJAR</h2>
<a class='add' href='add.php?id=$id'>Add</a>

<table>
    <tr>
        <th>Judul</th>
        <th>Kategori</th>
        <th>deskripsi</th>
        <th>Isi</th>
        <th>Aksi</th>

    </tr>

    <?php
    if ($snapshot){
        foreach($snapshot as $id => $row){
            echo "<tr>
                    <td>".$row['judul']."</td>
                    <td>".$row['kategori']."</td>
                    <td>".$row['deskripsi']."</td>
                    <td>".$row['isi']."</td>
                    <td class='aksi'>
                        
                        <a class='edit' href='edit.php?id=$id'>Edit</a>
                        <a class='hapus' href='delete.php?id=$id'>Hapus</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4' style='text-align:center;'>Belum ada data.</td></tr>";
    }
    ?>

</table>

</body>
</html>
