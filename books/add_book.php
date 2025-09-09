<?php include '../connection/connection.php'?>
<!-- Perlu diingat nama nama kolom tabel, kalau error kemungkinan besar
kolomnya salah 
-->
<html>

<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="titleheader">Tambah Buku</h1>
    <form action="" method="POST" class="form-container">
        <label>Masukkan Judul :</label>
        <input type="text" name="judul" required/><br>
        <label>Masukkan Penulis :</label>
        <input type="text" name="penulis" required/><br>
        <label>Masukkan Penerbit :</label>
        <input type="text" name="penerbit" required/><br>
        <label>Masukkan Tahun Terbit :</label>
        <input type="number" name="tahun_terbit" required/><br>
        Genre: 
            <select name="genre" id="genre" class="select">
                <option value="romance">Romance</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="fantasy">Fantasy</option>
                <option value="mystery">Mystery</option>
                <option value="non-fiction">Non-Fiction</option>
                <option value="horror">Horror</option>
                <option value="biography">Biography</option>
                <option value="self-help">Self-Help</option>
                <option value="history">History</option>
            </select>
            <br>
        <label>Masukkan Stok :</label>
        <input type="number" name="stok" required/><br>
        <!-- tag, alt -->
        <input type="submit" name="submit" value="Tambah Buku" class="button"/>
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
                echo "<br><a href='index.php'>Lihat Daftar Buku</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    ?>
</body>
</html>