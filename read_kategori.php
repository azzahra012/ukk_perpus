<?php
    // Include file koneksi database
    include "koneksi.php";

    // Query untuk mengambil data kategori
    $query = "SELECT * FROM kategori";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Kategori Buku</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                // Loop untuk menampilkan data kategori
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['kategori'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>