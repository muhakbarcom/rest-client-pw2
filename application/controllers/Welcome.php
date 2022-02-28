<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// get
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://api.muhakbar.com/Api/film?WMM-KEY=2d63c36fe129f3e0eebb3bbd28c17c6a',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			// basic auth
			CURLOPT_USERPWD => 'admin@gmail.com:123',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json'
			),

		));

		$response = curl_exec($curl);

		curl_close($curl);

		// post
		// $uploadDir = "/assets/";
		// $RealTitleID = $_FILES['poster']['name'];
		// $poster = new CurlFile($_FILES['poster']['tmp_name'], 'file/exgpd', $RealTitleID);


		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'http://api.muhakbar.com/Api/film',
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'POST',
		// 	CURLOPT_POSTFIELDS => array('WMM-KEY' => '02f174c47c49c101c23e6e8ef0fafc46', 'id_homeproduction' => '1', 'judul' => 'Spider-Man: No Way Home', 'producer' => 'Amy Pascal', 'penulis_naskah' => 'Chris McKenna', 'musik' => 'Michael Giacchino', 'cimatografi' => 'Mauro Fiore', 'editor' => 'Jeffrey Ford', 'durasi' => '148 menit',  'bahasa' => 'Inggris', 'negara' => 'Amerika', 'rating' => 'PG-13', 'tahun_rilis' => '2021',  'poster' => $poster),


		// 	// basic auth
		// 	CURLOPT_USERPWD => 'akbar@gmail.com:123',
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);


		// put
		$uploadDir = "/assets/";
		$RealTitleID = $_FILES['poster']['name'];
		$poster = new CurlFile($_FILES['poster']['tmp_name'], 'file/exgpd', $RealTitleID);


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://localhost/pw2/rest-server-pw2',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => array('WMM-KEY' => '02f174c47c49c101c23e6e8ef0fafc46', 'id_homeproduction' => '1', 'judul' => 'Spider-Man: No Way Home', 'producer' => 'Amy Pascal', 'penulis_naskah' => 'Chris McKenna', 'musik' => 'Michael Giacchino', 'cimatografi' => 'Mauro Fiore', 'editor' => 'Jeffrey Ford', 'durasi' => '148 menit',  'bahasa' => 'Inggris', 'negara' => 'Amerika', 'rating' => 'PG-13', 'tahun_rilis' => '2021',  'poster' => $poster),


			// basic auth
			CURLOPT_USERPWD => 'akbar@gmail.com:123',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		exit;

		// del
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'http://api.muhakbar.com/Api/film',
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'DELETE',
		// 	CURLOPT_POSTFIELDS => 'id=1&WMM-KEY=02f174c47c49c101c23e6e8ef0fafc46',
		// 	CURLOPT_USERPWD => 'akbar@gmail.com:123',
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);

		// var_dump($response);
		exit;

		// $this->load->view('welcome_message');
	}

	public function coba()
	{
		$this->load->view('coba');
	}
}
