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
	$sql="INSERT INTO ".$trp_rp."subject(course_id,semester_id,lecturer_id,subject_id,subject_name,subject_description,subject_type,subject_credit,
	subject_internal_marks,subject_external_marks) VALUES ('$_POST[course_id]','$_POST[semester_id]','$_POST[lecturer_id]',
	'$_POST[subject_id]','$_POST[subject_name]','$_POST[subject_description]','$_POST[subject_type]','$_POST[subject_credit]',
	'$_POST[subject_internal_marks]','$_POST[subject_external_marks]')";

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
		mysql_query("UPDATE ".$trp_rp."subject SET course_id='$_POST[courseid]',semester_id='$_POST[semesterid]',
		lecturer_id='$_POST[lecturerid]',subject_id='$_POST[subjectid]',
		subject_description='$_POST[subjectdescription]',subject_type='$_POST[subjecttype]',subject_credit='$_POST[subjectcredit]', 
		subject_internal_marks='$_POST[subjectinternalmarks]',subject_external_marks='$_POST[subjectexternalmarks]'
		WHERE subject_id = '$_POST[subjectid]'");
		echo "Record updated successfully...";
	}

if($_GET["view"] == "subject")
	{
		$result = mysql_query("SELECT * FROM ".$trp_rp."subject where subject_id='$_GET[slid]'");	
		while($row1 = mysql_fetch_array($result))
			{
				$semesterid = $row1["semester_id"];
				$lecturerid = $row1["lecturer_id"];
				$subjectid = $row1["subject_id"];
				$subjectname = $row1["subject_name"];
				$subjectdescription = $row1["subject_description"];
				$subjecttype = $row1["subject_type"];
				$subjectcredit = $row1["subject_credit"];
				$subjectinternalmarks = $row1["subject_internal_marks"];
				$subjectexternalmarks = $row1["subject_external_marks"];
			}
	}
else
	{
		$result = mysql_query("SELECT * FROM ".$trp_rp."subject");
	}
?>
 
<form name="form1" method="post" action="" id="formID">
	
	<p>
		<label for="textfield2">Semester Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="semesterid" id="textfield2" class="validate[required] text-input" value="<?php echo $semesterid;?>" readonly>
	</p>

	<p>
		<label for="textfield3">Lecturer Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input typr="text" name="lecturerid" id="textfield3" class="validate[required] text-input" value="<?php echo $lecturerid;?>" readonly >
	</p>  
	
		
	<p>
		<label for="textfield4">Subject Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjectid" id="textfield4" class="validate[required] text-input" value="<?php echo $subjectid;?>" readonly >
	</p>
   
	<p>
		<label for="textfield5">Subject Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjectname" id="textfield5" class="validate[required] text-input" value="<?php echo $subjectname; ?>">
	</p>
	
	<p>
		<label for="textfield6">Subject Description</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="subjectdescription" id="textfield6" class="validate[required]" cols="30" rows="2"><?php echo $subjectdescription; ?></textarea>
	</p>
	
	<p>
		<label for="textfield7">Subject Type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjecttype" id="textfield7" class="validate[required] text-input" value="<?php echo $subjecttype; ?>">
	</p>
	
	<p>
		<label for="textfield8">Subject Credit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjectcredit" id="textfield8" class="validate[required] text-input" value="<?php echo $subjectcredit; ?>">
	</p>
	  
	<p>
		<label for="textfield9">Subject Internal Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjectinternalmarks" id="textfield9" class="validate[required] text-input" value="<?php echo $subjectinternalmarks; ?>">
	</p>
  
	<p>
		<label for="textfield10">Subject External Marks</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="subjectexternalmarks" id="textfield10" class="validate[required] text-input" value="<?php echo $subjectexternalmarks; ?>">
	</p>
  
	<p>    
		<input type="submit" name="button2" id="button2" value="Update" />  
	</p>
</form>

<?php echo $error ?>

<p>&nbsp;</p>

<a href='subject.php'><img src="images/back.png"> </a>

</section>
</font>
</article>
</section>

<?php
	include("adminmenu.php");
	include("footer.php"); 
?>

