<h3>Tambah Data Kategori</h3>

<form action="<?= base_url('operator/post'); ?>" method="post">
    <table class="table">

        <tr>
            <td>Nama Lengkap</td>
            <td><input class="form-control" type="text" name="nama"> </td>
        </tr>

        <tr>
            <td>Username</td>
            <td><input class="form-control" type="text" name="username"> </td>
        </tr>

        <tr>
            <td>password</td>
            <td><input class="form-control" type="password" name="password"> </td>
        </tr>

        <tr>
            <td colspan="2"><button class="btn btn-primary" type="submit" name="submit">Simpan</button></td>
        </tr>

    </table>