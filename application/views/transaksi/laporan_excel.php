    <h3>Laporan Transaksi</h3>

    <table style=" font-family: sans-serif;
    color: #232323;
    border-collapse: collapse; border: 1px solid #999;
    padding: 8px 20px">
        <tr>
            <th style=" border: 1px solid #999; padding: 8px 20px">No</th>
            <th style=" border: 1px solid #999; padding: 8px 20px">Tanggal Transaksi</th>
            <th style=" border: 1px solid #999; padding: 8px 20px">Operator</th>
            <th style=" border: 1px solid #999; padding: 8px 20px">Total Transaksi</th>
        </tr>


        <?php $no = 1;
        $total = 0;
        foreach ($record as $r) : ?>
            <tr>
                <td style=" border: 1px solid #999; padding: 8px 20px"><?= $no; ?></td>
                <td style=" border: 1px solid #999; padding: 8px 20px"><?= $r['tanggal_transaksi']; ?></td>
                <td style=" border: 1px solid #999; padding: 8px 20px"><?= $r['nama_lengkap'] ?></td>
                <td style=" border: 1px solid #999; padding: 8px 20px"><?= $r['total']; ?></td>
            </tr>
        <?php $no++;
            $total = $total + $r['total'];
        endforeach; ?>

        <tr>
            <td colspan="3" style=" border: 1px solid #999; padding: 8px 20px">Total</td>
            <td style=" border: 1px solid #999; padding: 8px 20px"><?= $total; ?></td>
        </tr>

    </table>