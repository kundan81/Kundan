<?php

$hname = "localhost";
$uname= "kundandb";
$pwd= "kundan";
$dbname= "studentinfo";
$trp_rp= "trp_";

$conn=mysql_connect($hname,$uname,$pwd);
if(! $conn )
	die("not connected to MySQL".mysql_error());
else {
	mysql_select_db($dbname,$conn);
	//echo "Connection Successfully done";
}
?>
