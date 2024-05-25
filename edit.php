<?php
include_once('koneksi.php');
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM barang WHERE id = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['tambah'])) {
    $kodeBarang = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $kategori = $_POST['kategori_barang'];
    $stok = $_POST['stok'];
    $expire = $_POST['expire'];
    $harga = $_POST['harga_barang'];
    $deskripsi = $_POST['deskripsi'];
    $tgl = $_POST['tanggal_masuk'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE barang SET kode_barang = '$kodeBarang', nama_barang = '$nama', kategori_barang = '$kategori', stok = '$stok', expire = '$expire', harga_barang = '$harga', deskripsi = '$deskripsi', tanggal_masuk = '$tgl', status = '$status' WHERE id='$id'");
    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Barang</title>
</head>
<body>
    <nav class="bg-green-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg"><a href="index.php">KIOS KY PURO</a></div>
        <div>
    </nav>
    <div class="container mx-auto p-8">
        <form method="POST">
            <div class="mb-4">
                <h2 class="text-2xl font-bold mb-2">Edit Data Barang</h2>
                <p class="text-gray-500">Mohon isi Data dibawah ini dengan benar. </p>
            </div>

            <div class="mb-4">
                <label for="kode_barang" class="block text-gray-700 text-sm font-bold mb-2">Kode Barang:</label>
                <input type="text" id="kode_barang" name="kode_barang" class="border border-gray-300 rounded-md py-2 px-3 w-full" value="<?= $data['kode_barang'] ?>">
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="nama_barang" name="nama_barang" class="border border-gray-300 rounded-md py-2 px-3 w-full" value="<?= $data['nama_barang']?>">
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori Barang:</label>
                <input type="text" id="kategori-barang" name="kategori_barang" class="border border-gray-300
                rounded-md py-2 px-3w-full" value="<?= $data['kategori_barang']?>">
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok Barang:</label>
                <input type="text" id="stok" name="stok" class="border border-gray-300
                rounded-md py-2 px-3 w-full" value="<?= $data['stok']?>">
            </div>

            <div class="mb-4">
                <label for="expire" class="block text-gray-700 text-sm font-bold mb-2">Expire:</label>
                <input type="date" id="expire" name="expire" class="border border-gray-300
                rounded-md py-2 px-3 w-full" value="<?= $data['expire']?>":>
            </div>

            <div class="mb-4">
                <label for="harga_barang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang:</label>
                <input type="text" id="harga_barang" name="harga_barang" class="border border-gray-300 rounded-md py-2 px-3
                w-full" value="<?= $data['harga_barang']?>">
            </div>
            
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Barang:</label>
                <input type="text" id="deskripsi" name="deskripsi" class="border border-gray-300 rounded-md py-2 px-3
                w-full" value="<?= $data['deskripsi']?>">
            </div>

            <div class="mb-4">
                <label for="tanggal_masuk" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Barang Masuk:</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="border border-gray-300
                rounded-md py-2 px-3 w-full" value="<?= $data['tanggal_masuk']?>">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status Barang:</label>

                <div class="flex items-center mb-4">
                    <input type="radio" id="status" name="status" value="Ready" class="form-radio h-5 w-5
                    text-blue-600">
                    <label for="ready" class="ml-2">Ready</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" id="status" name="status" value="Sold Out" class="form-radio h-5 w-5
                    text-pink-600">
                    <label for="soldout" class="ml-2">Sold Out</label>
                </div>
            </div>
            
            <div>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" name="tambah">Edit</button>
                <a href="index.php" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4
                    rounded inline-block mb-1">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>