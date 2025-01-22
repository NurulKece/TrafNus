<?php
include "koneklogin.php"; // File koneksi database

if (!isset($_GET['id']) || !isset($_GET['table'])) {
    header("Location: admin.php");
    exit;
}

$id = intval($_GET['id']);
$table = $_GET['table'];

$result = $db->query("SELECT * FROM $table WHERE id = $id");
$row = $result->fetch_assoc();

if (!$row) {
    echo "Ulasan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ulasan</title>
    <link rel="stylesheet" href="css/style-admin-edit.css">
</head>
<body>
    <section class="edit-ulasan">
        <h2>Edit Ulasan</h2>
        <form action="admin.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="table" value="<?php echo $table; ?>">
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br><br>
            
            <label for="ulasan">Ulasan:</label><br>
            <textarea id="ulasan" name="ulasan" rows="4" required><?php echo htmlspecialchars($row['ulasan']); ?></textarea><br><br>
            
            <button type="submit" name="edit">Simpan Perubahan</button>
        </form>
    </section>
</body>
</html>
