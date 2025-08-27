<?php include '../connection/connection.php'?>
<!-- Perlu diingat nama nama kolom tabel, kalau error kemungkinan besar
kolomnya salah 
-->
<html>

<head>
    <title>Tambah Buku</title>
</head>
<body>
    <form action="" method="POST">
        <label>Masukkan Judul :</label>
        <input type="text" name="judul" required/><br>
        <label>Masukkan Penulis :</label>
        <input type="text" name="penulis" required/><br>
        <label>Masukkan Penerbit :</label>
        <input type="text" name="penerbit" required/><br>
        <label>Masukkan Tahun Terbit :</label>
        <input type="number" name="tahun_terbit" required/><br>
        <label>Masukkan Genre :</label>
        <input type="text" name="genre" required/><br>
        <label>Masukkan Stok :</label>
        <input type="number" name="stok" required/><br>
        <!-- tag, alt -->
        <input type="submit" name="submit" value="Tambah Buku" />
    </form>
    <?php 
        if (isset ($_POST['submit'])){
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $genre = $_POST['genre'];
            $stok = $_POST['stok'];

            $sql = "INSERT INTO buku(judul, penulis, penerbit, tahun_terbit, genre, stok) VALUES('$judul', '$penulis', '$penerbit', '$tahun_terbit', '$genre', '$stok')";
            if ($conn ->query($sql)===TRUE){
                echo "Buku berhasil ditambahkan";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    ?>
</body>
</html>