<?php
// controller siswa to http://akademik.d3mi.my.id/Api/biodata

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $this->load->view('template/header');
    $this->load->view('template/index');
    $this->load->view('template/footer');
  }
}

/* End of file Home.php */
