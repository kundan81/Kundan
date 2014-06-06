<?php
$error="";
$success="";
session_start();
include("validation.php");
include("config.php");
include("header.php");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Add Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2>Add new Attendence</h2>
  </header>
  <section class="entry">
  <font color="#330000">
	  
<?php
if(isset($_POST["button"]))
{
$sql="INSERT INTO ".$trp_rp."attendence (student_id,subject_id,attendence_id,lecture_number,lecture_present)
VALUES('$_POST[studentid]','$_POST[subjectid]','$_POST[attendenceid]','$_POST[lecturenumber]','$_POST[lecturepresent]')";

if (!mysql_query($sql,$conn))
  {
     $error= mysql_error();
  }
  else
  {
	 $success="1 record Inserted Successfully...";
  }
}


?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label>Student ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="studentid" value="">
      <?php
      $result1 = mysql_query("SELECT * FROM ".$trp_rp."student");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$studentid  = $row1['student_id']
	  ?>
      <option value=<?php echo $studentid?> ><?php echo $studentid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  <p>
    <label>Subject ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="subjectid" value="">
      <?php
      $result = mysql_query("SELECT * FROM ".$trp_rp."subject");
	  while($row1 = mysql_fetch_array($result))
	  {
		$subjectid  = $row1['subject_id']
	  ?>
      <option value=<?php echo $subjectid?> ><?php echo $subjectid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  <p>
    <label for="textfield2">Attendence Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="attendenceid" id="textfield2" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
    <p>
    <label for="textfield3">Lecture Number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="lecturenumber" id="textfield3" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  <p>
    <label for="textfield4">Lecture Present</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="lecturepresent" id="textfield4" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  
 
  <p>
    <input type="submit" name="button" id="button" value="Submit">
<form id="myform">
 </p>
</form>
  </p>
</form>
<?php echo $error; echo $success;?>
<p>&nbsp;</p>
<p><a href='attendence.php'><img src='images/back.png'></a></p>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>


