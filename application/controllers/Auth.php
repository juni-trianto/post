<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Operator_model');
    }
    public function index()
    {
        if (isset($_POST['submit'])) {
            // proses data
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $chek = $this->Operator_model->login($username, $password);
            if ($chek == 1) {
                //kondisi ok berhasil
                $this->db->where('username', $username);
                $this->db->update('operator', ['last_login' => date('d-m-y')]);
                $this->session->set_userdata(['status_login' => 'oke', 'username' => $username]);
                redirect('dashboard');
            } else {
                $this->load->view('auth/login');
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('auth');
    }
}
