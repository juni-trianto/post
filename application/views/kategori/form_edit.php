<h3>Edit Data Kategori</h3>


<table class="table">
    <form action="<?= base_url('kategori/post'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $record['kategori_id']; ?>">
        <tr>
            <td>Nama Kategori</td>
            <td><input class="form-control" type="text" name="kategori" value="<?= $record['nama_kategori']; ?>"> </td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-success" type="submit" name="submit">Simpan</button></td>
        </tr>
    </form>

</table>