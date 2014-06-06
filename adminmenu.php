<section id="sidebar">
<?php
if(isset($_SESSION["userid"]))
{
?>
<h2>Admin Menu</h2>
<ul>
	<li><a href="adminview.php">Admin</a></li>
	<li><a href="course.php">Course</a></li>
	<li><a href="batch.php">Batch</a></li>
	<li><a href="semester.php">Semester</a></li>
	<li><a href="subject.php">Subject</a></li>
    <li><a href="lectureview.php">Lecture</a></li>
    <li><a href="student.php">Student</a></li>
    <li><a href="attendence.php">Attendence</a></li>
    <li><a href="marks.php">Marks</a></li>    
    <li><a href="contactview.php">Inbox</a></li>

</ul>


<h2><a href="logout.php">Logout</a></h2>
<?php
}
?>
</section>
<div class="clear"></div>
<div class="clear"></div>
</section>
</div>
