<h2><?= anchor('operator/post', '+ Admin') ?></h2>
<table class="table">
    <tr>
        <th>No</th>
        <th>Nama lengkap</th>
        <th>Username</th>
        <th>Last Login</th>
        <th colspan="2">Action</th>
    </tr>

    <?php $no = 1 ?>
    <?php foreach ($operator as $op) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td> <?= $op['nama_lengkap']; ?> </td>
            <td> <?= $op['username']; ?> </td>
            <td> <?= $op['last_login']; ?> </td>
            <td><?= anchor('operator/edit/' . $op['operator_id'], 'Edit') ?></td>
            <td><?= anchor('operator/delete/' . $op['operator_id'], 'Delete') ?></td>

        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>

</table>