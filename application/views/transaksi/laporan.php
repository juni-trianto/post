<h3>Laporan Transaksi</h3>

<form action="<?= base_url('transaksi/laporan'); ?>" method="post">
    <table class="table table-bordered">
        <td>
            <div class="row">
                <div class="col-sm-4"><input type="text" class="form-control" name="tanggal1" placeholder="tanggal mulai.."></div>
                <div class="col-sm-4"><input type="text" class="form-control" name="tanggal2" placeholder="tanggal selesai.."></div>
                <div class="col-sm-3"><input type="submit" name="submit" value="submit" class="btn btn-primary"></div>
            </div>
        </td>
    </table>
</form>
<hr>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Tanggal Transaksi</th>
        <th>Operator</th>
        <th>Total Transaksi</th>
    </tr>


    <?php $no = 1;
    $total = 0;
    foreach ($record as $r) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $r['tanggal_transaksi']; ?></td>
            <td><?= $r['nama_lengkap'] ?></td>
            <td><?= $r['total']; ?></td>
        </tr>
    <?php $no++;
        $total = $total + $r['total'];
    endforeach; ?>

    <tr>
        <td colspan="3">Total</td>
        <td><?= $total; ?></td>
    </tr>

</table>