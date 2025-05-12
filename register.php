<!DOCTYPE html>
<?php
   include('connectdb.php'); 
$sql = "SELECT * FROM setting";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$logo=$row['logo_web'];
$name=$row['name_web'];
$logo2=$row['pic_web'];
$link_web=$row['link_web'];
$line_id=$row['lineoa'];
$date = date("Y-m-d  H:i:s");

$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP
@$aff = $_GET["aff"];
?>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $name; ?></title>

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">

    <!-- AOS JS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
        <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Swiper -->
     <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- AOS JS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="user/css/stylegreen.css">

    <link rel="manifest" href="user/css/manifest.json">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Facebook shared -->
    <meta property="og:url"                content="http://www..com/" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="" />
    <meta property="og:description"        content="แค่เว็บเวิร์ดเพรสเว็บหนึ่ง" />
    <meta property="og:image"              content="img" />
    <meta name='robots' content='max-image-preview:large' />

</head>

<body>

 <?php
if(@$_GET['do']==33){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'เข้าสู่ระบบไม่สำเร็จ!!',
  text: 'เบอร์โทรศัพท์ หรือ รหัสผ่านไม่ถูกต้อง'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?>
<?php
if(@$_GET['do']==1){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกเบอร์โทรศัพท์'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==2){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณาเลือกธนาคารของท่าน'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==3){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกเลขบัญชีธนาคาร'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==4){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกไอดีทรูวอเล็ต'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==5){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกชื่อ-นามสกุล'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==6){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกรหัสผ่าน'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==7){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'กรุณากรอกยืนยันรหัสผ่าน'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==8){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'รหัสผ่านยืนยัน ไม่ตรงกัน'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==9){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'เบอร์โทรศัพท์นี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==10){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'บัญชีธนาคารนี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==11){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'ชื่อ-นามสกุลนี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?><?php
if(@$_GET['do']==12){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'ไอดีทรูวอเล็ตนี้ซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?>

<?php
if(@$_GET['do']==61){
echo "<script>";
echo "Swal.fire({
  icon: 'error',
  title: 'ไม่สำเร็จ',
  text: 'เลขบัญชีไม่ถูกต้อง !'

  
});";
                               
echo "</script>";

echo '<meta http-equiv="refresh" content="2;url=login.php" />';     
}
?>


<div class="fixedflexcn loginbg paddinglogin">
	<div class="incontainerlg">
		<div class="p-0 px-1 px-md-2 px-lg-4 flexcn">
			<div class="bginputlogin">

				<div class="logologin">
				<img src="<?php echo $logo; ?>">
				</div>
				<div class="inbgbeforelogin">

				<div class="fleximgbanner">
					<img src="user/css/001.png">
					<img src="user/css/002.png">
					<img src="user/css/003.png">
					<img src="user/css/004.png">
					<img src="user/css/005.png">
					<img src="user/css/006.png">
					<img src="user/css/007.png">
					<img src="user/css/008.png">
					<img src="user/css/009.png">
					<img src="user/css/010.png">
				</div>
					














				<!-- LOGIN Section -->
				<div id="loginsection" class="frontsection animate__animated animate__fadeIn" style="display:block;">
				   <div class="insidectloginmb">
				      <div class="headerlogin my-2">
				         <h2>สมัครสมาชิก</h2>
				      </div>
				    <form action="register_mb.php" method="POST">
            <input name="status_mb" id="username_mb" type="text" value="2" class="form-control" hidden="">
            <input name="ip"  type="text" value="<?php echo($ipaddress); ?>" class="form-control" hidden="">
            <input name="date_mb" type="text" value="<?php echo $date; ?>" class="form-control" hidden="hide">
            <input name="aff" id="aff" type="text" maxlength="10" value="<?php echo($aff); ?>" class="form-control" hidden>
				         <div>
				            <div class=" form-group my-2">
				               <div>
				                  <label>เบอร์โทรศัพท์</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-phone"></i>
				                     <input type="number" name="phone_mb" placeholder="เบอร์โทรศัพท์" maxlength="10"
               pattern="[0-9-_\.]{10,10}" title="เบอร์โทรศัพท์ต้องมีตัวเลข 10 ตัว"  placeholder="เบอร์โทรศัพท์" required/ onkeypress="return bannedKey1(evt)" class="inputstyle">
				                  </div>
				               </div>
				            </div>
				            <div class="form-group my-3">
				               <div>
				                  <label>ไอดีทรูวอเล็ต</label> 
				                  <div class="el-input my-1">
				                     <i class="fal fa-mobile-alt"></i>
				                     <input name="phone_true" id="phone_true" type="text" title="ถ้าตั้งไว้ต้องใส่ไอดี ถ้าไม่ตั้งใส่เบอร์โทรศัพท์"  placeholder="ถ้าตั้งไว้ต้องใส่ไอดี ถ้าไม่ตั้งใส่เบอร์โทรศัพท์" required/ onkeypress="return bannedKey1(evt)" class="inputstyle">
				                  </div>
				               </div>
				            </div>
				            <div class="form-group my-3">
				               <div>
				                  <label>รหัสผ่าน</label> 
				                  <div class="el-input my-1">
				                     <i class="fal fa-key"></i>
				                     <input name="password_mb" id="password_mb" type="text"   placeholder="สร้างรหัสผ่าน 8-15 ตัว" pattern="(?=.*[a-z]).{8,15}" title="รหัสผ่านต้องมีภาษาอังกฤษและตัวเลข (ผสมกัน) 8-15 ตัว" required onkeypress="return bannedKey(evt)" class="inputstyle">
				                  </div>
				               </div>
				            </div>
				            <div class="form-group my-3">
				               <div>
				                  <label> เลือกธนาคาร</label> 
			                           <div class="el-input my-1">
			                           	<i class="fas fa-university"></i>
				                           <select name="bank_mb" class="inputstyle" id="" required>
				                           	<option value="">เลือกธนาคาร</option>
						                    				
		                                    <option value="ธ.กสิกรไทย">ธ.กสิกรไทย</option>
		                                    <option value="ธ.กรุงไทย">ธ.กรุงไทย</option>
		                                    <option value="ธ.กรุงศรีอยุธยา">ธ.กรุงศรีอยุธยา</option>
		                                    <option value="ธ.กรุงเทพ">ธ.กรุงเทพ</option>
		                                    <option value="ธ.ไทยพาณิชย์">ธ.ไทยพาณิชย์</option>
		                                    <option value="ธ.ทหารไทยธนชาติ">ธ.ทหารไทยธนชาติ</option>
		                                    <option value="ธ.ออมสิน">ธ.ออมสิน</option>
		                                    <option value="ธ.ก.ส.">ธ.ก.ส.</option>
		                                    <option value="ธ.ซีไอเอ็มบีไทย">ธ.ซีไอเอ็มบีไทย</option>
		                                    <option value="ธ.เกียรตินาคินภัทร">ธ.เกียรตินาคินภัทร</option>
		                                    <option value="ธ.ทิสโก้">ธ.ทิสโก้</option>
		                                    <option value="ธ.ยูโอบี">ธ.ยูโอบี</option>
		                                    <option value="ธ.อิสลาม">ธ.อิสลาม</option>
		                                    <option value="ธ.ไอซีบีซี">ธ.ไอซีบีซี</option>
				                           </select>
			                       		</div>
				               </div>
				            </div>
				            <div class=" form-group my-2">
				               <div>
				                  <label>เลขบัญชี</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-list-ol"></i>
				                     <input name="bankacc_mb" id="phone_mb" type="text" maxlength="12"
                            pattern="[0-9-_\.]{10,12}" title="เลขบัญชีธนาคารมีตั้งแต่ 10 ตัว"    placeholder="เลขบัญชีธนาคาร หรือ หมายเลขทรูวอเล็ต" required/ onkeypress="return bannedKey1(evt)" class="inputstyle">
				                  </div>
				               </div>
				            </div>
				             <div class="form-group my-3">
				               <div>
				                  <label>ชื่อ-นามสกุล</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-lock"></i>
				                     <input name="name_mb" id="name_mb" type="text" maxlength="50" value="" placeholder="ชื่อจริง-นามสกุลจริง" required class="inputstyle">
				                  </div>
				               </div>
				            </div> 
				         </div>
				      
				      <div class="row m-0">
				         <div class="col-6 p-0 pr-1">
				            <button type="button" class="loginbtn mt-3" onclick="location.href='login.php'">
				            <span>
				            เข้าสู่ระบบ
				            </span>
				            </button>
				         </div>
				         <div class="col-6 p-0 pl-1">
				            <button type="submit" class="loginbtn active regisbtn mt-3" >
				            <span>
				            สมัครสมาชิก
				            </span>
				            </button>
				         </div>
				      </div>
				     </form>
				     
				   </div>
				      <div class="wantregister">ลืมรหัสผ่าน? <a href="#" onclick="gotoforget()">กู้คืนรหัสผ่าน</a></div>
				      <a href="<?php echo $line_id; ?>"><div class=" linelogin">
				            <button><i class="fab fa-line"></i> ติดต่อแอดมิน</button>
				         </div></a>
				      <div class="rulebtn" data-toggle="modal" data-target="#rulelogin">
				         <button><i class="fal fa-file-alt"></i> กฎกติกาและข้อบังคับการใช้งาน</button>
				      </div>
				   </div>
				</div>
				
				<!-- LOGIN Section -->






				<!-- Regsiter Section -->
				<div id="registersection" class="frontsection animate__animated animate__fadeIn">
					
				</div>
				<!-- Regsiter Section -->


	

























				<!-- LOGIN Section -->
				<div id="forgetsection" class="frontsection animate__animated animate__fadeIn" >
				   <div class="insidectloginmb">
				      <div class="headerlogin my-2">
				         <h2>ลืมรหัสผ่าน</h2>
				      </div>
				      <form method="post" action="chk_pass.php">
				          <div class="row m-0">
				            <div class="col-6 form-group p-0 pr-1">
				               <div>
				                  <label>เบอร์โทรศัพท์ที่ใช้สมัคร</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-user"></i>
				                     <input type="text" name="phone_mb" placeholder="เบอร์โทรศัพท์ที่ใช้สมัคร" class="inputstyle">
				                  </div>
				               </div>
					            </div>
					            <div class="col-6 form-group p-0 pl-1">
					               <div class=" form-group">
			                        <div>
			                           <label> เลือกธนาคาร</label> 
			                           <div class="el-input my-1">
			                           	<i class="fas fa-university"></i>
				                           <select name="bank_mb" class="inputstyle" id="" required>
				                           	<option value="">เลือกธนาคาร</option>
						                    <option value="ทรูวอเล็ต" >ทรูวอเล็ต</option>
		                                    <option value="ธ.กสิกรไทย">ธ.กสิกรไทย</option>
		                                    <option value="ธ.กรุงไทย">ธ.กรุงไทย</option>
		                                    <option value="ธ.กรุงศรีอยุธยา">ธ.กรุงศรีอยุธยา</option>
		                                    <option value="ธ.กรุงเทพ">ธ.กรุงเทพ</option>
		                                    <option value="ธ.ไทยพาณิชย์">ธ.ไทยพาณิชย์</option>
		                                    <option value="ธ.ทหารไทยธนชาติ">ธ.ทหารไทยธนชาติ</option>
		                                    <option value="ธ.ออมสิน">ธ.ออมสิน</option>
		                                    <option value="ธ.ก.ส.">ธ.ก.ส.</option>
		                                    <option value="ธ.ซีไอเอ็มบีไทย">ธ.ซีไอเอ็มบีไทย</option>
		                                    <option value="ธ.เกียรตินาคิณภัทร">ธ.เกียรตินาคิณภัทร</option>
		                                    <option value="ธ.ทิสโก้">ธ.ทิสโก้</option>
		                                    <option value="ธ.ยูโอบี">ธ.ยูโอบี</option>
		                                    <option value="ธ.อิสลาม">ธ.อิสลาม</option>
		                                    <option value="ธ.ไอซีบีซี">ธ.ไอซีบีซี</option>
				                           </select>
			                       		</div>
			                        </div>
			                     </div>
					           		 </div>
					           		 <div class="col-6 form-group p-0 pr-1">
				               <div>
				                  <label>เลขบัญชีธนาคาร</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-user"></i>
				                     <input type="text" name="bankacc_mb" placeholder="เลขบัญชีธนาคาร" class="inputstyle">
				                  </div>
				               </div>
					            </div>
					            <div class="col-6 form-group p-0 pl-1">
				               <div>
				                  <label>รหัสผ่านใหม่</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-user"></i>
				                     <input type="text" name="password_mb"  placeholder="รหัสผ่านใหม่" class="inputstyle">
				                  </div>
				               </div>
					            </div>
					            <div class="col-6 form-group p-0 pr-1">
				               <div>
				                  <label>ยืนยันรหัสผ่านใหม่</label> 
				                  <div class="el-input my-1">
				                     <i class="fas fa-user"></i>
				                     <input type="text" name="password_mb1" placeholder="ยืนยันรหัสผ่าน" class="inputstyle">
				                  </div>
				               </div>
					            </div>
				         		</div>
				   
				      <div class="row m-0">
				         <div class="col-6 p-0 pr-1">
				            <button type="button" class="loginbtn  mt-3" onclick="gotologin()">
				            <span>
				            หน้าหลัก
				            </span>
				            </button>
				         </div>
				         <div class="col-6 p-0 pl-1">
				            <button type="submit" class="loginbtn active mt-3">
				            <span>
				            ยืนยัน
				            </span>
				            </button>
				         </div>   </form>
				      </div>
				     
				   </div>
				</div>
				
				<!-- LOGIN Section -->














				</div>
			</div>
		</div>
	</div>

</div>




<div class="modal fade" id="rulelogin" tabindex="-1" aria-labelledby="ruleloginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modalcontent">
      <div class="modal-header headmodalcontent">
        <h5 class="modal-title" id="ruleloginLabel">กฎกติกาและข้อบังคับการใช้งาน</h5>
        <i class="fas fa-times" data-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body ruletext">ยินดีต้อนรับสู่เว็บเดิมพันออนไลน์ UFABET เพื่อให้คุณทราบถึงสิทธิประโยชน์ของสมาชิกกรุณาอ่านข้อตกลงอย่างละเอียดก่อนที่จะลงทะเบียนสมัครเป็นสมาชิกและใช้บริการ เมื่อสมัครสมาชิกแล้วทางเว็บจะถือว่า สมาชิกได้อ่านและยอมรับ "เงื่อนไขและข้อตกลง"

        <h5>การรักษาและช่วยเหลือการเดิมพันออนไลน์</h5>
		1). หากสมาชิกหลุดออกจากเว็บไซต์ระหว่างการเดิมพัน บัญชีของคุณจะไม่มีผลกระทบต่อผลลัพธ์ของการเดิมพัน

		2). หากสมาชิกออกจากเว็บไซด์ระหว่างการเดิมพัน สมาชิกจะถูกออกจากระบบช่วงเวลาหนึ่ง จากนั้นสมาชิกสามารถเข้าสู่ระบบ UFABET.COM ได้อีกครั้งตามปกติ

		การให้ความคุ้มครอง
		UFABET.COM ได้มีการจัดเตรียมระบบที่มีประสิทธิภาพ ความรวดเร็วและการบริการลูกค้าที่เป็นมิตร ถ้าหากคุณมีคำถามหรือคำแนะนำใด ๆ กรุณาอย่าลังเลใจที่จะโทรศัพท์มาทางฝ่ายบริการลูกค้าซึ่งจะมีให้บริการตลอด 24 ชั่วโมงทุกวันไม่มีวันหยุดและทางเราจะตอบกลับอย่างรวดเร็วที่สุด UFABET.COM ขอรับรองว่าจะรักษาข้อมูลส่วนตัวของคุณไว้เป็นความลับอย่างปลอดภัย

		<h5>ข้อตกลงในการเดิมพัน</h5>
		1). การเดิมพันจะต้องอยู่ใน "ระยะเวลาที่กำหนด" มิฉะนั้นจะถือว่าการเดิมครั้งนั้นเป็น "โมฆะ" ถ้าการเดิมพันได้มีการยกเลิกหรือหยุดพักชั่วคราว เนื่องจากเหตุผลใดๆก็ตามก่อนการเล่น การเดิมพันครั้งนั้นจะถือว่าเป็น "โมฆะ" และทางบริษัทจะคืนเครดิตให้กับสมาชิก

		2). เป็นความรับผิดชอบของสมาชิกที่จะคอยดูผลลัพธ์ จากช่องหน้าต่างที่แสดงให้เห็นถึงผลการเดิมพันแพ้หรือชนะ ทางบริษัทจะยึดถือข้อมูล "รายละเอียดการวางเดิมพัน" ของสมาชิก ในกรณีที่สมาชิกมีความสงสัย และต้องการตรวจสอบข้อมูลในการคำนวณของการเดิมพันนั้นๆ

		3). ถ้าหากเกิดความผิดพลาดของระบบระหว่างการเดิมพันหรือความผิดพลาดโดยไม่ได้เจตนาของพนักงาน ทางบริษัทขอสงวนสิทธ์ที่จะแก้ไขผลลัพธ์ให้ถูกต้อง และจะมีการพิมพ์ข้อความที่ได้มีการแก้ไขเผยแพร่ไว้ที่แถบตัววิ่งในหน้าเว็บไซต์ บริษัทจะไม่มีการแจ้งสมาชิกเป็นการส่วนตัว

		4). เป็นความรับชอบของสมาชิกที่จะทำให้แน่ใจว่าชื่อผู้ใช้และรหัสผ่านสำหรับเข้าเว็ไซต์นั้นถูกต้อง และกรุณาเปลี่ยนรหัสผ่านของสมาชิกอย่างน้อยเดือนละครั้ง เพื่อความปลอดภัย ถ้าหากคุณพบหรือสงสัยว่ามีผู้อื่นได้เข้าไปเล่นในบัญชีของคุณโดยไม่รับอนุญาต กรุณา แจ้งตัวแทนของคุณทันทีเพื่อเปลี่ยนรหัสส่วนตัว (หากมีการเดิมพันก่อนที่จะเปลี่ยนรหัสเดิมจะถือว่าการเดิมพันนั้นเป็นผล)

		5). ก่อนเริ่มการเดิมพันแต่ละครั้งสมาชิกควรจะตรวจสอบวงเงินของคุณเสียก่อน ถ้าหากคุณมีข้อสงสัยใดๆเกี่ยวกับวงเงิน กรุณาแจ้งตัวแทนของคุณสมาชิกทันที

		6). ในกรณีที่เหตุการณ์ไม่คาดคิดเกิดขึ้น อย่างเช่น ข้อมูลสูญหายเนื่องจากระบบอินเตอร์เน็ตขัดข้อง ทางบริษัทจะมีการประกาศให้รู้ถึงสาเหตุและวิธีการแก้ปัญหา

		<h5>ระบบการรักษาความปลอดภัย</h5>
		1). ข้อมูลที่ทางสมาชิกให้มาในการเปิดบัญชีจะถูกเก็บเป็นความลับขั้นสูงสุด ทางบริษัทจะไม่เผยแพร่ข้อมูลนี้ให้กับบุคคลที่สามหรือองค์กรอื่นๆ ไม่ว่าจะเป็นบัญชีเบอร์โทรศัพท์หรือข้อมูลอื่นๆ ที่ทางสมาชิกกรอกในการสมัคร ข้อมูลเหล่านี้จะใช้ในจุดมุ่งหมายที่ตั้งใจเอาไว้ให้เท่านั้น เช่น การส่งเช็คเงินสดสำหรับผู้ชนะหรือข้อมูลอื่นๆตามที่สมาชิกร้องขอ

		2). บริษัทได้ใช้วิธีรักษาข้อมูลที่มีประสิทธิภาพมากที่สุดเพื่อทำให้คุณแน่ใจในความปลอดภัยของข้อมูลของคุณ เพื่อป้องกันไม่ให้ข้อมูลรั่วไหลหรือนำไปใช้อย่างไม่ถูกต้อง ถ้าคุณมีข้อสงสัยใดๆที่เกี่ยวข้องกับการรักษาความลับของข้อมูล กรุณาติดต่อฝ่ายบริการลูกค้าพวกเรายินดีให้บริการ
      </div>
      <div class="modal-footer footermodalcontent">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button> 
      </div>
    </div>
  </div>
</div>







    <footer class="footer mt-auto py-3">
  <div class="container">
    Place sticky footer content here.
  </div>
</footer>

    <div class="sideline" onclick="location.href='<?php echo $line_id; ?>'"> 
        <i class="fab fa-line"></i> 
        <br>ติดต่อเรา
    </div>



<!-- คัดลอกลิงค์ -->
<div class="myAlert-top alertcopy">
<i class="fal fa-check-circle"></i>
  <br>
  <strong>
    คัดลอกเรียบร้อยแล้ว  </strong>
</div>
<!-- คัดลอกลิงค์ -->


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- AOSJS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js"></script>



    <script>
    AOS.init({once:true});
    
    </script>
    <script src="user/css/js.js"></script>
    
</body>

</html>