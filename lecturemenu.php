<?php 
?>
<section id="sidebar">
<?php
//if(isset($_SESSION["userid"]))
//{
?>
<h2>Lecturer Profile</h2>
<ul>
	<li>Lecture Email ID : <?php echo $_SESSION["userid"] ; ?></li>

</ul>
<h2>Lecturer Menu</h2>
<ul>
	<li><a href="course.php">Course</a></li>
    <li><a href="subject.php">Subject</a></li>
    <li><a href="lectureview.php">Lecture Profile</a></li>
    <li><a href="student.php">Student</a></li>
    <li><a href="attendence.php">Attendance</a></li>
    <li><a href="examview.php">Examination</a></li>

</ul>
<h2>Reports</h2>
<ul>
	<li><a href="#nogo">Student Report</a></li>
    <li><a href="#nogo">Attendance Report</a></li>
    <li><a href="#nogo">Examination Report</a></li>

</ul>

<h2><a href="logout.php">Logout</a></h2>
<?php
//}
?>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
