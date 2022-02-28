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

    public function read($id)
    {
        // get data by id from http://akademik.d3mi.my.id/Api/biodata
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
        // var_dump($response);
        // exit;

        // get response by id
        foreach ($response['data'] as $key => $value) {
            if ($value['id_guru'] == $id) {
                $data = array(
                    'id_guru' => $value['id_guru'],
                    'nip' => $value['nip'],
                    'nama' => $value['nama'],
                    'tanggal_lahir' => $value['tanggal_lahir'],
                    'jenis_kelamin' => $value['jenis_kelamin'],
                    'agama' => $value['agama'],
                    'pendidikan_terakhir' => $value['pendidikan_terakhir'],
                    'golongan' => $value['golongan'],
                    'alamat' => $value['alamat'],
                    'hp' => $value['hp'],
                );
            }
        }

        $response = array(
            'data' => $data,
        );

        $this->load->view('template/header');
        $this->load->view('guru/read', $response);
        $this->load->view('template/footer');
    }

    public function create()
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('guru/create_action'),
            'nip' => set_value('nip'),
            'nama' => set_value('nama'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'agama' => set_value('agama'),
            'pendidikan_terakhir' => set_value('pendidikan_terakhir'),
            'golongan' => set_value('golongan'),
            'alamat' => set_value('alamat'),
            'hp' => set_value('hp'),
        );
        $this->load->view('template/header');
        $this->load->view('guru/guru_form', $data);
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
        $agama = $this->input->post('agama', TRUE);
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir', TRUE);
        $golongan = $this->input->post('golongan', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $hp = $this->input->post('hp', TRUE);

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
            CURLOPT_POSTFIELDS => array('nip' => $nip, 'nama' => $nama, 'tanggal_lahir' => $tanggal_lahir, 'jenis_kelamin' => $jenis_kelamin, 'agama' => $agama, 'pendidikan_terakhir' => $pendidikan_terakhir, 'golongan' => $golongan, 'alamat' => $alamat, 'hp' => $hp, 'X-API-KEY' => 'ebb2bee24cc1212e69540889fda7d979'),

            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',
        ));

        $response = curl_exec($curl);
        // decode response
        $response = json_decode($response, true);

        curl_close($curl);

        // if response status true, then redirect to index. if false, then show error flashdata
        if ($response['status'] == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal ditambahkan!</div>');
            redirect(base_url('guru/create'));
        }
    }

    public function update($id)
    {
        // get data by id from http://akademik.d3mi.my.id/Api/biodata
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

        // get response by id
        foreach ($response['data'] as $key => $value) {
            if ($value['id_guru'] == $id) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('guru/update_action'),
                    'id_guru' => set_value('id', $value['id_guru']),
                    'nip' => set_value('nip', $value['nip']),
                    'nama' => set_value('nama', $value['nama']),
                    'tanggal_lahir' => set_value('tanggal_lahir', $value['tanggal_lahir']),
                    'jenis_kelamin' => set_value('jenis_kelamin', $value['jenis_kelamin']),
                    'agama' => set_value('agama', $value['agama']),
                    'pendidikan_terakhir' => set_value('pendidikan_terakhir', $value['pendidikan_terakhir']),
                    'golongan' => set_value('golongan', $value['golongan']),
                    'alamat' => set_value('alamat', $value['alamat']),
                    'hp' => set_value('hp', $value['hp']),
                );
            }
        }

        $this->load->view('template/header');
        $this->load->view('guru/guru_form', $data);
        $this->load->view('template/footer');
    }

    public function update_action()
    {
        $id = $this->input->post('id_guru', TRUE); //hidden variable
        $nip = $this->input->post('nip', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
        $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
        $agama = $this->input->post('agama', TRUE);
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir', TRUE);
        $golongan = $this->input->post('golongan', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $hp = $this->input->post('hp', TRUE);

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
            CURLOPT_POSTFIELDS => "id_guru=$id&nip=$nip&nama=$nama&tanggal_lahir=$tanggal_lahir&jenis_kelamin=$jenis_kelamin&agama=$agama&pendidikan_terakhir=$pendidikan_terakhir&golongan=$golongan&alamat=$alamat&hp=$hp&X-API-KEY=ebb2bee24cc1212e69540889fda7d979",
            // basic auth
            CURLOPT_USERPWD => 'nazzilla:123',

        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // decode response
        $response = json_decode($response, true);
        // var_dump($response);
        // exit;

        // if response status true, then redirect to index. if false, then show error flashdata
        if ($response['status'] == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>');
            redirect(base_url('guru/update/' . $id));
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
            CURLOPT_POSTFIELDS => "X-API-KEY=ebb2bee24cc1212e69540889fda7d979&id_guru=$id",
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
