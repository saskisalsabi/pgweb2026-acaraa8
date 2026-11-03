<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id              = $_POST['id'];
    $nama_kecamatan  = $_POST['nama_kecamatan'];
    $longtitude      = $_POST['longtitude'];
    $latitude        = $_POST['latitude'];
    $luas             = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];

    // Sesuaikan dengan setting MySQL XAMPP Anda
    $servername = "localhost";
    $username   = "root";
    $password   = ""; 
    $dbname     = "kecamtan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query UPDATE data ke tabel kecamatan_jogja
    $sql = "UPDATE kecamatan_jogja SET 
            nama_kecamatan='$nama_kecamatan', 
            longtitude=$longtitude, 
            latitude=$latitude, 
            luas=$luas, 
            jumlah_penduduk=$jumlah_penduduk 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Kembali ke halaman utama (lat08/index.php) setelah berhasil update
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: ../index.php");
    exit();
}
?>