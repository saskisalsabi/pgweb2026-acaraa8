<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Query DELETE dari tabel kecamatan_jogja
    $sql = "DELETE FROM kecamatan_jogja WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redireksi kembali ke index.php utama setelah berhasil menghapus
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    // Jika akses delete.php tanpa parameter id, kembalikan ke index.php
    header("Location: index.php");
    exit();
}
?>