<?php
// Koneksi ke database (ganti sesuai dengan pengaturan database Anda)
$host = "localhost"; // Host database
$username = "username"; // Username database
$password = "password"; // Password database
$database = "nama_database"; // Nama database

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data pendaftar
$sql = "SELECT * FROM pendaftar_maba";
$result = $conn->query($sql);

// Periksa apakah query berhasil dijalankan
if ($result->num_rows > 0) {
    // Output data pendaftar
    echo "<html>
            <head>
                <title>Data Pendaftar</title>
                <link rel='stylesheet' href='style.css'> <!-- Sesuaikan dengan nama file CSS Anda -->
            </head>
            <body>
                <h1>Data Pendaftar Maba UAD</h1>
                <table>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>NISN</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Pekerjaan Orang Tua</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan Asal Sekolah</th>
                        <th>Jurusan dan Fakultas Pilihan</th>
                    </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["nisn"] . "</td>
                <td>" . $row["ttl"] . "</td>
                <td>" . $row["jk"] . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>" . $row["notelp"] . "</td>
                <td>" . $row["pk_ortu"] . "</td>
                <td>" . $row["sklh"] . "</td>
                <td>" . $row["jr_sklh"] . "</td>
                <td>" . $row["prodi"] . "</td>
              </tr>";
    }
    echo "</table>
          </body>
          </html>";
} else {
    echo "Belum ada data pendaftar.";
}

// Tutup koneksi database
$conn->close();
?>
