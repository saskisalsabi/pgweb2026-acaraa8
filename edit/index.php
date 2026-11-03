<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Kecamatan</title>
</head>
<body>
<h2>Form Edit Data</h2>

<?php
if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

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

// Query ambil data berdasarkan ID dari tabel kecamatan_jogja
$sql = "SELECT * FROM kecamatan_jogja WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
        <form action='edit.php' onsubmit='return validateForm(event)' method='post'>
            <!-- ID disembunyikan menggunakan type hidden -->
            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'><br>

            <label for='nama_kecamatan'>Kecamatan: </label><br>
            <input type='text' id='nama_kecamatan' name='nama_kecamatan' value='<?php echo $row['nama_kecamatan']; ?>'><br>

            <label for='longtitude'>Longitude: </label><br>
            <input type='text' id='longtitude' name='longtitude' value='<?php echo $row['longtitude']; ?>'><br>

            <label for='lat'>Latitude: </label><br>
            <input type='text' id='lat' name='latitude' value='<?php echo $row['latitude']; ?>'><br>

            <label for='luas'>Luas: </label><br>
            <input type='text' id='luas' name='luas' value='<?php echo $row['luas']; ?>'><br>

            <label for='jml_pddk'>Jumlah Penduduk: </label><br>
            <input type='text' id='jml_pddk' name='jumlah_penduduk' value='<?php echo $row['jumlah_penduduk']; ?>'><br><br>

            <input type='submit' value='Submit'>
        </form>
<?php
    }
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>

<p id="informasi" style="color: red;"></p>

<script>
function validateForm(event) {
    let luas = document.getElementById("luas").value;
    let text = "";
    
    // Validasi agar inputan luas berupa angka dan tidak bernilai negatif/nol
    if (isNaN(luas) || luas < 1) {
        text = "Data luas harus berupa angka dan tidak boleh bernilai negatif atau nol!";
        event.preventDefault(); // Menghentikan submit form jika validasi gagal
    }
    document.getElementById("informasi").innerHTML = text;
}
</script>
</body>
</html>