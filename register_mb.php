<?php
include('./connectdb.php');
session_start();
$sql = "SELECT * FROM setting ORDER BY id DESC LIMIT 1 ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
$key = $lineregister;

//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$password_mb = $_POST["password_mb"];
$phone_mb = $_POST["phone_mb"];
$phone_true = $_POST["phone_true"];
$bank_mb = $_POST["bank_mb"];
$bankacc_mb = $_POST["bankacc_mb"];
$name_mb = $_POST["name_mb"];
$status_mb = $_POST["status_mb"];
$aff = $_POST["aff"];
$ip = $_POST["ip"];
$date_mb = $_POST["date_mb"];

//echo $phone_mb;




//เช็คซ้ำ
$check = "SELECT  phone_mb FROM member WHERE phone_mb = '$phone_mb'";
$res = $con->query($check);
$num = mysqli_num_rows($res);

if ($num > 0) {
	echo "<script>";
	// echo "alert(' เบอร์โทรศัพท์นี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
	echo "window.location = 'login.php?do=9'; ";
	echo "</script>";
} else {
	//เช็คซ้ำ
	$check = "SELECT  bankacc_mb FROM member WHERE bankacc_mb = '$bankacc_mb'";
	$res = $con->query($check);
	$num = mysqli_num_rows($res);

	if ($num > 0) {
		echo "<script>";
		//echo "alert(' บัญชีธนาคารนี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
		echo "window.location = 'login.php?do=10'; ";
		echo "</script>";
	} else {
		//เช็คซ้ำ
		$check = "SELECT  name_mb FROM member WHERE name_mb = '$name_mb'";
		$res = $con->query($check);
		$num = mysqli_num_rows($res);

		if ($num > 0) {
			echo "<script>";
			//echo "alert(' ชื่อ-นามสกุลนี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
			echo "window.location = 'login.php?do=11'; ";
			echo "</script>";
		} else {
			$sql = "UPDATE member SET  
            password_mb='$password_mb' , 
            phone_mb='$phone_mb' ,
            phone_true='$phone_true' ,
            bank_mb='$bank_mb' ,
            bankacc_mb='$bankacc_mb' ,
            name_mb='$name_mb' ,
            status_mb = '$status_mb' ,
            aff = '$aff' ,
            add_mb='MEMBER' ,
            date_mb = '$date_mb' ,
            ip = '$ip',
            `status` = 1
            WHERE `status` = 2 ORDER BY id_mb ASC LIMIT 1 ";
			// echo $sql;die;
			$res = $con->query($sql);

			if ($res) {
				$sMessage = "สมาชิกใหม่ \nเบอร์ " . $phone_mb . "\nชื่อ " . $name_mb;
				$chOne = curl_init();
				curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
				curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($chOne, CURLOPT_POST, 1);
				curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
				$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $key . '',);
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($chOne);
				if (curl_error($chOne)) {
					echo 'error:' . curl_error($chOne);
				} else {
					$result_ = json_decode($result, true);
				}
				curl_close($chOne);

				if (isset($_POST['phone_mb'])) {
					//connection
					//รับค่า user & password_mb
					$phone_mb = $_POST['phone_mb'];
					$password_mb = ($_POST['password_mb']);
					//query 
					$sql = "SELECT * FROM member Where phone_mb='" . $phone_mb . "' and password_mb='" . $password_mb . "' ";
					$res = $con->query($sql);
					$num = mysqli_num_rows($res);	
					if ($num == 1) {
						$row = $res->fetch_array(MYSQLI_ASSOC);
						$_SESSION["id_mb"] = $row["id_mb"];
						$_SESSION["username_mb"] = $row["username_mb"];
						$_SESSION["password_mb"] = $row["password_mb"];
						$_SESSION["name_mb"] = $row["name_mb"];
						$_SESSION["bank_mb"] = $row["bank_mb"];
						$_SESSION["bankacc_mb"] = $row["bankacc_mb"];
						$_SESSION["phone_mb"] = $row["phone_mb"];
						$_SESSION["status_mb"] = $row["status_mb"];
						$_SESSION["confirm_mb"] = $row["confirm_mb"];
						$_SESSION["aff"] = $row["aff"];
						$_SESSION["status"] = $row["status"];
						$_SESSION["password_ufa"] = $row["password_ufa"];
						$_SESSION["ip"] = $row["ip"];
						$_SESSION["phone_true"] = $row["phone_true"];

						if ($_SESSION["status_mb"] == "2") {
							Header("Location: user/index.php?do=2");
						}

						if ($_SESSION["status_mb"] != "2") {
							Header("Location: index.php");
						}
					} else {
						header("Content-Type: text/html; charset=utf-8");
						echo "<script>";
						echo "alert(\" เบอร์โทรศัพท์ หรือ รหัสผ่านไม่ถูกต้อง ไม่ถูกต้อง\");";
						echo "window.history.back()";
						echo "</script>";
					}
				} else {
					Header("Location: form.php"); //user & password_mb incorrect back to login again
				}
			} else {
				header("Content-Type: text/html; charset=utf-8");
				echo "<script type='text/javascript'>";
				echo "alert('Error back to register again');";
				echo "</script>";
			}
		}
	}
}
