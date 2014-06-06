<?php 
session_start();
include("header.php"); 
include("config.php");
include("modal.php");
if(!isset($_GET['view']))
{
	$_GET['view']="";
}
if($_GET["view"] == "delete")
	{
		mysql_query("DELETE FROM ".$trp_rp."student WHERE student_id ='$_GET[slid]'");
	}

if(isset($_SESSION["userid"]))
	{
	 $result = mysql_query("SELECT * FROM ".$trp_rp."student");
	}
?>

<section id="page">
<header id="pageheader" class="normalheader">
	<h2 class="sitedescription">
	</h2>
</header>

<section id="contents">
	<article class="post">
		<header class="postheader">
			<h2>Student  Details</h2>
		</header>
<section class="entry">
	<font color="#330000">
		<table width="508" border="1">
		<tr>		
		<td  width="10" height="30" align="center"><strong> ID</strong></td> 		
		<td  width="40" height="30" align="center"><strong>Name</strong></td> 
		<td  width="40" height="30" align="center"><strong>Email</strong></td> 
		<td  width="15" height="30" align="center"><strong>Contact</strong></td> 
		
		
     
<?php    
if($_SESSION["type"]=="admin")
	{
?>	
		<td width="106"><strong>Action</strong></td>
<?php
	}
?>    
	</tr>
 
<?php	   
	while($row = mysql_fetch_array($result))
		{
			echo "<tr>";		
			echo "<td>" . $row['student_id'] . "</td>";
			echo "<td>" . $row['student_name'] . "</td>";
			echo "<td>" . $row['student_email'] . "</td>";
			echo "<td>" . $row['student_contact'] . "</td>";			
			

	if($_SESSION["type"]=="admin")
		{
echo "<td>&nbsp;<a href='viewrecords.php?slid=".$row['student_id']. "&view=student'><img src='images/view.png' width='32' height='32'/></a>";
echo "<a href='studentinsert.php?slid=".$row['student_id']."&view=student'> <img src='images/edit.png' width='32' height='32' /></a>";
echo "<a href='student.php?slid=".$row['student_id']."&view=delete'><img src='images/delete.png' width='32' height='32'  </a>";?>
 
 <?php 
 echo "</td>";
		}
 echo "</tr>&nbsp;";
	}  
if($_SESSION["type"]=="admin")
	 {
	 ?>
		<tr>
		<th scope="col"><a href="addstudent.php"><img src="images/add.png" width="32" height="32" /></a> <span id="youremail" 
		style="color: red"></span></a></th>
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
if($_SESSION["type"]=="admin")
	{
	include("adminmenu.php");
	}
	else
	{	
	include("lecturemenu.php");
	}

include("footer.php"); 
?>
</section>

