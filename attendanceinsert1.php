 <?php
$error="";
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

if(isset($_POST["button"]))
{
	$sql="INSERT INTO trp_course (course_id, course_name, course_description, course_duration)
	VALUES('$_POST[courseid]','$_POST[coursename]','$_POST[coursedesc]','$_POST[coursedur]')";

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
mysql_query("UPDATE trp_semester SET semester_name='$_POST[semestername]', semester_comment='$_POST[semestercom]', batch_year='$_POST[batchyr]' WHERE semester_id = '$_POST[semester_id]'");
echo "Record updated successfully...";
}


if($_GET["view"] == "semester")
{
$result = mysql_query("SELECT * FROM trp_semester where semester_id='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$courseid = $row1["course_id"];	
	$semesterid = $row1["semester_id"];
	$semestername = $row1["semester_name"];
	$semestercom = $row1["semester_comment"];
	$batchyr = $row1["batch_year"];
	}
}
else
{
$result = mysql_query("SELECT * FROM trp_semester");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Course ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="courseid" id="textfield" class="validate[required] text-input" value="<?php echo $courseid; ?>" readonly>
  </p>
  <p>
    <label for="textfield2">Semester ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="semester_id" id="textfield2" class="validate[required] text-input" value="<?php echo $semesterid; ?>"readonly>
  </p>
  <p>
    <label for="textfield3">Semester Name</label>
    <input type="text" name="semestername" id="textfield3" class="validate[required] text-input" value="<?php echo $semestername; ?>">
  </p>
  <p>
    <label for="textarea">Semester Comment</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name="semestercom" id="textarea" class="validate[required]" cols="30" rows="2"><?php echo $semestercom; ?></textarea>
  </p>
  <p>
    <label for="coursekey">Batch Year</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="batchyr" id="coursekey" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $batchyr; ?>">
  </p>
  <p>
    
    <input type="submit" name="button2" id="button2" value="Update" />
  
  </p>
</form>
<?php echo $error ?>
<p>&nbsp;</p>
<a href='semester.php'><< Back </a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>

