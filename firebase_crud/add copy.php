 <?php
 include('koneksi.php');
 if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $newPost = [
        'nama' => $nama,
        'email' => $email
    ];
    $postRef = $database->getReference('users')->push($newPost);
    if($postRef){
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data.";
    }
 }
 ?>
 <form method="POST">
    <input type="text" name="nama" placeholder="Nama"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <button type="submit" name="submit">Simpan</button>
</form>