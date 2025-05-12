<?php

class Scb
{
	private $deviceId = '1986bc49-61dc-d3a6-ed30-5edea70f4539';
	private $pin      = '210266';
	public $status      = true;
	private $accnum   = '8842559912';
	private $versionScb = 'Android/11;FastEasy/3.63.0/6637';
	private $api_pin  = 'https://scb.mskids.me/pin/encrypt';

	public function __construct()
	{
		require $_SERVER["DOCUMENT_ROOT"] . '/connectdb.php';
		$sql = "SELECT * FROM `bank` WHERE `name_bank` LIKE 'ธนาคารไทยพาณิชย์' AND `status_bank` LIKE 'เปิด' ORDER BY id DESC LIMIT 1";
		$res = $con->query($sql);
		$row = $res->fetch_assoc();
		if (empty($row)) {
			return json_encode(['status' => false, 'msg' => 'SCB Close']);
		}		
		if ($status_bank == 'ปิด') {
			return json_encode(['status' => false, 'msg' => 'SCB Close']);
		}
		$this->status = true;
		extract($row);
		$this->deviceId = $device;
		$this->pin = $pin_bank;
		$this->accnum = $bankacc_bank;
	}

	public function Curl($method, $url, $header, $data, $cookie)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->versionScb);
		//curl_setopt($ch, CURLOPT_USERAGENT, 'okhttp/3.8.0');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		//curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
		if ($data) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		if ($cookie) {
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		}
		return curl_exec($ch);
	}

	public function Login()
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL            => 'https://fasteasy.scbeasy.com:8443/v3/login/preloadandresumecheck',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_HEADER         => 1,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => '{"deviceId":"' . $this->deviceId . '","jailbreak":"0","tilesVersion":"39","userMode":"INDIVIDUAL"}',
			CURLOPT_HTTPHEADER     => array(
				'Accept-Language: th',
				'scb-channel: APP',
				'user-agent: ' . $this->versionScb,
				'Content-Type:  application/json; charset=UTF-8',
				'Host:  fasteasy.scbeasy.com:8443',
				'Connection:  close',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);


		//print_r($response);die();

		preg_match_all('/(?<=Api-Auth: ).+/', $response, $Auth);
		$Auth = $Auth[0][0];
		//print_r($Auth);die;
		if ($Auth == "") {
			exit(json_encode(array("status" => 500, "error" => true, "message" => "Auth error")));
		}

		$curl1 = curl_init();

		curl_setopt_array($curl1, array(
			CURLOPT_URL            => 'https://fasteasy.scbeasy.com/isprint/soap/preAuth',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => '{"loginModuleId":"PseudoFE"}',
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth: ' . $Auth,
				'Content-Type: application/json',
			),
		));

		$response1 = curl_exec($curl1);
		//print_r($response1);die;
		curl_close($curl1);

		$data = json_decode($response1, true);

		$hashType     = $data['e2ee']['pseudoOaepHashAlgo'];
		$Sid          = $data['e2ee']['pseudoSid'];
		$ServerRandom = $data['e2ee']['pseudoRandom'];
		$pubKey       = $data['e2ee']['pseudoPubKey'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => $this->api_pin,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => "Sid=" . $Sid . "&ServerRandom=" . $ServerRandom . "&pubKey=" . $pubKey . "&pin=" . $this->pin . "&hashType=" . $hashType,
			CURLOPT_HTTPHEADER     => array(
				"Content-Type: application/x-www-form-urlencoded",
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		//print_r($response);die;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => 'https://fasteasy.scbeasy.com/v1/fasteasy-login',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_HEADER         => 1,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'post',
			CURLOPT_POSTFIELDS     => '{"deviceId":"' . $this->deviceId . '","pseudoPin":"' . $response . '","pseudoSid":"' . $Sid . '"}',
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth:  ' . $Auth,
				'user-agent: ' . $this->versionScb,
				'Host: fasteasy.scbeasy.com',
				'Content-Type: application/json',
			),
		));
		$response_auth = curl_exec($curl);
		// print_r($response_auth);die;
		curl_close($curl);
		preg_match_all('/(?<=Api-Auth:).+/', $response_auth, $Auth_result);
		$Auth1 = $Auth_result[0][0];
		if ($Auth1 == "") {
			exit(json_encode(array("status" => 501, "error" => true, "message" => "Auth error")));
			exit();
		} else {
			return array("status" => 200, "auth_token" => $Auth1);
		}
	}

	public function GetBalance()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL            => 'https://fasteasy.scbeasy.com/v2/deposits/summary',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => '
            {"depositList":
                [{"accountNo":"' . $this->accnum . '"}],
                "numberRecentTxn":2,
                "tilesVersion":"39"}',
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth:  ' . $this->Login()["auth_token"],
				'Content-Type:  application/json;charset=UTF-8',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$result = json_decode($response, true);
		// print_r($result);die;

		$data = array('result' => $result['totalAvailableBalance']);
		return json_encode($data);
	}

	public function getTransaction()
	{
		$date_now = date("Y-m-d");
		$date_new = date('Y-m-d', strtotime(' +1 day'));
		$curl     = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://fasteasy.scbeasy.com/v2/deposits/casa/transactions",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => "{\"accountNo\":\"" . $this->accnum . "\",\"endDate\":\"" . $date_new . "\",\"pageNumber\":\"1\",\"pageSize\":20,\"productType\":\"2\",\"startDate\":\"" . $date_now . "\"}",
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth: ' . $this->Login()["auth_token"],
				'Accept-Language: th',
				'Content-Type: application/json; charset=UTF-8',
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		$result = json_decode($response, true);
		$check = $result['status']['description'];

		if ($check == 'ไม่สามารถทำรายการทางการเงินได้ในขณะนี้') {
			$data = array('result' => 'ไม่สามารถทำรายการทางการเงินได้ในขณะนี้');
			return json_encode($data);
		} else {
			$data = array('result' => $result['data']['txnList']);
			return json_encode($data);
		}
	}
	public function getTransaction1($t = 1, $day = 4)
	{
		$date_now = date("Y-m-d", strtotime(' -' . $day . ' day'));
		$date_new = date('Y-m-d', strtotime(' +1 day'));
		$curl     = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://fasteasy.scbeasy.com/v2/deposits/casa/transactions",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => "{\"accountNo\":\"" . $this->accnum . "\",\"endDate\":\"" . $date_new . "\",\"pageNumber\":\"" . $t . "\",\"pageSize\":20,\"productType\":\"2\",\"startDate\":\"" . $date_now . "\"}",
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth: ' . $this->Login()["auth_token"],
				'Accept-Language: th',
				'Content-Type: application/json; charset=UTF-8',
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$result = json_decode($response, true);

		$check = $result['status']['description'];

		if ($check == 'ไม่สามารถทำรายการทางการเงินได้ในขณะนี้') {
			$data = array('result' => 'ไม่สามารถทำรายการทางการเงินได้ในขณะนี้');
			return json_encode($data);
		} else {
			$data = array('result' => $result['data']['txnList']);
			return json_encode($data);
		}
	}

	public function Verify($accountTo, $accountToBankCode, $amount)
	{
		if ($accountToBankCode == "014") {
			$transferType = "3RD";
		} else {
			$transferType = "ORFT";
		}

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://fasteasy.scbeasy.com/v2/transfer/verification",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => '{"accountFrom":"' . $this->accnum . '","accountFromType":"2","accountTo":"' . $accountTo . '","accountToBankCode":"' . $accountToBankCode . '","amount":"' . $amount . '","annotation":null,"transferType":"' . $transferType . '"}',
			CURLOPT_HTTPHEADER     => array(
				'Api-Auth: ' . $this->Login()["auth_token"],
				'Content-Type:  application/json;charset=UTF-8',
			),
		));

		$response = curl_exec($curl);
		$data     = json_decode($response, true);
		return json_encode($data);
	}

	public function Transfer($accountTo, $accountToBankCode, $amount)
	{
		$verify = $this->Verify($accountTo, $accountToBankCode, $amount);
		$data   = json_decode($verify, true);

		if (isset($data["data"])) {
			$totalFee             = $data['data']['totalFee'];
			$scbFee               = $data['data']['scbFee'];
			$botFee               = $data['data']['botFee'];
			$channelFee           = $data['data']['channelFee'];
			$accountFromName      = $data['data']['accountFromName'];
			$accountTo            = $data['data']['accountTo'];
			$accountToName        = $data['data']['accountToName'];
			$accountToType        = $data['data']['accountToType'];
			$accountToDisplayName = $data['data']['accountToDisplayName'];
			$accountToBankCode    = $data['data']['accountToBankCode'];
			$pccTraceNo           = $data['data']['pccTraceNo'];
			$transferType         = $data['data']['transferType'];
			$feeType              = $data['data']['feeType'];
			$terminalNo           = $data['data']['terminalNo'];
			$sequence             = $data['data']['sequence'];
			$transactionToken     = $data['data']['transactionToken'];
			$bankRouting          = $data['data']['bankRouting'];
			$fastpayFlag          = $data['data']['fastpayFlag'];
			$ctReference          = $data['data']['ctReference'];

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL            => "https://fasteasy.scbeasy.com/v3/transfer/confirmation",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING       => "",
				CURLOPT_MAXREDIRS      => 10,
				CURLOPT_TIMEOUT        => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST  => "POST",
				CURLOPT_POSTFIELDS     => "{\"accountFrom\":\"$accountTo\",\"accountFromName\":\"" . $accountFromName . "\",\"accountFromType\":\"2\",\"accountTo\":\"" . $accountTo . "\",\"accountToBankCode\":\"" . $accountToBankCode . "\",\"accountToName\":\"" . $accountToName . "\",\"amount\":\"" . $amount . "\",\"botFee\":0.0,\"channelFee\":0.0,\"fee\":0.0,\"feeType\":\"\",\"pccTraceNo\":\"" . $pccTraceNo . "\",\"scbFee\":0.0,\"sequence\":\"" . $sequence . "\",\"terminalNo\":\"" . $terminalNo . "\",\"transactionToken\":\"" . $transactionToken . "\",\"transferType\":\"" . $transferType . "\"}",
				CURLOPT_HTTPHEADER     => array(
					'Api-Auth: ' . $this->Login()["auth_token"],
					'Content-Type:  application/json;charset=UTF-8',
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			return $response;
		} else {
			return $verify;
		}
	}
}
