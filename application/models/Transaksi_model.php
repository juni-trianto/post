<?php

class Transaksi_model extends CI_Model
{

    public function simpan_barang()
    {
        $nama_barang = $this->input->post('barang');
        $qty         = $this->input->post('qty');
        $idbarang    = $this->db->get_where('barang', ['nama_barang'  => $nama_barang])->row_array();
        $data        = [
            'barang_id' => $idbarang['barang_id'],
            'qty' => $qty,
            'harga' => $idbarang['harga'],
            'status' => '0'
        ];
        $this->db->insert('transaksi_detail', $data);
    }

    public function tampilkan_data()
    {
        $query = "SELECT transaksi_detail.detail_id, transaksi_detail.qty, transaksi_detail.harga, barang.nama_barang
                    FROM transaksi_detail INNER JOIN barang
                    on barang.barang_id = transaksi_detail.barang_id and transaksi_detail.status = '0'";

        return $this->db->query($query);
    }

    public function hapus_item($id)
    {
        $this->db->where('detail_id', $id);
        $this->db->delete('transaksi_detail');
        redirect('transaksi');
    }

    public function selesai($data)
    {
        $this->db->insert('transaksi', $data);
        $last_id =  $this->db->query("SELECT transaksi_id FROM transaksi ORDER BY transaksi_id  DESC")->row_array();
        $this->db->query("UPDATE transaksi_detail SET transaksi_id ='" . $last_id['transaksi_id'] . "'   WHERE status = '0' ");
        $this->db->query("UPDATE transaksi_detail SET status = '1' WHERE status = '0' ");
    }

    public function laporan_default()
    {
        $query = "SELECT transaksi.tanggal_transaksi, operator.nama_lengkap, SUM(transaksi_detail.harga*transaksi_detail.qty) AS total
                    FROM transaksi , transaksi_detail, operator
                    WHERE transaksi_detail.transaksi_id = transaksi.transaksi_id
                    AND operator.operator_id = transaksi.operator_id
                    GROUP BY transaksi.transaksi_id";
        return $this->db->query($query);
    }

    public function laporan_periode($tanggal1, $tanggal2)
    {
        $query = "SELECT transaksi.tanggal_transaksi, operator.nama_lengkap, SUM(transaksi_detail.harga*transaksi_detail.qty) AS total
                    FROM transaksi , transaksi_detail, operator
                    WHERE transaksi_detail.transaksi_id = transaksi.transaksi_id
                    AND operator.operator_id = transaksi.operator_id AND transaksi.tanggal_transaksi BETWEEN '$tanggal1' AND '$tanggal2'
                    GROUP BY transaksi.transaksi_id";
        return $this->db->query($query);
    }
}
