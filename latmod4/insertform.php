<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpro Mod4</title>
</head>
<body>
    <form method="post" action="insertdata.php">
        <table>
            <tr>
                <td><label for="nim">Nim</label></td>
                <td><input type="text" id="nim" name="nim" required></td>
            </tr>
            <tr>
                <td><label for="nama_depan">Nama</label></td>
                <td><input type="text" id="nama_depan" name="nama_depan" required></td>
            </tr>
            <tr>
                <td><label for="kodeprodi">Kode Prodi</label></td>
                <td><input type="text" id="kodeprodi" name="kodeprodi" required></td>
            </tr>
            <tr>
                <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                <td>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" id="submit" name="submit" value="Tambah">
    </form>
</body>
</html>