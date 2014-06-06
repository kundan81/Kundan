<?php
session_start();
include("validation.php");
include("config.php");
include("header.php");
include("modal.php");

?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Update Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2>Update</h2>
  </header>
  <section class="entry">
  <font color="#330000">
<?php

if(isset($_POST["button2"]))
{
mysql_query("UPDATE trp_lecturer SET lecturer_name='$_POST[lecturername]', lecturer_passwd='$_POST[lecturerpasswd]',
lecturer_email='$_POST[lectureremail]', lecturer_contact='$_POST[lecturercontact]' WHERE lecturer_id = '$_POST[lecturerid]'");
echo "Record updated successfully...";
}
if(!isset($_GET['view']))
{
	$_GET['view']="undefine";
	
}

if($_GET["view"] == "lecturer")
{
$result = mysql_query("SELECT * FROM trp_lecturer where lecturer_id='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$lecturerid = $row1["lecturer_id"];
	$lecturername = $row1["lecturer_name"];
	$lecturerpasswd = $row1["lecturer_passwd"];	
	$lectureremail= $row1["lecturer_email"];
	$lecturercontact= $row1["lecturer_contact"];
	}
}
else
{
$result = mysql_query("SELECT * FROM trp_lecturer");
}

?> 
<form name="form1" method="post" action="" id="formID">
	<p>&nbsp;</p>
	<p>
		<label for="lecturer_id">Lecturer ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<td><input type="text" name="lecturer_id" id="lecturerid" class="validate[required] text-input" readonly value="<?php echo $lecturerid; ?>">
	</p>
	
	<p>
		<label for="lecname">Lecturer Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="lecturername" id="lecname" class="validate[required,custom[onlyLetterSp]] text-input" value="<?php echo $lecturername; ?>">
	</p>
	  <p>
		<label for="lecturerpasswd">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="password" name="lecturerpasswd" id="lecturerpasswd" class="validate[required] text-input">
	  </p>
	  <p>
		<label for="textfield4">Confirm Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>	
		<input type="password" name="textfield4" id="textfield4" class="validate[required,equals[lecturerpasswd]] text-input">
	  </p>
	  
	  <p>
		<label for="email">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="lectureremail" id="email" class="validate[required]" value="<?php echo $lectureremail;?>">
	  </p>
	  <p>
		<label for="lecturercontact">Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="lecturercontact" id="contactno" class="validate[required,custom[phone]] text-input"  value="<?php echo $lecturercontact; ?>">
	  </p>
	  <p>
		
		  <input type="submit" name="button2" id="button2" value="Update" />
		
</p>
<p>&nbsp;</p>
</form>
<a href='lectureview.php'><img src="images/back.png"> </a>
</section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>
