<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('view_dashboard');
        $this->load->view('templates/footer');
    }
}
