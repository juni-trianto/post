<h2 class="text-primary"><?= anchor('barang/tambah', '+ Barang'); ?></h2>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>kategori barang</th>
            <th>harga</th>
            <th colspan="2">operasi</th>
        </tr>
    </thead>

    <?php $no = 1;
    foreach ($record as $r) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $r['nama_barang']; ?></td>
            <td><?= $r['nama_kategori']; ?></td>
            <td><?= number_format($r['harga']); ?></td>
            <td> <?= anchor('barang/edit/' . $r['barang_id'], 'Edit'); ?> </td>
            <td> <?= anchor('barang/delete/' . $r['barang_id'], 'Delete'); ?> </td>
        </tr>
    <?php $no++;
    endforeach; ?>

</table>