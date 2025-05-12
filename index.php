<?php
include('connectdb.php');
// ตั้งค่าชื่อเว็บและข้อความต่างๆ
$site_name = "WEREWOLF888";
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_name; ?> - คาสิโน อันดับหนึ่ง ฝาก-ถอน ออโต้</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url('img/bg-main.jpg') center top no-repeat, #0c0f14;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            font-family: Tahoma, sans-serif;
            color: #fff;
        }
        .header-bar {
            background: rgba(0,0,0,0.7);
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 12px;
        }
        .logo {
            height: 45px;
        }
        .menu-toggle {
            font-size: 30px;
            color: #fff;
            margin-right: 12px;
            background: none;
            border: none;
        }
        .main-content {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 8px;
        }
        .login-box {
            position: absolute;
            top: 75px;
            left: 18px;
            width: 220px;
            z-index: 20;
        }
        .login-form {
            background: rgba(10,20,40,0.8);
            border-radius: 10px;
            padding: 14px 12px 12px 12px;
            margin-bottom: 8px;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 7px;
            border: 1px solid #444;
            background: #222;
            color: #fff;
            font-size: 1em;
        }
        .login-buttons {
            display: flex;
            gap: 8px;
        }
        .btn-login, .btn-register {
            flex: 1;
            background: linear-gradient(#f7d23e 0%, #e6c200 100%);
            color: #222;
            border: none;
            border-radius: 8px;
            padding: 10px 0;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-login {
            background: #191919;
            color: #ffd700;
            border: 1px solid #ffd700;
        }
        .main-banner {
            display: flex;
            flex-wrap: wrap;
            margin-top: 90px;
            gap: 16px;
            justify-content: center;
        }
        .banner-left {
            background: rgba(8,12,22,0.9);
            border-radius: 12px;
            width: 330px;
            min-height: 330px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.4);
        }
        .banner-left img {
            margin-bottom: 18px;
            max-width: 120px;
        }
        .welcome-title {
            font-size: 1.1em;
            margin-bottom: 8px;
        }
        .desc {
            font-size: 0.98em;
            margin-bottom: 18px;
            color: #ffd700;
        }
        .btn-register-main {
            background: linear-gradient(#f7d23e 0%, #e6c200 100%);
            color: #222;
            border: none;
            border-radius: 10px;
            padding: 12px 0;
            width: 90%;
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 8px;
            cursor: pointer;
        }
        .banner-right {
            background: none;
            position: relative;
            min-width: 330px;
            max-width: 480px;
        }
        .banner-img {
            width: 100%;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 2px 20px 0 rgba(0,0,0,0.3);
        }
        .main-promo-row {
            margin: 30px auto 0 auto;
            max-width: 900px;
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .promo-card {
            background: #181818;
            border-radius: 12px;
            padding: 18px 12px 10px 12px;
            min-width: 210px;
            max-width: 300px;
            flex: 1;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .promo-card img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 6px;
        }
        .promo-card .promo-title {
            color: #ffd700;
            font-size: 1.05em;
            margin-bottom: 2px;
            text-align: center;
        }
        .promo-card .promo-desc {
            color: #fff;
            font-size: 0.97em;
            text-align: center;
        }
        .footer-bar {
            background: #181a1c;
            color: #ffd700;
            text-align: center;
            padding: 18px 0 10px 0;
            font-size: 1em;
            margin-top: 36px;
        }
        @media (max-width: 900px) {
            .main-banner { flex-direction: column; align-items: center; margin-top: 70px; }
            .banner-left, .banner-right { width: 98vw; min-width: unset; }
            .main-promo-row { flex-direction: column; gap: 12px; }
        }
        @media (max-width: 600px) {
            .banner-left, .banner-right { width: 100vw; }
            .login-box { position: static; width: 100%; margin: 10px 0 0 0; }
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <button class="menu-toggle">&#9776;</button>
        <img src="img/logo.png" alt="<?php echo $site_name; ?>" class="logo">
    </div>
    <div class="main-content">
        <div class="login-box">
            <form class="login-form" action="login.php" method="POST">
                <input type="text" name="username" placeholder="เบอร์มือถือ" autocomplete="off" required>
                <input type="password" name="password" placeholder="รหัสผ่าน" autocomplete="off" required>
                <div class="login-buttons">
                    <button type="submit" class="btn-login">เข้าสู่ระบบ</button>
                    <a href="register.php"><button type="button" class="btn-register">สมัครสมาชิก</button></a>
                </div>
            </form>
        </div>
        <div class="main-banner">
            <div class="banner-left">
                <img src="img/logo.png" alt="<?php echo $site_name; ?>">
                <div class="welcome-title">ยินดีต้อนรับเข้าสู่ <?php echo $site_name; ?></div>
                <div class="desc">
                    การันตีความมั่นคง เว็บคาสิโนอันดับหนึ่ง ฝาก-ถอนง่าย ออโต้ไม่ต้องแจ้งซ้อน<br>บริการ 24 ชั่วโมง
                </div>
                <a href="register.php"><button class="btn-register-main">สมัครสมาชิก</button></a>
            </div>
            <div class="banner-right">
                <img class="banner-img" src="img/banner-main.jpg" alt="ฝากถอนเร็ว โปรแรงสุดในไทย">
            </div>
        </div>
        <div class="main-promo-row">
            <div class="promo-card">
                <img src="img/promo-dice.png" alt="ไฮโลออนไลน์">
                <div class="promo-title">ไฮโล ออนไลน์ เดิมพันขั้นต่ำ 10</div>
                <div class="promo-desc">กับคาสิโนออนไลน์ที่ดีที่สุด</div>
            </div>
            <div class="promo-card">
                <img src="img/promo-baccarat.png" alt="บาคาร่า">
                <div class="promo-title">เล่นบาคาร่า ให้ได้เงิน</div>
                <div class="promo-desc">เทคนิคเล่นบาคาร่า เล่นง่ายได้ผล 100%</div>
            </div>
            <div class="promo-card">
                <img src="img/promo-line.png" alt="LINE">
                <div class="promo-title">สูตรลับจากเซียน</div>
                <div class="promo-desc"><a href="https://line.me/R/ti/p/@yourlineid" style="color:#ffd700;text-decoration:underline;" target="_blank">LINE บริการ 24 ชม.</a></div>
            </div>
        </div>
    </div>
    <div class="footer-bar">
        ฝาก-ถอน ออโต้ โปรแรงสุดในไทย <?php echo $site_name; ?> ระบบไวกว่าเดิม
    </div>
</body>
</html>