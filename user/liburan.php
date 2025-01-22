<?php
include "koneklogin.php";

//input kawah
if (isset($_POST["input"])) {
       $nama = $_POST["nama"];
       $ulasan = $_POST["ulasan"];

       $sql = "INSERT INTO ulasan (nama, ulasan) VALUES ('$nama', '$ulasan')";

       if ($db->query($sql) === TRUE) {
              echo "Ulasan berhasil ditambahkan!";
       } else {
              echo "Error: " . $sql . "<br>" . $db->error;
       }

       // $db->query($sql);
       header("Location: liburan.php");
       exit;
}

//input curug
if (isset($_POST["masukkan"])) {
       $nama = $_POST["nama"];
       $ulasan = $_POST["ulasan"];
   
       $sql = "INSERT INTO curug (nama, ulasan) VALUES ('$nama', '$ulasan')";
   
       if ($db->query($sql) === TRUE) {
           echo "Ulasan berhasil ditambahkan!";
       } else {
           echo "Error: " . $sql . "<br>" . $db->error;
       }
   
       // $db->query($sql);
       header("Location: liburan.php");
       exit;
   }

//input taman
if (isset($_POST["kirim"])) {
       $nama = $_POST["nama"];
       $ulasan = $_POST["ulasan"];
   
       $sql = "INSERT INTO taman (nama, ulasan) VALUES ('$nama', '$ulasan')";
   
       if ($db->query($sql) === TRUE) {
           echo "Ulasan berhasil ditambahkan!";
       } else {
           echo "Error: " . $sql . "<br>" . $db->error;
       }
   
       // $db->query($sql);
       header("Location: liburan.php");
       exit;
   }

