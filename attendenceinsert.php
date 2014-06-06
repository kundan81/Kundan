<?php
$error="";
session_start();
include("validation.php");
include("config.php");
include("header.php");
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

if(isset($_POST["button"]))
{
	$sql="INSERT INTO trp_attendence (student_id,subject_id,attendence_id,lecture_number,lecture_present,attendence_status)
	VALUES('$_POST[studentid]','$_POST[subjectid]','$_POST[attendenceid]','$_POST[lecturenumber]','$_POST[lecturepresent]')";

if (!mysql_query($sql,$conn))
  {
     $erorr= mysql_error();
  }
  else
  {
	  echo "1 record Inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
	$sql="UPDATE " .$trp_rp."attendence SET lecture_number='$_POST[lecturenumber]',lecture_present='$_POST[lecturepresent]' WHERE attendence_id = '$_GET[slid]'";

	if(!mysql_query($sql,$conn))
	{
		echo "Error in update".mysql_error();
	}
	else
	{ 
		echo "Succseefull updated";
	}
}

if($_GET["view"] == "attendence")
{
$result = mysql_query("SELECT * FROM trp_attendence where attendence_id='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
		$subjectid = $row1["subject_id"];
		$studentid = $row1["student_id"];	
		$attendenceid = $row1["attendence_id"];
		$lecturenumber = $row1["lecture_number"];
		$lecturepresent = $row1["lecture_present"];
		
	
	}
}
else
{
$result = mysql_query("SELECT * FROM trp_attendence");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Subject ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subjectid" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $subjectid; ?>" readonly>
  </p>
  <p>
    <label for="textfield2">Student ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="Studentid" id="textfield2" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $studentid; ?>"readonly>
  </p>
  <p>
    <label for="textfield3">Attendence ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="attendenceid" id="textfield3" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $attendenceid; ?>"readonly>
  </p>
  <p>
    <label for="textfield4">Lecture Number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="lecturenumber" id="textfield4" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $lecturenumber; ?>">
  </p>
  <p>
    <label for="textfield5">Lecture Presnt</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="lecturepresent" id="textfield5" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $lecturepresent; ?>">
  </p>
  
  
  
   
  
  <p>
    
    <input type="submit" name="button2" id="button2" value="Update" />
  
  </p>
</form>
<?php echo $error ?>
<p>&nbsp;</p>
<a href='attendence.php'><img src='images/back.png'> </a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>

