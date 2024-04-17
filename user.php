<?php
// Include file koneksi ke database
include('koneksi.php');

// Query untuk mengambil data user
$query = "SELECT * FROM user";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <style>
        /* CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Daftar User</h1>
    <table>
        <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Level</th>
        </tr>
        <?php
        // Tampilkan data user dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['level'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
