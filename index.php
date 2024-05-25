<?php
include_once('koneksi.php');

if (isset($_GET['query'])) {
    $cari = $_GET['query'];
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE nama_barang LIKE '%$cari%'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM barang");
}
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Barang</title>
</head>
<body>
    <nav class="bg-green-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg"><a href="index.php">KIOS KY PURO</a></div>
            <div>
            <form action="index.php" method="GET">
                <input type="text" name="query" placeholder="Masukkan Nama Barang..." class="border px-4 py-2 rounded inline-block mb-1">
                <button type="submit" class="bg-yellow-500 hover:bg-white-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Cari</button>
            </form>
            </div>
            <div>
                <a href="tambah-data.php" class="bg-yellow-500 hover:bg-white-700
                            text-white font-bold py-2 px-4 rounded inline-block mb-1">Tambah Data</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-5">Data Barang</h1><br>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Kode Barang</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Kategori Barang</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Expire</th>
                    <th class="border px-4 py-2">Harga Barang</th>
                    <th class="border px-4 py-2">Deskripsi Barang</th>
                    <th class="border px-4 py-2">Tanggal Masuk</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($query)) :
                ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $no ?></td>
                        <td class="border px-4 py-2"><?= $data['kode_barang'] ?></td>
                        <td class="border px-4 py-2"><?= $data['nama_barang'] ?></td>
                        <td class="border px-4 py-2"><?= $data['kategori_barang'] ?></td>
                        <td class="border px-4 py-2"><?= $data['stok'] ?></td>
                        <td class="border px-4 py-2"><?= $data['expire'] ?></td>
                        <td class="border px-4 py-2"><?= $data['harga_barang'] ?></td>
                        <td class="border px-4 py-2"><?= $data['deskripsi'] ?></td>
                        <td class="border px-4 py-2"><?= $data['tanggal_masuk'] ?></td>
                        <td class="border px-4 py-2"><?= $data['status'] ?></td>
                        <td class="border px-4 py-2">
                            <a href="detail.php?id=<?= $data['id'] ?>" class="bg-green-500 hover:bg-green-700
                            text-white font-bold py-2 px-4 rounded inline-block mb-1">Detail</a>
                            <a href="edit.php?id=<?= $data['id'] ?>" class="bg-yellow-500 hover:bg-yellow-700
                            text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                            <a href="hapus.php?id=<?= $data['id'] ?>" class="bg-red-500 hover:bg-red-700
                            text-white font-bold py-2 px-4 rounded inline-block mb-1" onclick="return confirm
                            ('Yakin Ingin Menghapus Data ini?')">Delete</a>
                         </td>
                    </tr>
                <?php
                $no++;
                endwhile;
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>