<?php
// Cek apakah data dikirim via method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kecamatan = $_POST['kecamatan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kecamtan"; // Disesuaikan dengan nama database kamu

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perhatikan nama kolom 'longtitude' (pake t di tengah) sesuai nama kolom di phpMyAdmin kamu
    $sql = "INSERT INTO kecamatan_jogja (nama_kecamatan, longtitude, latitude, luas, jumlah_penduduk) 
            VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: index.html");
    exit();
}
?>