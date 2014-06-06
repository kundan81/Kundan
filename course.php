<?php 
session_start();
include("header.php"); 
include("config.php");


if(!isset($_GET['view']))
	{
		$_GET['view']="undefine";
	}

if($_GET["view"] == "delete")
	{
		mysql_query("DELETE FROM trp_course WHERE course_id ='$_GET[slid]'");
	}

if(isset($_SESSION["userid"]))
	{	
		$result = mysql_query("SELECT * FROM trp_course ");
?>

<section id="page">
	<header id="pageheader" class="normalheader">
	<h2 class="sitedescription">
	</h2>
</header>

<section id="contents">
<article class="post">
	<header class="postheader">
	<h2>Course Details</h2>
	</header>

<section class="entry">
	<font color="#330000">
		<table width="428" border="1">
			<tr>
				<th width="113" scope="col">Course No.</th>
				<th width="122" scope="col">Course Name</th>
				<th width="122" scope="col">Course Duration</th>
<?php

if($_SESSION["type"]=="admin")
	{
?>
		<th width="171" scope="col">Action</th>
<?php
	}
?>
			</tr>
  
<?php
	while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td align=center>&nbsp;" . $row['course_id'] . "</td>";
			echo "<td align=center>&nbsp;" . $row['course_name'] . "</td>";
			echo "<td align=center>&nbsp;" . $row['course_duration'] . "</td>";
		
		if($_SESSION["type"]=="admin")
			{
				echo "<td><a href='viewrecords.php?slid=".$row['course_id']."&view=course'><img src='images/view.png' width='32' height='32' /></a>";
				echo "<a href='courseinsert.php?slid=".$row['course_id']."&view=course'> <img src='images/edit.png' width='32' height='32' /></a>";
				echo "<a href='course.php?slid=".$row['course_id']."&view=delete'><img src='images/delete.png' width='32' height='32' onclick='javascript:check(<?php echo 'rows[courseid]')'; </a>"
?>

<?php
				echo "</td>";
			}

		echo "</tr>&nbsp;";

	 }
	 
if($_SESSION["type"]=="admin")
	{
?>
	<tr>
	<th scope="col"><a href="addcourse.php"><img src="images/add.png" width="32" height="32" /></a> <span id="youremail" style="color: red"></span></a></th>
	</tr>
    
<?php
	 }
?>
			</table>
		</font>	
	</section>
</article>
</section>

<?php 
}
else
{

		header("Location: admin.php");
}
if($_SESSION["type"]=="admin")
{
	include("adminmenu.php");
}
else if($_SESSION["type"]=="cordinator")
	{	
	include("lecturemenu.php");
	}
else if($_SESSION["type"]=="lecturer")
	{	
	include("lecturemenu.php");
	}


include("footer.php"); 
?>

