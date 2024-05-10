<?php
class Matakuliah extends CI_Controller
{
 public function index()
 {
 $this->load->view('view-form-matakuliah');
 }
 public function cetak()
 {
    $this->load->library('form_validation');
    
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 'required|min_length[3]');
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required|min_length[3]');
        $this->form_validation->set_rules('sks', 'SKS', 'required');
    
        $this->form_validation->set_message('required', '%s harus diisi.');
        $this->form_validation->set_message('min_length', '%s terlalu pendek.');
    
        if ($this->form_validation->run() == false) {
            $this->load->view('view-form-matakuliah'); // Tampilkan kembali form matakuliah
        } else {
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];
            $this->load->view('view-data-matakuliah', $data);
        }
    }
}