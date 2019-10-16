<h3>form transaksi</h3>

<table class="table table-bordered">
    <form action="<?= base_url('transaksi'); ?>" method="post">


        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <input list="barang" class="form-control" name="barang" placeholder="nama barang..">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="qty" placeholder="Qty barang..">
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                    <a href="<?= base_url('transaksi/selesai'); ?>" class="btn btn-success">Selesai</a>
                </div>
            </div>
        </div>

    </form>
</table>

<br><br><br>

<table class="table table-bordere">
    <tr>
        <th colspan="6">Detail transaksi</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama barang</th>
        <th>Qty</th>
        <th>harga</th>
        <th>subtotal</th>
        <th>Cancel</th>
    </tr>


    <?php $no = 1;
    $total = 0;
    foreach ($detail as $d) : ?>
        <tr>

            <td><?= $no; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td><?= $d['qty']; ?></td>
            <td><?= number_format($d['harga']); ?></td>
            <td> <?= number_format($d['qty'] * $d['harga']); ?></td>
            <td><a href="<?= base_url('transaksi/hapus_item/') . $d['detail_id']; ?>">Hapus</a></td>
            <?php
                $total = $total + $d['qty'] * $d['harga'];
                $no++; ?>
        </tr>
    <?php endforeach; ?>
    <tr class="alert alert-primary">
        <td colspan="4"> Total </td>
        <td class="mx-auto" style="width: 200px;"><?= number_format($total);  ?></td>

    </tr>



</table>

<datalist id="barang">
    <?php foreach ($barang as $b) : ?>
        <option value="<?= $b['nama_barang']; ?>">
        <?php endforeach ?>
</datalist>