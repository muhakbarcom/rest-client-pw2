<?php
// controller siswa to http://akademik.d3mi.my.id/Api/biodata

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  public function index()
  {
    // get
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/biodata?X-API-KEY=ebb2bee24cc1212e69540889fda7d979',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      // basic auth
      CURLOPT_USERPWD => 'akbar:123',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json'
      ),

    ));

    $response = curl_exec($curl);

    curl_close($curl);

    // decode response
    $response = json_decode($response, true);

    $this->load->view('template/header');
    $this->load->view('siswa/index', $response, FALSE);
    $this->load->view('template/footer');
  }

  public function create()
  {
    $this->load->view('template/header');
    $this->load->view('siswa/siswa_form');
    $this->load->view('template/footer');
  }

  public function create_action()
  {
    // post
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/biodata',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('nisn' => '12345', 'nama' => 'akbar', 'tanggal_lahir' => '05 September 1999', 'jenis_kelamin' => 'l', 'agama' => 'Islam', 'nama_ayah' => 'Supriyadi', 'nama_ibu' => 'Puji Les', 'alamat' => 'Purworejo', 'hp' => '12345', 'X-API-KEY' => 'ebb2bee24cc1212e69540889fda7d979'),


      // basic auth
      CURLOPT_USERPWD => 'akbar:123',
    ));

    $response = curl_exec($curl);
    // decode response
    $response = json_decode($response, true);

    curl_close($curl);

    // if response status true, then redirect to index. if false, then show error flashdata
    if ($response['status'] = true) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
      redirect(base_url('siswa'));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan!</div>');
      redirect(base_url('siswa/create'));
    }
  }

  public function update()
  {
    $this->load->view('template/header');
    $this->load->view('siswa/siswa_form');
    $this->load->view('template/footer');
  }

  public function update_action($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/biodata',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => "id=$id&nisn=2193018&nama=tegar%20nova%20silviana&tanggal_lahir=blora%2C%208%20november%202001&jenis_kelamin=peremuan&agama=islam&nama_ayah=winarto&nama_ibu=jamiatun&alamat=blora&hp=081315028860&X-API-KEY=ebb2bee24cc1212e69540889fda7d979",
      // basic auth
      CURLOPT_USERPWD => 'akbar:123',

    ));

    $response = curl_exec($curl);

    curl_close($curl);

    // decode response
    $response = json_decode($response, true);

    // if response status true, then redirect to index. if false, then show error flashdata
    if ($response['status'] = true) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
      redirect(base_url('siswa'));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>');
      redirect(base_url('siswa/update'));
    }
  }

  public function delete($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/biodata',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_POSTFIELDS => "X-API-KEY=ebb2bee24cc1212e69540889fda7d979&id=$id",
      // basic auth
      CURLOPT_USERPWD => 'akbar:123',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response, true);
    // if response status true, then redirect to index. if false, then show error flashdata
    if ($response['status'] = true) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
      redirect(base_url('siswa'));
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
      redirect(base_url('siswa'));
    }
  }
}

/* End of file Siswa.php */
