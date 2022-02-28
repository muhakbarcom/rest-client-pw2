<?php
// controller guru to http://akademik.d3mi.my.id/Api/guru

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function index()
    {
        // get
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/guru?X-API-KEY=ebb2bee24cc1212e69540889fda7d979',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',
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
        $this->load->view('guru/index', $response, FALSE);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('template/header');
        $this->load->view('guru/guru_form');
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        // post
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/guru',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('nip' => '213567', 'nama' => 'cecep', 'tanggal_lahir' => 'bandung, 6 juni 1980', 'jenis_kelamin' => 'laki-laki', 'agama' => 'islam', 'pendidikan_terakhir' => 'S1 teknik industri', 'golongan' => '2a', 'alamat' => 'bandung', 'hp' => '08765423145', 'X-API-KEY' => 'ebb2bee24cc1212e69540889fda7d979'),

            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',
        ));

        $response = curl_exec($curl);
        // decode response
        $response = json_decode($response, true);

        curl_close($curl);

        // if response status true, then redirect to index. if false, then show error flashdata
        if ($response['status'] = true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan!</div>');
            redirect(base_url('guru/create'));
        }
    }

    public function update()
    {
        $this->load->view('template/header');
        $this->load->view('guru/guru_form');
        $this->load->view('template/footer');
    }

    public function update_action($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/guru',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => "id_guru=$id&nip=9279483&nama=CECEP&tanggal_lahir=bandung%2C%206%20juni%201980&jenis_kelamin=laki-laki&agama=islam&pendidikan_terakhir=S1%20teknik%20industri&golongan=3a&alamat=bandung&hp=0993892748&X-API-KEY=ebb2bee24cc1212e69540889fda7d979",
            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',

        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // decode response
        $response = json_decode($response, true);

        // if response status true, then redirect to index. if false, then show error flashdata
        if ($response['status'] = true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>');
            redirect(base_url('guru/update'));
        }
    }

    public function delete($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://akademik.d3mi.my.id/Api/guru',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => "X-API-KEY=ebb2bee24cc1212e69540889fda7d979&id=$id",
            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);
        // if response status true, then redirect to index. if false, then show error flashdata
        if ($response['status'] = true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
            redirect(base_url('guru'));
        }
    }
}

/* End of file guru.php */
