<?php
include '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // --- tampilkan form edit ---
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
    <!doctype html>
    <html>
    <head><title>Edit Buku</title></head>
    <body>
        <h1>Edit Buku</h1>
        <form method="POST" action="update_book.php">
            <input type="hidden" name="id_buku" value="<?= (int)$book['id_buku'] ?>">
            Judul: <input type="text" name="judul" value="<?= htmlspecialchars($book['judul']) ?>"><br>
            Penulis: <input type="text" name="penulis" value="<?= htmlspecialchars($book['penulis']) ?>"><br>
            Penerbit: <input type="text" name="penerbit" value="<?= htmlspecialchars($book['penerbit']) ?>"><br>
            Tahun: <input type="number" name="tahun_terbit" value="<?= (int)$book['tahun_terbit'] ?>"><br>
            Genre: <input type="text" name="genre" value="<?= htmlspecialchars($book['genre']) ?>"><br>
            Stok: <input type="number" name="stok" value="<?= (int)$book['stok'] ?>"><br>
            <button type="submit">Simpan</button>
        </form>
    </body>
    </html>
    <?php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // --- proses update ---
    $id = (int)($_POST['id_buku'] ?? 0);
    $judul = $_POST['judul'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $penerbit = $_POST['penerbit'] ?? '';
    $tahun_terbit = (int)($_POST['tahun_terbit'] ?? 0);
    $genre = $_POST['genre'] ?? '';
    $stok = (int)($_POST['stok'] ?? 0);

    $stmt = $conn->prepare("UPDATE buku 
                            SET judul=?, penulis=?, penerbit=?, tahun_terbit=?, genre=?, stok=? 
                            WHERE id_buku=?");
    $stmt->bind_param("sssisii", $judul, $penulis, $penerbit, $tahun_terbit, $genre, $stok, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data buku berhasil diperbarui'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal update: ".$stmt->error."'); window.location.href='index.php';</script>";
    }
    exit;
}
