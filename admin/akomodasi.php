<?php
include "koneklogin.php";

//input villa
if (isset($_POST["teks"])) {
       $nama = $_POST["nama"];
       $ulasan = $_POST["ulasan"];

       $sql = "INSERT INTO villa (nama, ulasan) VALUES ('$nama', '$ulasan')";

       if ($db->query($sql) === TRUE) {
              echo "Ulasan berhasil ditambahkan!";
       } else {
              echo "Error: " . $sql . "<br>" . $db->error;
       }

       // $db->query($sql);
       header("Location: akomodasi.php");
       exit;
}

//input penginapan
if (isset($_POST["kritik"])) {
    $nama = $_POST["nama"];
    $ulasan = $_POST["ulasan"];

    $sql = "INSERT INTO penginapan (nama, ulasan) VALUES ('$nama', '$ulasan')";

    if ($db->query($sql) === TRUE) {
           echo "Ulasan berhasil ditambahkan!";
    } else {
           echo "Error: " . $sql . "<br>" . $db->error;
    }

    // $db->query($sql);
    header("Location: akomodasi.php");
    exit;
}

//input swiss
if (isset($_POST["komen"])) {
    $nama = $_POST["nama"];
    $ulasan = $_POST["ulasan"];

    $sql = "INSERT INTO swiss (nama, ulasan) VALUES ('$nama', '$ulasan')";

    if ($db->query($sql) === TRUE) {
           echo "Ulasan berhasil ditambahkan!";
    } else {
           echo "Error: " . $sql . "<br>" . $db->error;
    }

    // $db->query($sql);
    header("Location: akomodasi.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-akomodasi.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet"/>
    <!-- End fonts -->
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- End icons -->
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">Wisata <span>Nusantara.</span></a>
            <div class="navbar-navi">
                <a href="index.php">Home</a>
                <a href="liburan.php">Pilihan Liburan</a>
                <a href="akomodasi.php">Akomodasi</a>
                <a href="contact.php">Kontak</a>
            </div>
            <div class="navbar-tambahan">
                <a href="#" id="search"><i data-feather="search"></i></a>
                <a href="#" id="menu"><i data-feather="menu"></i></a>
            </div>
        </nav>
        
        <section class="hero" id="home">
            <main class="content">
                <h1>Akomodasi <span>Wisata</span></h1>
            </main>
        </section>
    </header>
    
    <!-- Konten Utama -->
    <main>
        <section class="destinasi">
            <div class="container">
                <!-- Akomodasi Jawa Tengah -->
                <h2>Akomodasi Jawa Tengah</h2>
                <ul>
                    <h3>Villa Borobudur Resort</h3>
                    <img src="foto/jawa1.jpg" alt="Villa Borobudur Resort">
                    <p>Villa Borobudur Resort adalah resor mewah yang terletak di lereng Pegunungan Menoreh, kurang dari tiga kilometer dari Candi Borobudur di Magelang, Jawa Tengah. 
                        Resor ini menawarkan pengalaman autentik Jawa dengan menggabungkan warisan kuno dan kemewahan modern.
                    </p>

                        <!-- Formulir Ulasan -->
                    <section class="ulasan">
                        <h2>Input Ulasan</h2>
                        <form action="akomodasi.php" method="POST">
                            <label for="nama">Nama:</label><br>
                            <input type="text" id="nama" name="nama" required><br><br>

                            <label for="ulasan">Ulasan:</label><br>
                            <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>

                            <button type="submit" name="teks">Kirim Ulasan</button>
                        </form>
                    </section>

                        <!-- Menampilkan Ulasan Pengguna -->
                    <section class="tampil-ulasan">
                        <h2>Ulasan Pengguna</h2>
                        <div id="daftar-ulasan">
                            <?php
                            // Menampilkan ulasan dari database
                            include 'koneklogin.php'; // File koneksi database
                            $result = $db->query("SELECT nama, ulasan FROM villa ORDER BY id DESC");
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='ulasan-item'>";
                                echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
                                echo "<p>" . htmlspecialchars($row['ulasan']) . "</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </section>

                <!-- Akomodasi Bali -->
                <h2>Akomodasi Bali</h2>
                <ul>
                    <h3>Penginapan Madani Antique Villas</h3>
                    <img src="foto/bali1.jpg" alt="">
                    <p>Tegallalang di Kabupaten Gianyar, Bali terkenal akan pemandangan sawah terasering yang kerap dijadikan sebagai obyek swafoto. 
                        Tidak jarang wisatawan yang berkunjung ke kecamatan tersebut hanya untuk melihat pemandangan sawah sambil menikmati udara sejuk.
                    </p>
                        
                    <!-- Formulir Ulasan -->
                    <section class="ulasan">
                        <h2>Input Ulasan</h2>
                        <form action="akomodasi.php" method="POST">
                            <label for="nama">Nama:</label><br>
                            <input type="text" id="nama" name="nama" required><br><br>

                            <label for="ulasan">Ulasan:</label><br>
                            <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
                        
                            <button type="submit" name="kritik">Kirim Ulasan</button>
                        </form>
                    </section>
                        
                    <!-- Menampilkan Ulasan Pengguna -->
                    <section class="tampil-ulasan">
                        <h2>Ulasan Pengguna</h2>
                        <div id="daftar-ulasan">
                            <?php
                            // Menampilkan ulasan dari database
                            include 'koneklogin.php'; // File koneksi database
                            $result = $db->query("SELECT nama, ulasan FROM penginapan ORDER BY id DESC");
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='ulasan-item'>";
                                echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
                                echo "<p>" . htmlspecialchars($row['ulasan']) . "</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </section>

                <!-- Akomodasi kalimantan -->
                <h2>Akomodasi Kalimantan</h2>
                <ul>
                    <h3>Swiss Belhotel Interasional</h3>
                    <img src="foto/swiss-belhotel-danum.jpg" alt="">
                    <p>
                        Swiss-Belhotel International mengoperasikan beberapa hotel berbintang empat di Kalimantan, Indonesia, yang menawarkan layanan dan fasilitas berkualitas tinggi
                    </p>

                    <!-- Formulir Ulasan -->
                    <section class="ulasan">
                        <h2>Input Ulasan</h2>
                        <form action="akomodasi.php" method="POST">
                            <label for="nama">Nama:</label><br>
                            <input type="text" id="nama" name="nama" required><br><br>
                        
                            <label for="ulasan">Ulasan:</label><br>
                            <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
                        
                            <button type="submit" name="komen">Kirim Ulasan</button>
                        </form>
                    </section>
                        
                    <!-- Menampilkan Ulasan Pengguna -->
                    <section class="tampil-ulasan">
                        <h2>Ulasan Pengguna</h2>
                        <div id="daftar-ulasan">
                            <?php
                            // Menampilkan ulasan dari database
                            include 'koneklogin.php'; // File koneksi database
                            $result = $db->query("SELECT nama, ulasan FROM swiss ORDER BY id DESC");
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='ulasan-item'>";
                                echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
                                echo "<p>" . htmlspecialchars($row['ulasan']) . "</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </section>
                </ul>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Traf<span>Nus</span></h3>
                <p>Jelajahi keindahan Nusantara bersama kami. Destinasi terbaik untuk liburan Anda.</p>
            </div>

            <div class="footer-section">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="liburan.php">Pilihan Liburan</a></li>
                    <li><a href="akomodasi.php">Akomodasi</a></li>
                    <li><a href="contact.php">Kontak</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Kontak Kami</h4>
                <p>Email: info@nusantarawisata.com</p>
                <p>Telepon: +62 812 3456 7890</p>
                <p>Alamat: Jl. Nusantara No.1, Jakarta</p>
            </div>
        </div>
    <!-- Feather Icon -->
    <script>
        feather.replace();
    </script>
    <script src="script.js"></script>
</body>
<footer>
        <div class="footer-bottom">
            <p>&copy; 2025 Nusantara Wisata. Semua hak dilindungi.</p>
        </div>
    </footer>
</html>