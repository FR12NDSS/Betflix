<?php
class Betflix
{
	public $agent = "b42ppk88";
	public $x_api_betflix = "JBREtz1aO6eGSHTl";
	public $apikey = "89de9112d242dab79c06c734836cb76f";

	public function __construct()
	{
		require $_SERVER["DOCUMENT_ROOT"].'/connectdb.php';
		$sql = "SELECT * FROM setting ORDER BY id DESC LIMIT 1 ";
		$res = $con->query($sql);
		$row = $res->fetch_assoc();
		extract($row);
		$this->agent = $agent;
		$this->x_api_betflix = $pass_agent;
		$this->apikey = $txtTotal;
	}

	public function Balance($username = null)
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/user/balance',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'username=' . $username,
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function agentinfo()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/agent/balance?upline=' . $this->agent . '?ss=' . rand(1000, 9999),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function register($username = null, $password = null)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/user/register',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'username=' . $username . '&password=' . $password,
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function turnover($username = null)
	{
		date_default_timezone_set("Asia/Bangkok");
		$start_date = date('Y-m-d');
		$end_date = date('Y-m-d');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/report/summary?start=' . $start_date . '&end=' . $end_date . '&username=' . $username,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function withdraw($username = null, $credit = null)
	{

		$ran = time();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/user/transfer',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'username=' . $username . '&amount=-' . $credit . '&ref=with' . $ran,
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function deposit($username = null, $credit = null)
	{
		$ran = time();
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/user/transfer',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'username=' . $username . '&amount=' . $credit . '&ref=dps' . $ran,
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	public function login($username = null)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.bfx.fail/v4/play/login',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'username=' . $username,
			CURLOPT_HTTPHEADER => array(
				'x-api-betflix: ' . $this->x_api_betflix,
				'x-api-key: ' . $this->apikey,
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}
}
