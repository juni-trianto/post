<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Barang_model', 'Transaksi_model']);
    }
    public function index()
    {

        if (isset($_POST['submit'])) {

            $this->Transaksi_model->simpan_barang();
            redirect('transaksi');
        } else {
            $data['title'] = 'transaksi';
            $data['barang'] = $this->Barang_model->tampil_data()->result_array();
            $data['detail'] = $this->Transaksi_model->tampilkan_data()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/form_transaksi', $data);
        }
    }

    public function hapus_item()
    {
        $id = $this->uri->segment(3);
        $this->Transaksi_model->hapus_item($id);
    }

    public function selesai()
    {
        $tanggal = date('d-m-y');
        $user = $this->session->userdata('username');
        $id_op = $this->db->get_where('operator', ['username' => $user])->row_array();
        $id_op = $id_op['operator_id'];
        $data = ['operator_id' => $id_op, 'tanggal_transaksi' => $tanggal];
        $this->Transaksi_model->selesai($data);
        redirect('transaksi');
    }

    public function laporan()
    {
        if (isset($_POST['submit'])) {
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['title'] = 'Laporan Transaksi';
            $data['record'] = $this->Transaksi_model->laporan_periode($tanggal1, $tanggal2)->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/laporan', $data);
        } else {
            $data['title'] = 'Laporan Transaksi';
            $data['record'] = $this->Transaksi_model->laporan_default()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('transaksi/laporan', $data);
        }
    }

    public function excel()
    {
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=laporan_transaksi.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $data['record'] = $this->Transaksi_model->laporan_default()->result_array();
        $this->load->view('transaksi/laporan_excel', $data);
    }

    public function pdf()
    {
        $this->load->library('fpdf');
        $pdf = new FPDF('p', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'Laporan Transaksi');
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(12);
        $pdf->Cell(8, 8, '', '', 1);
        $pdf->Cell(10, 7, 'NO', 1, 0);
        $pdf->Cell(27, 7, 'Tanggal', 1, 0);
        $pdf->Cell(30, 7, 'Operator', 1, 0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1, 1);
        //tampilkan dari database 
        $data = $this->Transaksi_model->laporan_default()->result_array();
        $no = 1;
        $total = 0;
        foreach ($data as $d) {
            $pdf->SetFont('Arial', '', 'L');
            $pdf->Cell(10, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $d['tanggal_transaksi'], 1, 0);
            $pdf->Cell(30, 7, $d['nama_lengkap'], 1, 0);
            $pdf->Cell(38, 7, number_format($d['total']), 1, 1);
            $no++;
            $total = $total + $d['total'];
        }

        $pdf->Cell(67, 7, 'Total', 1, 0, 'C');
        $pdf->Cell(38, 7, number_format($total), 1, 0);

        $pdf->Output();
    }
}

// for video 27
