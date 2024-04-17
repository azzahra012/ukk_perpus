<?php
    // Include file koneksi database
    include "koneksi.php";

    // Query untuk mengambil data ulasan
    $query = "SELECT * FROM ulasan";
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
    <title>Daftar Ulasan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Ulasan</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengulas</th>
                <th>Ulasan</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                // Loop untuk menampilkan data ulasan
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['ulasan'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
