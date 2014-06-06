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
	 $sql="INSERT INTO ".$trp_rp."student(subject_id,student_id,student_passwd,student_name,student_email,student_contact,
	student_gender,tenth_board,tenth_mark,tenth_percentage,tenth_passing_year,twelve_board,twelve_mark,twelve_percentage,twelve_passing_year,
	ug_board,ug_mark,ug_percentage,ug_passing_year,parent_name,parent_contact,parent_email,parent_address,guardian_name,guardian_email, 
	guardian_contact,guardian_address) 
	VALUES ('$_POST[subject_id]','$_POST[student_id]','$_POST[student_passwd]','$_POST[student_name]',
	'$_POST[student_email]','$_POST[student_contact]','$_POST[student_gender]','$_POST[tenth_board]','$_POST[tenth_mark]',
	'$_POST[tenth_percentage]','$_POST[tenth_passing_year]','$_POST[twelve_board]','$_POST[twelve_mark]','$_POST[twelve_percentage]',
	'$_POST[twelve_passing_year]','$_POST[ug_board]','$_POST[ug_mark]','$_POST[ug_percentage]','$_POST[ug_passing_year]',
	'$_POST[parent_name]','$_POST[parent_contact]','$_POST[parent_email]','$_POST[parent_address]','$_POST[guardian_name]',
	'$_POST[guardian_email]','$_POST[guardian_contact]','$_POST[guardian_address]')";

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
		mysql_query("UPDATE trp_student SET student_name='$_POST[studentname]',student_email='$_POST[studentemail]',
		student_contact='$_POST[studentcontact]',student_gender='$_POST[studentgender]',tenth_board='$_POST[tenthboard]',
		tenth_mark='$_POST[tenthmark]',tenth_percentage='$_POST[tenthpercentage]',tenth_passing_year='$_POST[tenthpassingyear]',
		twelve_board='$_POST[twelveboard]',twelve_mark='$_POST[twelvemark]',twelve_percentage='$_POST[twelvepercentage]',
		twelve_passing_year='$_POST[twelvepassingyear]',ug_board='$_POST[ugboard]',ug_mark='$_POST[ugmark]',
		ug_percentage='$_POST[ugpercentage]',ug_passing_year='$_POST[ugpassingyear]',parent_name='$_POST[parentname]',
		parent_contact='$_POST[parentcontact]',parent_email='$_POST[parentemail]',parent_address='$_POST[parentaddress]',
		guardian_name='$_POST[guardianname]',guardian_email='$_POST[guardianemail]',guardian_contact='$_POST[guardiancontact]',
		guardian_address='$_POST[guardianaddress]' WHERE student_id = '$_POST[studentid]'");
		echo "Record updated successfully...";
	}

if($_GET["view"] == "student")
	{
		$result = mysql_query("SELECT * FROM ".$trp_rp."student where student_id='$_GET[slid]'");	
		while($row3 = mysql_fetch_array($result))
			{
					$courseid = $row3["course_id"];
					$studentid = $row3["student_id"];
					$studentname = $row3["student_name"];
					$studentemail = $row3["student_email"];
					$studentcontact=  $row3["student_contact"];
					$studentgender = $row3["student_gender"];
					
					$tenthboard = $row3["tenth_board"];
					$tenthmark = $row3["tenth_mark"];
					$tenthpercentage = $row3["tenth_percentage"];
					$tenthpassingyear = $row3["tenth_passing_year"];
					
					$twelveboard = $row3["twelve_board"]; 
					$twelvemark = $row3["twelve_mark"];
					$twelvepercentage = $row3["twelve_percentage"];
					$twelvepassingyear = $row3["twelve_passing_year"];
					
					$ugboard = $row3["ug_board"];
					$ugmark = $row3["ug_mark"];
					$ugpercentage = $row3["ug_percentage"];
					$ugpassingyear = $row3["ug_passing_year"];
					
					$parentname = $row3["parent_name"];
					$parentcontact = $row3["parent_contact"];
					$parentemail = $row3["parent_email"];
					$parentaddress = $row3["parent_address"];
					
					$guardianname = $row3["guardian_name"];
					$guardiancontact = $row3["guardian_contact"];
					$guardianemail = $row3["guardian_email"];
					$guardianaddress = $row3["guardian_address"];

			}
	}
else
	{
		$result = mysql_query("SELECT * FROM ".$trp_rp."student");
	}
?>
 
