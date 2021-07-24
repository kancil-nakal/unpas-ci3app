<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        $data['jurusan'] = $this->Jurusan_model->getAllJurusan();

        //validation
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => '{field} tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric', array(
            'required' => '{field} tidak boleh kosong.',
            'numeric' => '{field} harus anggka'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => '{field} tidak boleh kosong.',
            'valid_email' => '{field} tidak sesuai'
        ));
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array(
            'required' => '{field} tidak boleh kosong.',
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $id);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = $this->Jurusan_model->getAllJurusan();
        // $data['jurusan'] = ['Akuntansi', 'Ilmu Hukum', 'Manajemen', 'Matematika', 'Pendidikan Pancasila dan Kewarganegaraan', 'Pendidikan Ekonomi', 'Sastra Indonesia', 'Sastra Inggris', 'Teknik Informatika', 'Teknik Industri', 'Teknik Elektro', 'Teknik Mesin', 'Teknik Kimia'];

        //validation
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => '{field} tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric', [
            'required' => '{field} tidak boleh kosong.',
            'numeric' => '{field} harus anggka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => '{field} tidak boleh kosong.',
            'valid_email' => '{field} tidak sesuai'
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', [
            'required' => '{field} tidak boleh kosong.',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }
}
