<?php
session_start(); // Memulai session

// Cek apakah session barang sudah ada, jika tidak, buat array kosong
if (!isset($_SESSION['barang'])) {
    $_SESSION['barang'] = [
        ["id" => "1", "nama" => "laptop", "kategori" => "elektronik", "harga" => 20000],
        ["id" => "2", "nama" => "buku", "kategori" => "edukasi", "harga" => 5000]
    ];
}

// Menyimpan session barang ke variabel $barang untuk memudahkan akses
$barang = $_SESSION["barang"];

// Fungsi create (menambah barang baru)
if (isset($_POST["create"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];

    // Menambah barang baru ke array
    $barang[] = ["id" => $id, "nama" => $nama, "kategori" => $kategori, "harga" => $harga];
    $_SESSION["barang"] = $barang; // Update session dengan data terbaru
}

// Program delete
if (isset($_POST["delete"])) {
    $index = $_POST["delete"];
    unset($barang[$index]); // Menghapus elemen berdasarkan index
    $barang = array_values($barang); // Mengatur ulang index array
    $_SESSION["barang"] = $barang; // Update session dengan data terbaru
}

// Program edit
if (isset($_POST["edit"])) {
    $edit_index = $_POST["edit"];

    // Pastikan indeks yang diakses ada dalam array
    if (isset($barang[$edit_index])) {
        $nama_edit = $barang[$edit_index]["nama"];
        $kategori_edit = $barang[$edit_index]["kategori"];
        $harga_edit = $barang[$edit_index]["harga"];
    } else {
        echo "Indeks tidak valid.";
        exit; // Menghentikan eksekusi jika indeks tidak valid
    }
}

// Menyimpan perubahan dari edit
if (isset($_POST["save_edit"])) {
    $index = $_POST["index"];
    $nama = $_POST["nama_edit"];
    $kategori = $_POST["kategori_edit"];
    $harga = $_POST["harga_edit"];

    // Menyimpan perubahan
    $barang[$index]["nama"] = $nama;
    $barang[$index]["kategori"] = $kategori;
    $barang[$index]["harga"] = $harga;
    $_SESSION["barang"] = $barang; // Update session dengan data terbaru
}
?>

<!-- Form untuk menambah barang -->
<form action="" method="POST">
    <table>
        <tr>
            <td><label for="id">ID:</label></td>
        </tr>

        <tr>
            <td><input type="text" name="id" required></td>
        </tr>

        <tr>
            <td><label for="nama">Nama Barang:</label></td>
        </tr>

        <tr>
            <td><input type="text" name="nama" id="nama" required></td>
        </tr>

        <tr>
            <td><label for="kategori">Kategori Barang:</label></td>
        </tr>

        <tr>
            <td><input type="text" name="kategori" id="kategori" required></td>
        </tr>

        <tr>
            <td><label for="harga">Harga:</label></td>
        </tr>

        <tr>
            <td><input type="number" name="harga" id="harga" required></td>
        </tr>

        <tr>
            <td><input type="submit" name="create" value="Tambah barang"></td>
        </tr>
    </table>
</form>

<!-- Tabel untuk menampilkan data barang -->
<?php
echo "<h4>Daftar Barang</h4>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Aksi</th><th>Edit</th></tr>";

foreach ($barang as $index => $b) {
    echo "<tr>";
    echo "<td>{$b["id"]}</td>";
    echo "<td>{$b["nama"]}</td>";
    echo "<td>{$b["kategori"]}</td>";
    echo "<td>{$b["harga"]}</td>";
    echo "<td>
            <form action='' method='POST' style='display:inline-block;'>
                <input type='hidden' name='delete' value='{$index}'>
                <input type='submit' value='Hapus'>
            </form>
         </td>";

    echo "<td>
             <form action='' method='POST' style='display:inline-block;'>
                <input type='hidden' name='edit' value='{$index}'>
                <input type='submit' value='Edit'>
            </form>
         </td>";       
    echo "</tr>";
}
echo "</table>";

// Menampilkan form edit jika tombol edit diklik
if (isset($edit_index)) {
?>

    <h4>Edit Barang</h4>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nama_edit">Nama barang:</label></td>
                <td><input type="text" name="nama_edit" value="<?php echo $nama_edit; ?>" required></td>
            </tr>

            <tr>
                <td><label for="kategori_edit">Kategori Barang:</label></td>
                <td><input type="text" name="kategori_edit" value="<?php echo $kategori_edit;?>" required></td>
            </tr>

            <tr>
                <td><label for="harga_edit">Harga:</label></td>
                <td><input type="number" name="harga_edit" value="<?php echo $harga_edit;?>" required></td>
            </tr>

            <tr>
                <td><input type="hidden" name="index" value="<?php echo $edit_index; ?>"></td>
                <td><input type="submit" name="save_edit" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
<?php
}
?>