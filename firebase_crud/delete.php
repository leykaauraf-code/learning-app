<?php
include('koneksi.php');

$id = $_GET['id'];
$delete = $database->getReference('users/'.$id)->remove();

if($delete){
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
            window.location='index.php';
          </script>";
}
?>
