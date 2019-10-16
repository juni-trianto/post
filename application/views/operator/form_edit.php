<h3>Edit Data Operator</h3>

<form action="<?= base_url('operator/edit'); ?>" method="post">
    <table class="table">
        <input type="hidden" name="id" value="<?= $record['operator_id']; ?>">
        <tr>
            <td>Nama lengkap</td>
            <td><input class="form-control" type="text" name="nama" value="<?= $record['nama_lengkap']; ?>"> </td>
        </tr>

        <tr>
            <td>username</td>
            <td><input type="text" class="form-control" name="username" value="<?= $record['username']; ?>"> </td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" class="form-control" name="password"> </td>
        </tr>


        <tr>
            <td colspan="2"><button class="btn btn-primary" type="submit" name="submit">Simpan</button></td>
        </tr>

    </table>