<?php
include "koneklogin.php"; // File koneksi database

// Hapus ulasan berdasarkan ID
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $table = $_GET['table']; // Tabel yang digunakan: ulasan, curug, taman, atau pantai
    $db->query("DELETE FROM $table WHERE id = $id");
    header("Location: admin.php");
    exit;
}

// Simpan perubahan ulasan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $nama = $db->real_escape_string($_POST['nama']);
    $ulasan = $db->real_escape_string($_POST['ulasan']);
    $table = $_POST['table'];
    $db->query("UPDATE $table SET nama = '$nama', ulasan = '$ulasan' WHERE id = $id");
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Destinasi</title>
    <link rel="stylesheet" href="css/style-admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <section class="admin-panel">
        <div class="content">
            <h2>Admin Panel</h2>
        </div>
        <h2>Kelola Ulasan</h2>

        <div class="kembali">
              <a href="home-admin.php">Kembali</a>
        </div>

        <!-- Kawah Putih -->
        <h3>Kawah Putih</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM ulasan ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='admin.php?hapus={$row['id']}&table=ulasan'>Hapus</a> | 
                    <a href='admin-edit.php?id={$row['id']}&table=ulasan'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Curug Cikaso -->
        <h3>Curug Cikaso</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM curug ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='admin.php?hapus={$row['id']}&table=curug'>Hapus</a> | 
                    <a href='admin-edit.php?id={$row['id']}&table=curug'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Taman Budaya GWK -->
        <h3>Taman Budaya GWK</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM taman ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='admin.php?hapus={$row['id']}&table=taman'>Hapus</a> | 
                    <a href='admin-edit.php?id={$row['id']}&table=taman'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Pantai Kelingking -->
        <h3>Pantai Kelingking</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM pantai ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='admin.php?hapus={$row['id']}&table=pantai'>Hapus</a> | 
                    <a href='admin-edit.php?id={$row['id']}&table=pantai'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>

    <footer class="footer">
              <div class="footer-bottom">
                     <p>&copy; 2025 Nusantara Wisata. Semua hak dilindungi.</p>
              </div>
       </footer>

    <script>
        feather.replace();
    </script>
</body>
</html>
