<?php
// Sesuaikan dengan setting MySQL XAMPP
$servername = "localhost";
$username   = "root";
$password   = ""; // Default XAMPP kosong
$dbname     = "kecamtan";

// Create connection
$conn = new mysqli($servername,$username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari tabel kecamatan_jogja
$sql = "SELECT * FROM kecamatan_