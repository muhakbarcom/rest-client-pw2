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
    $data = array(
      'button' => 'Create',
      'action' => site_url('siswa/create_action'),
      'nisn' => set_value('nisn'),
      'nama' => set_value('nama'),
      'tanggal_lahir' => set_value('tanggal_lahir'),
      'jenis_kelamin' => set_value('jenis_kelamin'),
      'agama' => set_value('agama'),
      'nama_ayah' => set_value('nama_ayah'),
      'nama_ibu' => set_value('nama_ibu'),
      'alamat' => set_value('alamat'),
      'hp' => set_value('hp'),
    );

    $this->load->view('template/header');
    $this->load->view('siswa/siswa_form', $data);
    $this->load->view('template/footer');
  }

  public function create_action()
  {
    $nisn = $this->input->post('nisn', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
    $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
    $agama = $this->input->post('agama', TRUE);
    $nama_ayah = $this->input->post('nama_ayah', TRUE);
    $nama_ibu = $this->input->post('nama_ibu', TRUE);
    $alamat = $this->input->post('alamat', TRUE);
    $hp = $this->input->post('hp', TRUE);

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
      CURLOPT_POSTFIELDS => array('nisn' => $nisn, 'nama' => $nama, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin, 'agama' => $agama, 'nama_ayah' => $nama_ayah, 'nama_ibu' => $nama_ibu, 'alamat' => $alamat, 'hp' => $hp, 'X-API-KEY' => 'ebb2bee24cc1212e69540889fda7d979'),


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

  public function update($id)
  {
    // get data by id from http://akademik.d3mi.my.id/Api/biodata
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

    // get response by id
    foreach ($response['data'] as $key => $value) {
      if ($value['id'] == $id) {
        $data = array(
          'button' => 'Update',
          'action' => site_url('siswa/update_action'),
          'id' => set_value('id', $value['id']),
          'nisn' => set_value('nisn', $value['nisn']),
          'nama' => set_value('nama', $value['nama']),
          'tanggal_lahir' => set_value('tanggal_lahir', $value['tanggal_lahir']),
          'jenis_kelamin' => set_value('jenis_kelamin', $value['jenis_kelamin']),
          'agama' => set_value('agama', $value['agama']),
          'nama_ayah' => set_value('nama_ayah', $value['nama_ayah']),
          'nama_ibu' => set_value('nama_ibu', $value['nama_ibu']),
          'alamat' => set_value('alamat', $value['alamat']),
          'hp' => set_value('hp', $value['hp']),
        );
      }
    }

    $this->load->view('template/header');
    $this->load->view('siswa/siswa_form', $data);
    $this->load->view('template/footer');
  }

  public function update_action()
  {
    $id = $this->input->post('id', TRUE); //hidden variable
    $nisn = $this->input->post('nisn', TRUE);
    $nama = $this->input->post('nama', TRUE);
    $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
    $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
    $agama = $this->input->post('agama', TRUE);
    $nama_ayah = $this->input->post('nama_ayah', TRUE);
    $nama_ibu = $this->input->post('nama_ibu', TRUE);
    $alamat = $this->input->post('alamat', TRUE);
    $hp = $this->input->post('hp', TRUE);

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
      CURLOPT_POSTFIELDS => "id=$id&nisn=$nisn&nama=$nama&tanggal_lahir=$tanggal_lahir&jenis_kelamin=$jenis_kelamin&agama=$agama&nama_ayah=$nama_ayah&nama_ibu=$nama_ibu&alamat=$alamat&hp=$hp&X-API-KEY=ebb2bee24cc1212e69540889fda7d979",
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
