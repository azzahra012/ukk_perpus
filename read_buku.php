<?php
    // Include file koneksi database
    include "koneksi.php";

    // Query untuk mengambil data buku
    $query = "SELECT * FROM buku";
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
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Buku</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                // Loop untuk menampilkan data buku
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . $row['tahun_terbit'] . "</td>";
                    // Memeriksa apakah 'kategori' ada dalam data
                    if (isset($row['kategori'])) {
                        echo "<td>" . $row['kategori'] . "</td>";
                    } else {
                        echo "<td>Tidak Ada Kategori</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
