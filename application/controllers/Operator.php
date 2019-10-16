<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Operator_model');
    }
    public function index()
    {
        $data['title'] = 'operator';
        $data['operator'] = $this->Operator_model->tampil_data()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('operator/lihat_data', $data);
    }

    public function post()
    {
        if (isset($_POST['submit'])) {

            $nama = $this->input->post('nama', true);
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $data = ['nama_lengkap' => $nama, 'username' => $username, 'password' => md5($password)];
            $this->db->insert('operator', $data);
            redirect('operator');
        } else {
            $data['title'] = 'add operator';
            $this->load->view('templates/header', $data);
            $this->load->view('operator/form_input');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {

            $id     = $this->input->post('id', true);
            $nama = $this->input->post('nama', true);
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            if (empty($password)) {
                $data = ['nama_lengkap' => $nama, 'username' => $username];
            } else {
                $data = ['nama_lengkap' => $nama, 'username' => $username, 'password' => md5($password)];
            }

            $this->db->where('operator_id', $id);
            $this->db->update('operator', $data);

            redirect('operator');
        } else {
            $id = $this->uri->segment(3);
            $data['record'] = $this->Operator_model->get_one($id)->row_array();
            $data['title'] = 'edit operator';
            $this->load->view('templates/header', $data);
            $this->load->view('operator/form_edit', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->db->where('operator_id', $id);
        $this->db->delete('operator');
        redirect('operator');
    }
}

// video for 20
