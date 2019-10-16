<?php
class Barang_model extends CI_Model
{

    public function tampil_data()
    {
        $query = "SELECT barang.barang_id, barang.kategori_id,barang.nama_barang, barang.harga, kategori_barang.nama_kategori
                  FROM barang LEFT JOIN kategori_barang
                  ON barang.kategori_id=kategori_barang.kategori_id";
        return $this->db->query($query);
    }

    public function post($data)
    {
        $this->db->insert('barang', $data);
    }

    public function get_one($id)
    {
        $param = ['barang_id' => $id];
        return $this->db->get_where('barang', $param);
    }

    public function edit($data, $id)
    {
        $this->db->where('barang_id', $id);
        $this->db->update('barang', $data);
    }

    public function delete($id)
    {
        $this->db->where('barang_id', $id);
        $this->db->delete('barang');
    }
}
