<?php include '../connection/connection.php'; ?>

<html>
<head>
    <title>Daftar Buku</title>
        <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: white;
            background: #e74c3c;
            padding: 5px 10px;
            border-radius: 4px;
        }
        a:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Daftar Buku Perpustakaan</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Genre</th>
            <th>Stok</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $sql = "SELECT * FROM buku";
        $result = $conn->query($sql);

        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id_buku']."</td>
                        <td>".$row['judul']."</td>
                        <td>".$row['penulis']."</td>
                        <td>".$row['penerbit']."</td>
                        <td>".$row['tahun_terbit']."</td>
                        <td>".$row['genre']."</td>
                        <td>".$row['stok']."</td>
                        <td><a href='update_book.php?id_buku=".$row['id_buku']."'>Edit</a></td>
                        <td><a href='remove_book.php?id_buku=".$row['id_buku']."' onclick=\"return confirm('Yakin ingin menghapus buku ini?');\">Hapus</a></td>

                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada buku tersedia</td></tr>";
        }
        ?>
    </table>
    <div style="text-align:center;">
        <a href="add_book.php">Tambah Buku Baru</a>
</body>
</html>
