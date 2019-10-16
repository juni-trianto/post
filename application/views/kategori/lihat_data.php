<h2 class="text-primary"><?= anchor('kategori/post', '+ Product') ?></h2>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($kategori as $kt) : ?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td> <?= $kt['nama_kategori']; ?> </td>
                <td><?= anchor('kategori/edit/' . $kt['kategori_id'], 'Edit') ?></td>
                <td><?= anchor('kategori/delete/' . $kt['kategori_id'], 'Delete') ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>