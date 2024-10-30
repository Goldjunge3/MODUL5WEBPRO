<?php
session_start(); 

if (!isset($_SESSION["barang"])) {
    $_SESSION["barang"] = [
        ["id" => 1, "nama" => "Buku", "kategori" => "Alat Tulis","harga" => 20000],
        ["id" => 2, "nama" => "Pulpen", "kategori" => "Alat Tulis","harga" => 5000]
    ];
}

$barang = $_SESSION["barang"];

// Fungsi create
if (isset($_POST["tambah"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];
    $barang[] = ["id" => $id,"nama" => $nama, "kategori" => $kategori,"harga" => $harga];
    $_SESSION["barang"] = $barang; 
}

// Program delete
if (isset($_POST["delete"])) {
    $index = $_POST["delete"];
    unset($barang[$index]); 
    $barang = array_values($barang); 
    $_SESSION["barang"] = $barang;
}

// Program edit
if (isset($_POST["edit"])) {
    $edit_index = $_POST["edit"];
    if (isset($barang[$edit_index])) {
        $id_edit = $barang[$edit_index]["id"];
        $nama_edit = $barang[$edit_index]["nama"];
        $kategori_edit = $barang[$edit_index]["kategori"];
        $harga_edit = $barang[$edit_index]["harga"];
    } else {
        echo "Indeks tidak valid.";
        exit; 
    }
}

// Menyimpan perubahan dari edit
if (isset($_POST["save_edit"])) {
    $index = $_POST["index"];
    $id = $_POST["id_edit"];
    $nama = $_POST["nama_edit"];
    $kategori = $_POST["kategori_edit"];
    $harga = $_POST["harga_edit"];
    if (isset($barang[$index])) {
        $barang[$index] = ["id" => $id,"nama" => $nama, "kategori" => $kategori,"harga" => $harga];
        $_SESSION["barang"] = $barang; 
    }
}
?>

<h3>Tambah Barang</h3>

<!-- Form untuk menambah barang -->
<form action="" method="POST">
    <table>
        <tr>
            <td><label for="id">ID:</label></td>
            
        </tr>
        <tr>
            <td><input type="number" name="id" id="id" required><br></td>
        </tr>
        <tr>
            <td><label for="nama">Nama Barang:</label></td>
            
        </tr>
        <tr>
            <td><input type="text" name="nama" id="nama" required><br></td>
        </tr>
        <tr>
            <td><label for="kategori">Kategori Barang:</label></td>
        </tr>
        <tr>
            <td><input type="text" name="kategori" id="kategori" required></td>
        </tr>
            <td><label for="harga">Harga Barang:</label></td>
        </tr>
        <tr>
            <td><input type="number" name="harga" id="harga" required></td>
        </tr>
        <tr>
            <td><input type="submit" name="tambah" value="Tambah barang"></td>
        </tr>
    </table>
</form>    

<!-- Tabel untuk menampilkan data barang -->
<?php

echo "<h3>Daftar Barang</h3>";
echo "<table border='1'>";
echo "<tr><th>ID</td><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Aksi</th></tr>";

foreach ($barang as $index => $b) {
    echo "<tr>";
    echo "<td>{$b["id"]}</td>";
    echo "<td>{$b["nama"]}</td>";
    echo "<td>{$b["kategori"]}</td>";
    echo "<td>{$b["harga"]}</td>";
    echo "<td>
            <form action='' method='POST' style='display:inline-block;'>
                <input type='hidden' name='edit' value='{$index}'>
                <input type='submit' value='Edit'>
            </form>

           <form action='' method='POST' style='display:inline-block;'>
                <input type='hidden' name='delete' value='<?php echo $index; ?>'>
                <input type='submit' value='Hapus' onclick='return confirm('Apakah Anda yakin ingin menghapus?');'>
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
                <td><label for="id_edit">ID</label></td>
                <td><input type="number" name="id_edit" value="<?php echo $id_edit; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nama_edit">Nama barang:</label></td>
                <td><input type="text" name="nama_edit" value="<?php echo $nama_edit; ?>" required></td>
            </tr>

            <tr>
                <td><label for="kategori_edit">Kategori Barang:</label></td>
                <td><input type="text" name="kategori_edit" value="<?php echo $kategori_edit;?>" required></td>
            </tr>

            <tr>
                <td><label for="harga_edit">Harga Barang:</label></td>
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