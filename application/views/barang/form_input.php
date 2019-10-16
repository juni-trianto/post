<h3>Tambah Data barang</h3>

<form action="<?= base_url('barang/tambah'); ?>" method="post">
    <table class="table">

        <tr>
            <td>Nama barang</td>
            <td><input class="form-control" type="text" name="nama_barang"> </td>
        </tr>

        <tr>
            <td>Kategori barang</td>
            <td><select name="kategori" id="kategori" class="form-control">
                    <?php foreach ($kategori as $k) { ?>
                        <option value="<?= $k['kategori_id']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php  }; ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Harga</td>
            <td><input class="form-control" type="text" name="harga"> </td>
        </tr>

        <tr>
            <td colspan="2"><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
        </tr>

    </table>