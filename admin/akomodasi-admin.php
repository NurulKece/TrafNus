<?php
include "koneklogin.php"; // File koneksi database

// Hapus ulasan berdasarkan ID
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $table = $_GET['table']; // Tabel yang digunakan: ulasan, curug, taman, pantai, villa, penginapan, atau swiss
    $db->query("DELETE FROM $table WHERE id = $id");
    header("Location: akomodasi-admin.php");
    exit;
}

// Simpan perubahan ulasan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $nama = $db->real_escape_string($_POST['nama']);
    $ulasan = $db->real_escape_string($_POST['ulasan']);
    $table = $_POST['table'];
    $db->query("UPDATE $table SET nama = '$nama', ulasan = '$ulasan' WHERE id = $id");
    header("Location: akomodasi-admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Akomodasi</title>
    <link rel="stylesheet" href="css/style-akomodasi-admin.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <section class="admin-panel">
        <div class="content">
            <h2>Admin Panel</h2>
        </div>
        <h2>Kelola Ulasan</h2>

        <div class="back">
              <a href="home-admin.php">Kembali</a>
        </div>

        <!-- villa borobudur -->
        <h3>Villa Borobudur Resort</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM villa ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='akomodasi-admin.php?hapus={$row['id']}&table=villa'>Hapus</a> | 
                    <a href='admin-edit-akomodasi.php?id={$row['id']}&table=villa'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Penginapan Madani Antique Villas -->
        <h3>Penginapan Madani Antique Villas</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM penginapan ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='akomodasi-admin.php?hapus={$row['id']}&table=penginapan'>Hapus</a> | 
                    <a href='admin-edit-akomodasi.php?id={$row['id']}&table=penginapan'>Edit</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Swiss Belhotel Interasional -->
        <h3>Swiss Belhotel Interasional</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Ulasan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $result = $db->query("SELECT * FROM swiss ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['ulasan']}</td>";
                echo "<td>
                    <a href='akomodasi-admin.php?hapus={$row['id']}&table=swiss'>Hapus</a> | 
                    <a href='admin-edit-akomodasi.php?id={$row['id']}&table=swiss'>Edit</a>
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
