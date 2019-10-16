<h3>Tambah Data Kategori</h3>

<table class="table">
    <form action="<?= base_url('kategori/post'); ?>" method="post">

        <tr>
            <td>Nama Kategori</td>
            <td><input class="form-control" type="text" name="kategori"> </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
        </tr>
    </form>

</table>