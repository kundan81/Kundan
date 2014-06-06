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
			<h2>Add new Course</h2>
		</header>

<section class="entry">
	<font color="#330000">
	  
<?php
if(isset($_POST["button"]))
	{
		$sql="INSERT INTO ".$trp_rp."course (course_id, course_name, course_description, course_duration)
		VALUES('$_POST[courseid]','$_POST[coursename]','$_POST[coursedesc]','$_POST[coursedur]')";

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
		<label for="textfield">Course ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="courseid" id="textfield" class="validate[required,custom[onlyNumberSp]]] text-input" value="" >
	</p>

	<p>
		<label for="textfield2">Course Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="coursename" id="textfield2" class="validate[required] text-input" value="">
	</p>

	<p>
		<label for="textarea">Course Description</label>&nbsp;&nbsp;
		<textarea name="coursedesc" id="textarea" class="validate[required]" cols="30" rows="2" ></textarea>
	</p>

	<p>
		<label for="coursedur">Course Duration</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="coursedur" id="coursedur" class="validate[required,custom[onlyNumberSp]]] text-input" value="">
	</p>

	<p>
		<input type="submit" name="button" id="button" value="Submit">
	</p>

 
</form>

<?php echo $error; echo $success;?>

<p>&nbsp;</p>

<p><a href='course.php'><img src='images/back.png'></a></p>

			</font>
		</section>
	</article>
</section>


<?php
include("adminmenu.php");
include("footer.php"); 
?>

