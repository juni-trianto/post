<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }
    public function index()
    {
        $data['title'] = 'Barang';
        $data['record'] = $this->Barang_model->tampil_data()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('barang/tampil_data', $data);
    }

    public function tambah()
    {
        if (isset($_POST['submit'])) {

            $nama_barang = $this->input->post('nama_barang');
            $kategori    = $this->input->post('kategori');
            $harga    = $this->input->post('harga');
            $data = ['nama_barang' => $nama_barang, 'kategori_id' => $kategori, 'harga' => $harga];
            $this->Barang_model->post($data);
            redirect('barang');
        } else {
            $data['title'] = 'tambah Barang';
            $this->load->model('kategori_model');
            $data['kategori'] = $this->kategori_model->tampilkan_data()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('barang/form_input', $data);
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('barang_id');
            $nama_barang = $this->input->post('nama_barang');
            $kategori    = $this->input->post('kategori');
            $harga    = $this->input->post('harga');
            $data = ['nama_barang' => $nama_barang, 'kategori_id' => $kategori, 'harga' => $harga];
            $this->Barang_model->edit($data, $id);
            redirect('barang');
        } else {
            $data['title'] = ' edit Barang';
            $id = $this->uri->segment(3);
            $this->load->model('kategori_model');
            $data['kategori'] = $this->kategori_model->tampilkan_data()->result_array();
            $data['record'] = $this->Barang_model->get_one($id)->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('barang/form_edit', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->Barang_model->delete($id);
        redirect('barang');
    }
}
// for video 16
