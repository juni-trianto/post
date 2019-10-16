<h3>Edit Data barang</h3>

<form action="<?= base_url('barang/edit'); ?>" method="post">
    <table class="table">
        <input type="hidden" name="barang_id" value="<?= $record['barang_id']; ?>" id="barang_id">
        <tr>
            <td>Nama barang</td>
            <td><input class="form-control" type="text" name="nama_barang" value="<?= $record['nama_barang']; ?>"> </td>
        </tr>

        <tr>
            <td>Kategori barang</td>
            <td><select name="kategori" id="kategori" class="form-control">
                    <?php foreach ($kategori as $k) { ?>
                        <option value="<?= $k['kategori_id']; ?>" <?= $record['kategori_id'] == $k['kategori_id'] ? 'selected' : ''; ?>> <?= $k['nama_kategori']; ?></option>
                    <?php  }; ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Harga</td>
            <td><input type="text" class="form-control" name="harga" value="<?= $record['harga']; ?>"> </td>
        </tr>

        <tr>
            <td colspan="2"><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
        </tr>

    </table>