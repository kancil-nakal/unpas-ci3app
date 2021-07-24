<?php

class About extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'About';
        $this->load->view('templates/header');
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}
