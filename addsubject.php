<?php
$error="";
$success="";
session_start();
include("validation.php");
include("config.php");
include("header.php");
include("modal.php");
?>

<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Add Records</h2>
</header>

<section id="contents">
<article class="post">
<header class="postheader">
	<h2>Add new Subject</h2>
</header>

<section class="entry">
<font color="#330000">
	  
<?php
if(isset($_POST["button"]))
	{
	$sql="INSERT INTO trp_subject VALUES('$_POST[semester_id]','$_POST[lecturer_id]',
	'$_POST[subject_id]','$_POST[subject_name]','$_POST[subject_description]','$_POST[subject_type]','$_POST[subject_credit]',
	'$_POST[subject_internal_marks]','$_POST[subject_external_marks]')";

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



<form name="form1" method="POST" action="" id="formID">
  
  <p>
    <label for="2d">Semester Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="semester_id" value="" id="2d">
      <?php
      $result1 = mysql_query("SELECT * FROM trp_semester");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$semester_id  = $row1['semester_id']
	  ?>
      <option value=<?php echo $semester_id?> ><?php echo $semester_id ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  
  <p>
    <label>Lecturer Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="lecturer_id" value="">
      <?php
      $result1 = mysql_query("SELECT * FROM trp_lecturer");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$lecturer_id  = $row1['lecturer_id']
	  ?>
      <option value=<?php echo $lecturer_id?> ><?php echo $lecturer_id?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  <p>
    <label for="textfield2">Subject Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_id" id="textfield2" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
    <p>
    <label for="textfield3">Subject Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_name" id="textfield3" class="validate[required] text-input" value="">
   </p>
  <p>
    <label for="textarea">Subject Description</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name="subject_description" id="textarea" class="validate[required]" cols="30" rows="2" ></textarea>
  </p>
  <p>
    <label for="textfield4">Subject Type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_type" id="textfield4" class="validate[required] text-input" value="">
  </p>
  
  <p>
    <label for="textfield5">Subject Credit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_credit" id="textfield5" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  
  <p>
    <label for="textfield6">Internal Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_internal_marks" id="textfield6" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  
  <p>
    <label for="batchyr">External Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="subject_external_marks" id="textfield7" class="validate[required] text-input" value="">
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
<p><a href='subject.php'><img src='images/back.png'></a></p>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>

</section>
