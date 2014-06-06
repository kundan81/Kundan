<?php 
session_start();
include("header.php"); 
include("config.php");
$abc = 100;
if(isset($_SESSION["userid"]))
{
?>

<section id="page">
	<header id="pageheader" class="normalheader">
		<h2 class="sitedescription"> View Records
		</h2>
	</header>

<section id="contents">
	<article class="post">
		<header class="postheader">
		</header>
<section class="entry">
	<font color="#330000">
<?php
if($_GET['view']=="course")
	{
	// Course table starts here
		$result = mysql_query("SELECT * FROM ".$trp_rp."course where course_id='$_GET[slid]'");
		while($row = mysql_fetch_array($result))
	{
		$courseid =  $row["course_id"];
		$coursename = $row["course_name"];
		$coursedesc =   $row["course_description"];
		$coursedur =   $row["course_duration"];
	}
?>  
<header class="postheader"> <h2>Course</h2></header>
	<table width="428" border="1">
		<tr>
			<th width="150" height="35" scope="col">Course ID.</th>
			<th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $courseid; ?></div></th>
		</tr>
  
		<tr>
			<th height="33" scope="col">Course Name</th>
			<th scope="col"><div align="left">&nbsp; <?php echo  $coursename; ?> </div></th>
		</tr>
		
		<tr>
			<th height="35" scope="col">Course Description</th>
			<th scope="col"><div align="left">&nbsp; <?php echo  $coursedesc; ?> </div></th>
		</tr>
		
		<tr>
			<th height="35" scope="col">Course Duration</th>
			<th scope="col"><div align="left">&nbsp;  <?php echo  $coursedur; ?> </div></th>
		</tr>
		
		<tr>
			<th scope="col"  colspan="2"><div align="left">&nbsp;  <a href='course.php'><img src='images/back.png'> </a></div></th>
		</tr>
	</table>
<p>
<?php
}
//course ends here
?>  

<?php
if($_GET['view']=="semester")
	{
		// semester table starts here
		$result = mysql_query("SELECT * FROM ".$trp_rp."semester where semester_id='$_GET[slid]'");
		while($row = mysql_fetch_array($result))
	{
		$batchid =  $row["batch_id"];
		$semesterid = $row["semester_id"];
		$semestername =   $row["semester_name"];
		$semestercom =   $row["semester_comment"];
		$batchyr=$row["batch_year"];
	}
?> 
 
<header class="postheader"> <h2>Semester</h2></header>
	<table width="428" border="1">
		<tr>
			<th width="150" height="35" scope="col">Course ID.</th>
			<th width="262" scope="col"><div align="left"> &nbsp; <?php echo  $batchid; ?></div></th>
		</tr>	
  
		<tr>
			<th height="33" scope="col">Semester ID</th>
			<th scope="col"><div align="left">&nbsp; <?php echo  $semesterid; ?> </div></th>
		</tr>
		<tr>
			<th height="35" scope="col">Semester Name</th>
			<th scope="col"><div align="left">&nbsp; <?php echo  $semestername; ?> </div></th>
		</tr>
		
		<tr>
			<th height="35" scope="col">Semester Comment</th>
			<th scope="col"><div align="left">&nbsp;  <?php echo  $semestercom; ?> </div></th>
		</tr>
    
		<tr>
			<th height="35" scope="col">Batch Year</th>
			<th scope="col"><div align="left">&nbsp;  <?php echo  $batchyr; ?> </div></th>
		</tr>
		
		<tr>
			<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='semester.php'><img src='images/back.png'> </a></div></th>
		</tr>
  </table>
<p>
<?php
}
//semester ends here
?>  

<?php
if($_GET['view']=="subject")
	{
		$result1 = mysql_query("SELECT * FROM ".$trp_rp."subject where subject_id='$_GET[slid]'");// Subject table starts here
		while($row1 = mysql_fetch_array($result1))
			{
				
				$semesterid = $row1["semester_id"];
				$lecturerid =   $row1["lecturer_id"];
				$subid =   $row1["subject_id"];
				$subname = $row1["subject_name"];
				$subcredit =   $row1["subject_credit"];
				$internalmarks =   $row1["subject_internal_marks"];
				$externalmarks =   $row1["subject_external_marks"];
			}
?>  
</p>
<p>&nbsp;</p>
	<h2>Subject</h2>
<table width="428" border="1">
	
  
	<tr>
		<th height="33" scope="col">Semester ID</th>
		<th scope="col"><div align="left">&nbsp; <?php echo  $semesterid; ?> </div></th>
    </tr>
	
	<tr>
		<th height="33" scope="col">Lecturer ID</th>
		<th scope="col"><div align="left">&nbsp; <?php echo  $lecturerid; ?> </div></th>
	</tr>
    
	<tr>
		<th height="33" scope="col">Subject ID</th>
		<th scope="col"><div align="left">&nbsp;  <?php echo  $subid; ?> </div></th>
	</tr>
    
	<tr>
		<th height="33" scope="col">Subject Name</th>
		<th scope="col"><div align="left">&nbsp;  <?php echo  $subname; ?> </div></th>
   </tr>
    
   
   <tr>
		<th height="33" scope="col">Subject Credit</th>
		<th scope="col"><div align="left">&nbsp;  <?php echo  $subcredit; ?> </div></th>
   </tr>
    
   <tr>
		<th height="33" scope="col">Subject Internal Marks</th>
		<th scope="col"><div align="left">&nbsp;  <?php echo  $internalmarks; ?> </div></th>
   </tr>
   
   <tr>
		<th height="33" scope="col">Subject External Marks</th>
		<th scope="col"><div align="left">&nbsp;  <?php echo  $externalmarks; ?> </div></th>
   </tr>
    
   <tr>
		
		<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='subject.php'><img src='images/back.png'> </a></div></th>
   </tr>
</table>
<?php
}
//Subject ends here
?>  

        
<?php
if($_GET['view']=="lecturer")
	{
	// Lecture table starts here
		$result2 = mysql_query("SELECT * FROM ".$trp_rp."lecturer where lecturer_id='$_GET[slid]'");
	while($row2 = mysql_fetch_array($result2))
		{
			$lecturerid =  $row2["lecturer_id"];
			$lecturername =   $row2["lecturer_name"];
			$email =   $row2["lecturer_email"];
			$contactno = $row2["lecturer_contact"];
		}
?>  
</p>
<p>&nbsp;</p>
	<h2>Lectures</h2>
<table width="428" border="1">
  <tr>
	<th height="33" scope="col">Lecture ID.</th>
    <th width="262" scope="col"><div align="centre"> &nbsp; <?php echo  $lecturerid; ?></div></th>
  </tr>
     
  <tr>
    <th height="33" scope="col">Lecture Name</th>
    <th scope="col"><div align="centre">&nbsp; <?php echo  $lecturername; ?> </div></th>
  </tr>
  
  <tr>
    <th height="33" scope="col">Email</th>
    <th scope="col"><div align="centre">&nbsp;  <?php echo  $email; ?> </div></th>
  </tr>
  
  <tr>
    <th height="33" scope="col">Contact No</th>
    <th scope="col"><div align="centre">&nbsp;  <?php echo  $contactno; ?> </div></th>
  </tr>
  <tr>
    <th scope="col" colspan="2"><div align="left">&nbsp;  <a href='lectureview.php'><img src='images/back.png'> </a></div></th>
  </tr>
</table>
<?php
}
//Lecture ends here
?>  

  
<?php
if($_GET['view']=="student")
	{
	// Student table starts here
		$result3 = mysql_query("SELECT * FROM ".$trp_rp."student where student_id='$_GET[slid]'");
		while($row3 = mysql_fetch_array($result3))
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
?>  
</p>
<p>&nbsp;</p>
		<h2>Students</h2>
<table width="428" border="1">
	<tr>
		<th width="150" height="35" scope="col">Course ID.</th>
		<th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $courseid; ?></div></th>
	</tr>
  
	<tr>
		<th height="33" scope="col">Student ID</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $studentid; ?> </div></th>
    </tr>

	<tr>
		<th height="54" scope="col">Student Name</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $studentname; ?> </div></th>
    </tr>
  
	<tr>
		<th height="46" scope="col">Student Email</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $studentemail; ?> </div></th>
    </tr>
    
    <tr>
		<th height="50" scope="col">Contact</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $studentcontact; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Gender</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $studentgender; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Tenth Board</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $tenthboard; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Tenth Mark</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $tenthmark; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Tenth Percentage </th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $tenthpercentage ; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Tenth Passing Year</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $tenthpassingyear; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Twelve Board</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $twelveboard; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Twelve Mark</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $twelvemark; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Twelve Percentage</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $twelvepercentage; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Twelve Passing Year</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $twelvepassingyear; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Graduation Board</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $ugboard; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Graduation Mark</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $ugmark; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Graduation Percentage</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $ugpercentage; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Graduation Passing  Year</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $ugpassingyear; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Parent Name</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $parentname; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Parent Contact</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $parentcontact; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Parent Email</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $parentemail; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Parent Address</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $parentaddress; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Guardian Name</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $guardianname; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Guardian Email</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $guardianemail; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Guardian Contact</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $guardiancontact; ?> </div></th>
    </tr>
    
    <tr>
		<th height="48" scope="col">Guardian Address</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $guardianaddress; ?> </div></th>
    </tr>
    
     <tr>
			<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='student.php'><img src='images/back.png'> </a></div></th>
		</tr>
    

</table>
<?php
}
//Student ends here
?>  

  
<?php
if($_GET['view']=="attendence")
	{
		// Attendance table starts here
		$result4 = mysql_query("SELECT * FROM ".$trp_rp."attendence where attendence_id='$_GET[slid]'");
		
		while($row4 = mysql_fetch_array($result4))
			{
				$subjectid =   $row4["subject_id"];
				$studentid = $row4["student_id"];
				$attendenceid =  $row4["attendence_id"];				
				$lecturenumber =   $row4["lecture_number"];
				$lecturepresent = $row4["lecture_present"];
				$status=($lecturenumber*100)/$lecturepresent;
				
			}
?>  
</p>
<p>&nbsp;</p>
		<h2>Attendance</h2>
<table width="428" border="1">
	
	<tr>
		<th height="33" scope="col">Subject ID</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $subjectid; ?> </div></th>
	</tr>
	
	<tr>
		<th height="33" scope="col">Student ID</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $studentid; ?> </div></th>
   </tr>
	<tr>
		<th height="33" scope="col">Attendance ID.</th>
		<th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $attendenceid; ?></div></th>
    </tr>  
	<tr>
		<th height="33" scope="col">Lecture Number</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $lecturenumber; ?> </div></th>
	</tr>
	
    <tr>
		<th height="33" scope="col">Lecture Present</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $lecturepresent; ?> </div></th>
    </tr>
    
	
	<tr>
		<th height="33" scope="col"> Status</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  round((($lecturepresent*100)/$lecturenumber),2)."%" ?> </div></th>
	</tr>
		<tr>
			
			<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='attendence.php'><img src='images/back.png'> </a></div></th>
		</tr>

	
</table>
<?php
}
//Attendance ends here
?>  

      
<?php
if($_GET['view']=="examination")
	{
		// Examination table starts here
		$result5 = mysql_query("SELECT * FROM ".$trp_rp."examination where examid='$_GET[slid]'");
		while($row5 = mysql_fetch_array($result5))
			{
				$examid =  $row5["examid"];
				$studid = $row5["studid"];
				$subid =   $row5["subid"];
				$courseid =   $row5["courseid"];
				$internaltype = $row5["internaltype"];
				$maxmarks = $row5["maxmarks"];
				$scored = $row5["scored"];
				$result = $row5["result"];
				$comment = $row5["comment"];
			}
?>  
</p>
<p>&nbsp;</p>
	<h2>Examination</h2>
<table width="428" border="1">
	<tr>
		<th width="150" height="51" scope="col">Exam ID.</th>
		<th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $examid; ?></div></th>
	</tr>
  
	<tr>
		<th height="51" scope="col">Student ID</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $studid; ?> </div></th>
</tr>

	<tr>
		<th height="54" scope="col">Subject ID</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $subid; ?> </div></th>
    </tr>
	
	<tr>
		<th height="47" scope="col">Course ID</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $courseid; ?> </div></th>
	</tr>
    
	<tr>
		<th height="47" scope="col">Internal Type</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $internaltype; ?> </div></th>
    </tr>
    
    <tr>
		<th height="41" scope="col">Max Marks</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $maxmarks; ?> </div></th>
	</tr>
    
	<tr>
		<th height="40" scope="col">Scored</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $scored; ?> </div></th>
	</tr>
    
	<tr>
		<th height="40" scope="col">Result</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $result; ?> </div></th>
    </tr>
    
    <tr>
		<th height="53" scope="col">Comment</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $comment; ?> </div></th>
    </tr>

	<tr>
		<th height="43" scope="col">&nbsp;</th>
		<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='examview.php'><img src='images/back.png'> </a></div></th>
    </tr>
</table>
<?php
}
//Examination ends here
?>  

<?php
if($_GET['view']=="administrator")
	{
		// Administrator table starts here
		$result6 = mysql_query("SELECT * FROM ".$trp_rp."admin where admin_email='$_GET[slid]'");
		while($row6 = mysql_fetch_array($result6))
			{
				$adminid =  $row6["admin_id"];
				$adminname = $row6["admin_name"];
				$adminemail =   $row6["admin_email"];
				$contactno =   $row6["admin_contact"];
				$type =   $row6["admin_type"];
			}
?>
<h2>Admin</h2>
<table width="428" border="1">
	<tr>
		<th height="33" scope="col">Admin ID.</th>
		<th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $adminid; ?></div></th>
	</tr>
  
	<tr>
		<th height="33" scope="col">Admin Name</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $adminname; ?> </div></th>
    </tr>
  
	<tr>
		<th height="33" scope="col">Admin Email</th>
		<th scope="col"><div align="center">&nbsp; <?php echo  $adminemail; ?> </div></th>
    </tr>
    
	<tr>
		<th height="33" scope="col">Contact No</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $contactno; ?> </div></th>
    </tr>
    
    <tr>
		<th height="33" scope="col">Type</th>
		<th scope="col"><div align="center">&nbsp;  <?php echo  $type; ?> </div></th>
	</tr>
  
	<tr>
		
		<th scope="col" colspan="2"><div align="left">&nbsp;  <a href='adminview.php'><img src='images/back.png'></a></div></th>
	</tr>
</table>
<p>
<?php
}
//Admin ends here
?>  

<?php 
if($_GET['view']=="batch") 
{ 
// Course table starts here 
$result = mysql_query("SELECT * FROM ".$trp_rp."batch where batch_id='$_GET[slid]'"); 
while($row = mysql_fetch_array($result)) 
  { 
 $courseid =  $row["batch_id"]; 
 $coursename = $row["batch_name"]; 
$coursedesc =   $row["batch_description"]; 
  } 
  
?>  
<header class="postheader"> <h2>Batch</h2></header> 
    <table width="428" border="1"> 
  <tr> 
    <th width="150" height="35" scope="col">Batch ID.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $courseid; ?></div></th> 
    </tr> 
  
   <tr> 
    <th height="33" scope="col">Batch Name</th> 
    <th scope="col"><div align="center">&nbsp; <?php echo  $coursename; ?> </div></th> 
    </tr> 
  <tr> 
    <th height="35" scope="col">Batch Description</th> 
    <th scope="col"><div align="center">&nbsp; <?php echo  $coursedesc; ?> </div></th> 
    </tr> 
  <tr> 
    
    <th scope="col" colspan="2"><div align="left">&nbsp;  <a href='batch.php'><img src='images/back.png'></a> </a></div></th> 
    </tr> 
  </table> 
<p> 
  <?php 
} 
//batch ends here 
?>  

<?php 
if($_GET['view']=="marks") 
{ 
//Marks table starts here 
$result = mysql_query("SELECT * FROM ".$trp_rp."marks where marks_id='$_GET[slid]'"); 
while($row = mysql_fetch_array($result)) 
  { 
	$marksid =  $row["marks_id"]; 
	$externalmarks = $row["externalmarks"]; 
	$internalmarks =   $row["internalmarks"]; 
  } 
  
?>  
<header class="postheader"> <h2>Marks</h2></header> 
    <table width="428" border="1"> 
  <tr> 
    <th width="150" height="35" scope="col">Marks ID.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $marksid; ?></div></th> 
    </tr> 
  
   <tr> 
    <th height="33" scope="col">External Marks</th> 
    <th scope="col"><div align="center">&nbsp; <?php echo  $externalmarks; ?> </div></th> 
    </tr> 
  <tr> 
    <th height="35" scope="col">Internal Marks</th> 
    <th scope="col"><div align="center">&nbsp; <?php echo  $internalmarks; ?> </div></th> 
    </tr> 
  <tr> 
    
    <th scope="col" colspan="2"><div align="left">&nbsp;  <a href='marks.php'><img src='images/back.png'></a> </a></div></th> 
    </tr> 
  </table> 
<p> 
  <?php 
} 
//batch ends here 
?>


<?php 
if($_GET['view']=="contact") 
{ 
//contact table starts here 
$result = mysql_query("SELECT * FROM ".$trp_rp."contact where contact_id='$_GET[slid]'"); 
while($row = mysql_fetch_array($result)) 
  { 
	$contactid =  $row["contact_id"]; 
	$contactname = $row["contact_name"]; 
	$contactemail = $row["contact_email"]; 
	$contactsubject = $row["contact_subject"]; 
	$contactmessage = $row["contact_message"]; 
  } 
  
?>  
<header class="postheader"> <h2>Contact</h2></header> 
    <table width="428" border="1"> 
  <tr> 
    <th width="150" height="35" scope="col">Contact ID.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $contactid; ?></div></th> 
    </tr> 
  
	<th width="150" height="35" scope="col">Contact Name.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $contactname; ?></div></th> 
    </tr> 
    
    <th width="150" height="35" scope="col">Contact Email.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $contactemail; ?></div></th> 
    </tr> 
    
    <th width="150" height="35" scope="col">Contact Subject.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $contactsubject; ?></div></th> 
    </tr> 
    
    <th width="150" height="35" scope="col">Contact Message.</th> 
    <th width="262" scope="col"><div align="center"> &nbsp; <?php echo  $contactmessage; ?></div></th> 
    </tr> 
  <tr>
	  <th scope="col" colspan="2"><div align="left">&nbsp;  <a href='contactview.php'><img src='images/back.png'></a> </a></div></th> 
	  </tr>
  </table> 
<p> 
  <?php 
} 
//contact ends here 
?>

</section>
</article>
</section>
<?php 
}
else
{
		header("Location: admin.php");
}

include("adminmenu.php");
include("footer.php"); 

?>
