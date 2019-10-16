<?php
class Kategori_model extends CI_Model
{
    public function tampilkan_data()
    {
        return $this->db->get('kategori_barang');
    }

    public function post()
    {
        $kategori = ['nama_kategori' => $this->input->post('kategori')];
        $this->db->insert('kategori_barang', $kategori);
    }

    public function edit()
    {
        $kategori = ['nama_kategori' => $this->input->post('kategori')];
        $this->db->where('kategori_id', $this->input->post('id'));
        $this->db->update('kategori_barang', $kategori);
    }

    public function get_one($id)
    {
        $param = ['kategori_id' => $id];
        return $this->db->get_where('kategori_barang', $param);
    }

    public function delete($id)
    {
        $this->db->where('kategori_id', $id);
        $this->db->delete('kategori_barang');
    }
}
