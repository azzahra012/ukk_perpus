<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjam Buku</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* CSS untuk menyembunyikan tombol saat dicetak */
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Riwayat Peminjam Buku</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include file koneksi database
            include('koneksi.php');

            // Query SQL untuk mengambil data riwayat peminjam dari database
            $query = "SELECT peminjaman.*, buku.judul AS JudulBuku, user.username 
                      FROM peminjaman 
                      JOIN buku ON peminjaman.id_buku = buku.id_buku
                      JOIN user ON peminjaman.id_user = user.id_user";
            
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                die("Query SQL gagal dieksekusi: " . mysqli_error($koneksi));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['judul']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_peminjaman']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_pengembalian']); ?></td>
                    <td><?php echo htmlspecialchars($row['status_peminjaman']); ?></td>
                </tr>
                <?php
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>

    <!-- Tombol untuk mencetak tabel -->
    <button onclick="cetakTabel()">Cetak Tabel</button>

    <script>
        function cetakTabel() {
            window.print(); // Fungsi untuk mencetak halaman
        }
    </script>
</body>
</html>
