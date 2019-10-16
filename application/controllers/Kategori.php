<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }
    public function index()
    {
        $data['title'] = 'kategori';
        $data['kategori'] = $this->kategori_model->tampilkan_data()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/lihat_data', $data);
    }

    public function post()
    {
        if (isset($_POST['submit'])) {

            //proses kategori
            $this->kategori_model->post();
            redirect('kategori');
        } else {
            $data['title'] = 'Add product';
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/form_input');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {

            //proses kategori
            $this->kategori_model->post();
            redirect('kategori');
        } else {
            $id = $this->uri->segment(3);
            $data['record'] = $this->kategori_model->get_one($id)->row_array();
            $data['title'] = 'edit kategori';
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/form_edit', $data);
        }
    }

    public function delete()
    {
        $id =  $this->uri->segment(3);
        $this->kategori_model->delete($id);
        redirect('kategori');
    }
}
