<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php

$con= mysqli_connect("localhost","root","","betfun") or die("Error DB..: " . mysqli_error($con));



mysqli_query($con, "SET NAMES 'utf8mb4' ");