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
<h2>Add new Marks</h2>
  </header>
  <section class="entry">
  <font color="#330000">
	  
<?php
if(isset($_POST["button"]))
{
$sql="INSERT INTO ".$trp_rp."marks (batch_id,course_id,semester_id,subject_id,student_id,marks_id,externalmarks,internalmarks)
VALUES('$_POST[batchid]','$_POST[courseid]','$_POST[semesterid]','$_POST[subjectid]','$_POST[studentid]','$_POST[marksid]',
'$_POST[externalmarks]','$_POST[internalmarks]')";

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
    <label>Course ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="courseid" value="">
      <?php
      $result1 = mysql_query("SELECT * FROM ".$trp_rp."course");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$courseid  = $row1['course_id']
	  ?>
      <option value=<?php echo $courseid?> ><?php echo $courseid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
	<p>
    <label>Batch ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="batchid" value="">
      <?php
      $result1 = mysql_query("SELECT * FROM ".$trp_rp."batch");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$batchid  = $row1['batch_id']
	  ?>
      <option value=<?php echo $batchid?> ><?php echo $batchid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  <p>
    <label>Semester ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="semesterid" value="">
      <?php
      $result = mysql_query("SELECT * FROM ".$trp_rp."semester");
	  while($row1 = mysql_fetch_array($result))
	  {
		$semesterid  = $row1['semester_id']
	  ?>
      <option value=<?php echo $semesterid?> ><?php echo $semesterid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  
  <p>
    <label>Subject ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
    <label>Student ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
    <label for="textfield2">Marks Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="marksid" id="textfield2" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
    <p>
    <label for="textfield3">External Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="externalmarks" id="textfield3" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  <p>
    <label for="textfield4">Internal Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="internalmarks" id="textfield4" class="validate[required,custom[onlyNumberSp]] text-input" value="">
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
<p><a href='marks.php'><img src='images/back.png'></a></p>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>