//input pantai
if (isset($_POST["simpan"])) {
       $nama = $_POST["nama"];
       $ulasan = $_POST["ulasan"];
   
       $sql = "INSERT INTO pantai (nama, ulasan) VALUES ('$nama', '$ulasan')";
   
       if ($db->query($sql) === TRUE) {
           echo "Ulasan berhasil ditambahkan!";
       } else {
           echo "Error: " . $sql . "<br>" . $db->error;
       }
   
       // $db->query($sql);
       header("Location: liburan.php");
       exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="css/style-liburan.css">

       <!-- fonts -->
       <link rel="preconnect" href="https://fonts.googleapis.com" />
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet"/>
       <!-- end -->
       
       <!-- icons -->
       <script src="https://unpkg.com/feather-icons"></script>
       <!-- end -->
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
                     </div>
              </nav>
              
              <section class="hero" id="home">
                     <main class="content">
                            <h1>Destinasi <span>Wisata</span></h1>
                     </main>
              </section>

              <section class="destinasi">
                     <div class="container">
                            <h2>Destinasi Jawa</h2>
                            <ul>
                                   <h3>Kawah Putih</h3>
                                   <img src="foto/kawah.jpg" alt="">
                                   <p>
                                   Kawah Putih Bandung adalah salah satu tempat wisata yang terkenal di Bandung yang wajib kamu kunjungi. Dinamakan Kawah Putih karena memiliki warna putih kebiruan yang sangat cantik. Namun, untuk berkunjung ke tempat wisata ini, kamu wajib menggunakan masker, karena di sini mengandung belerang yang sangat kuat.
                                   Lokasi: Desa Alam Endah, Kecamatan Rancabali, Kabupaten Bandung, Jawa Barat.
                                   </p>

                                   <section class="ulasan">
                                          <h2>Input Ulasan</h2>
                                          <form action="liburan.php" method="POST">
                                                 <label for="nama">Nama:</label><br>
                                                 <input type="text" id="nama" name="nama" required><br><br>
            
                                                 <label for="ulasan">Ulasan:</label><br>
                                                 <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
            
                                                 <button type="submit" name="input">Kirim Ulasan</button>
                                          </form>
                                   </section>
    
                                   <section class="tampil-ulasan">
                                          <h2>Ulasan Pengguna</h2>
                                          <div id="daftar-ulasan">
                                                 <?php
                                                 // Menampilkan ulasan dari database
                                                 include 'koneklogin.php'; // File koneksi database
                                                 $result = $db->query("SELECT nama, ulasan FROM ulasan ORDER BY id DESC");
                                                 while ($row = $result->fetch_assoc()) {
                                                        echo "<div class='ulasan-item'>";
                                                        echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
                                                        echo "<p>" . htmlspecialchars($row['ulasan']) . "</p>";
                                                        echo "</div>";
                                                 }
                                                 ?>
                                          </div>
                                   </section>



                                   <h3>Curug Cikaso</h3>
                                   <img src="foto/curug.jpg" alt="">
                                   <p>
                                   Di Jawa Barat memiliki cukup banyak wisata alam curug, salah satunya adalah Curug Cikaso yang memiliki ketinggian sekitar 80 meter. Di Curug Cikaso ini ada tiga air terjun yang saling berjajar untuk menunjukkan pesona keindahannya.
                                   Lokasi: Desa Ciniti, Cibitung, Sukabumi Regency, Jawa Barat.
                                   </p>

                                   <section class="ulasan">
                                          <h2>Input Ulasan</h2>
                                          <form action="liburan.php" method="POST">
                                                 <label for="nama">Nama:</label><br>
                                                 <input type="text" id="nama" name="nama" required><br><br>
            
                                                 <label for="ulasan">Ulasan:</label><br>
                                                 <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
            
                                                 <button type="submit" name="masukkan">Kirim Ulasan</button>
                                          </form>
                                   </section>
    
                                   <section class="tampil-ulasan">
                                          <h2>Ulasan Pengguna</h2>
                                          <div id="daftar-ulasan">
                                                 <?php
                                                 // Menampilkan ulasan dari database
                                                 include 'koneklogin.php'; // File koneksi database
                                                 $result = $db->query("SELECT nama, ulasan FROM curug ORDER BY id DESC");
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

                            <h2>Destinasi Bali</h2>
                            <ul>
                                   <h3>Taman Budaya GWK</h3>
                                   <img src="foto/gwk.jpg" alt="">
                                   <p>
                                   Sedang mencari ide perjalanan yang kaya akan budaya, dengan monumen bersejarah yang megah, atraksi tarian tradisional yang eksotis, dan acara yang penuh adrenalin dalam satu perhentian? Nah, Sobat Pesona tinggal mengunjungi Taman Budaya GWK. Saksikan berbagai keindahan tarian Bali seperti tarian Kecak yang eksotis, tarian Legong yang megah, serta banyak tarian lainnya yang memukau ditampilkan di sini. Jangan lupa untuk bersantai di sisi Kolam Teratai GWK sambil mengamati kemegahan patung Garuda Wisnu Kencana yang menjulang setinggi 120 meter dan dibangun selama 28 tahun. Perjalanan seru seperti ini pastilah akan membuat liburan Sobat Pesona menjadi tak terlupakan.
                                   </p>

                                   <section class="ulasan">
                                          <h2>Input Ulasan</h2>
                                          <form action="liburan.php" method="POST">
                                                 <label for="nama">Nama:</label><br>
                                                 <input type="text" id="nama" name="nama" required><br><br>
            
                                                 <label for="ulasan">Ulasan:</label><br>
                                                 <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
            
                                                 <button type="submit" name="kirim">Kirim Ulasan</button>
                                          </form>
                                   </section>
    
                                   <section class="tampil-ulasan">
                                          <h2>Ulasan Pengguna</h2>
                                          <div id="daftar-ulasan">
                                                 <?php
                                                 // Menampilkan ulasan dari database
                                                 include 'koneklogin.php'; // File koneksi database
                                                 $result = $db->query("SELECT nama, ulasan FROM taman ORDER BY id DESC");
                                                 while ($row = $result->fetch_assoc()) {
                                                        echo "<div class='ulasan-item'>";
                                                        echo "<h4>" . htmlspecialchars($row['nama']) . "</h4>";
                                                        echo "<p>" . htmlspecialchars($row['ulasan']) . "</p>";
                                                        echo "</div>";
                                                 }
                                                 ?>
                                          </div>
                                   </section>



                                   <h3>Pantai Keliling Nusa Penida</h3>
                                   <img src="foto/keliling.jpg" alt="">
                                   <p>
                                   Bali memiliki pantai yang menakjubkan dan sangat terkenal di seluruh penjuru dunia karena keindahan alamnya. Pantai Kelingking akan membawa Sobat Pesona ke pengalaman di tingkat yang jauh lebih tinggi. Sebagai salah satu tempat yang paling menakjubkan di Bali, Pantai Kelingking layak dimasukan ke dalam daftar tempat yang wajib Sobat Pesona kunjungi di Bali. Lokasi ini tersohor dengan tebing yang membentuk T-Rex juga pantai indah yang bagai surga tersembunyi. Jalan menuju lokasi ini beberapa berupa tebing-tebing yang curam dan belum memiliki pengamanan yang maksimum, sehingga Sobat Pesona perlu berhati-hati dan memperhatikan tiap langkah serta mengikuti peraturan yang ada. Sobat Pesona akan terpana menyaksikan pemandangan yang menakjubkan dimana perairan biru yang jernih membingkai tebing T-Rex yang ikonik. Sobat Pesona juga dapat melihat pantai tersembunyi di antara tebing-tebing yang hanya dapat diakses secara sangat hati-hati melalui jalan kecil menyusuri anak tangga yang cukup curam.
                                   </p>

                                   <section class="ulasan">
                                          <h2>Input Ulasan</h2>
                                          <form action="liburan.php" method="POST">
                                                 <label for="nama">Nama:</label><br>
                                                 <input type="text" id="nama" name="nama" required><br><br>
            
                                                 <label for="ulasan">Ulasan:</label><br>
                                                 <textarea id="ulasan" name="ulasan" rows="4" required></textarea><br><br>
            
                                                 <button type="submit" name="simpan">Kirim Ulasan</button>
                                          </form>
                                   </section>
    
                                   <section class="tampil-ulasan">
                                          <h2>Ulasan Pengguna</h2>
                                          <div id="daftar-ulasan">
                                                 <?php
                                                 // Menampilkan ulasan dari database
                                                 include 'koneklogin.php'; // File koneksi database
                                                 $result = $db->query("SELECT nama, ulasan FROM pantai ORDER BY id DESC");
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
       </header>

       <!-- Footer mulai -->
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

              <div class="footer-bottom">
                     <p>&copy; 2025 Nusantara Wisata. Semua hak dilindungi.</p>
              </div>
       </footer>
<!-- Footer akhir -->

       <!-- icon -->
       <script>
       feather.replace();
       </script>
       <!--  -->
       <script src="js/script-liburan.js"></script>
</body>
</html>