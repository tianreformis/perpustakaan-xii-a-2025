<?php
include '../connection/connection.php';

$id = $_GET['id_buku'] ?? null;
if (!$id) {
    echo "<script>alert('ID buku tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

if (!$book) {
    echo "<script>alert('Data buku tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}
?>

<html>
<head>
    <title>Edit Buku</title>
    <style>
        body {
            font-family: Poppins;
            background: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button, a.btn {
            margin-top: 15px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }
        button {
            background: #3498db;
            color: white;
        }
        button:hover {
            background: #2980b9;
        }
        a.btn {
            background: #95a5a6;
            color: white;
            display: inline-block;
            text-align: center;
        }
        a.btn:hover {
            background: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Buku</h1>
        <form method="POST" action="update_book.php">
            <input type="hidden" name="id_buku" value="<?php echo $book['id_buku']; ?>">

            <label>Judul:</label>
            <input type="text" name="judul" value="<?php echo $book['judul']; ?>" required>

            <label>Penulis:</label>
            <input type="text" name="penulis" value="<?php echo $book['penulis']; ?>" required>

            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo $book['penerbit']; ?>" required>

            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="<?php echo $book['tahun_terbit']; ?>" required>

            <label>Genre:</label>
            <input type="text" name="genre" value="<?php echo $book['genre']; ?>" required>

            <label>Stok:</label>
            <input type="number" name="stok" value="<?php echo $book['stok']; ?>" required>

            <button type="submit">Simpan Perubahan</button>
            <a href="index.php" class="btn">Batal</a>
        </form>
    </div>
</body>
</html>