<form name="form1" method="post" action="" id="formID">
	<p>
		<label for="textfield">Course ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="courseid" id="textfield" class="validate[required] text-input" value="<?php echo $courseid; ?>" readonly>
	</p>
	<p>
		<label for="textfield2">Student Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="studentid" id="textfield2" class="validate[required] text-input" value="<?php echo $studentid;?>" readonly>
	</p>
 
	<p>
		<label for="textfield3">Student Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="studentname" id="textfield3" class="validate[required] text-input" value="<?php echo $studentname; ?>">
	</p>
	
	<p>
		<label for="textfield4">Student Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="studentemail" id="textfield4" class="validate[required,custom[email]] text-input" value="<?php echo $studentemail; ?>">
	</p>
	
	<p>
		<label for="textfield5">Student Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="studentcontact" id="textfield5" class="validate[required] text-input" value="<?php echo $studentcontact; ?>">
	</p>
	
	<p>
		<label for="textfield6">Student Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="studentgender" id="textfield6" class="validate[required] text-input" value="<?php echo $studentgender; ?>">
	</p>
	  
	<p>
		<label for="textfield7">Tenth Board</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tenthboard" id="textfield7" class="validate[required] text-input" value="<?php echo $tenthboard; ?>">
	</p>
  
	<p>
		<label for="textfield8">Tenth Mark</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tenthmark" id="textfield8" class="validate[required] text-input" value="<?php echo $tenthmark; ?>">
	</p>
	
	<p>
		<label for="textfield9">Tenth Percentage</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tenthpercentage" id="textfield9" class="validate[required] text-input" value="<?php echo $tenthpercentage; ?>">
	</p>
  
	<p>
		<label for="textfield10">Tenth Passing Year</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="tenthpassingyear" id="textfield10" class="validate[required] text-input" value="<?php echo $tenthpassingyear; ?>">
	</p>
	
	<p>
		<label for="textfield11">Twelve Board</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="twelveboard" id="textfield11" class="validate[required] text-input" value="<?php echo $twelvemark; ?>">
	</p>
  
	<p>
		<label for="textfield12">Twelve Mark</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="twelvemark" id="textfield12" class="validate[required] text-input" value="<?php echo $twelvemark; ?>">
	</p>
  
  <p>
		<label for="textfield13">Twelve Percentage</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="twelvepercentage" id="textfield13" class="validate[required] text-input" value="<?php echo $twelvepercentage; ?>">
	</p>
  
	<p>
		<label for="textfield14">Twelve Passing Year</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="twelvepassingyear" id="textfield14" class="validate[required] text-input" value="<?php echo $twelvepassingyear; ?>">
	</p>
	
	<p>
		<label for="textfield15">Graduation Board</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="ugboard" id="textfield15" class="validate[required] text-input" value="<?php echo $ugboard; ?>">
	</p>
  
	<p>
		<label for="textfield16">Graduation Mark</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="ugmark" id="textfield16" class="validate[required] text-input" value="<?php echo $ugmark; ?>">
	</p>
  
  <p>
		<label for="textfield17">Graduation Percentage</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="ugpercentage" id="textfield17" class="validate[required] text-input" value="<?php echo $ugpercentage; ?>">
	</p>
  
	<p>
		<label for="textfield18">Graduation Passing Year</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="ugpassingyear" id="textfield18" class="validate[required] text-input" value="<?php echo $ugpassingyear; ?>">
	</p>
	
	<p>
		<label for="textfield19">Parent Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="parentname" id="textfield19" class="validate[required] text-input" value="<?php echo $parentname; ?>">
	</p>
	
	<p>
		<label for="textfield20">Parent Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="parentcontact" id="textfield20" class="validate[required] text-input" value="<?php echo $parentcontact; ?>">
	</p>
	
	<p>
		<label for="textfield21">Parent Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="parentemail" id="textfield21" class="validate[required,custom[email]] text-input" value="<?php echo $parentemail; ?>">
	</p>
	<p>
		<label for="textfield22">Parent Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="parentaddress" id="textfield22" class="validate[required]" cols="30" rows="2"><?php echo $parentaddress; ?></textarea>
	</p>
	
	<p>
		<label for="textfield23">Guardian Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="guardianname" id="textfield23" class="validate[required] text-input" value="<?php echo $guardianname; ?>">
	</p>
	
	<p>
		<label for="textfield24">Guardian Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input type="text" name="guardiancontact" id="textfield24" class="validate[required] text-input" value="<?php echo $guardiancontact; ?>">
	</p>
	<p>
		<label for="textfield25">Guardian Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<input type="text" name="guardianemail" id="textfield25" class="validate[required] text-input" value="<?php echo $guardianemail; ?>">
	</p>
	<p>
		<label for="textfield26">Guardian Address</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<textarea name="guardianaddress" id="textfield26" class="validate[required]" cols="30" rows="2"><?php echo $guardianaddress; ?></textarea>
	</p>
	<p>    
		<input type="submit" name="button2" id="button2" value="Update" />  
	</p>
</form>

<?php echo $error ?>

<p>&nbsp;</p>

<a href='student.php'><img src="images/back.png"> </a>

</section>
</font>
</article>
</section>

<?php
include("adminmenu.php");
include("footer.php"); 
?>
 
