<?php 
session_start();
include("header.php"); 
include("config.php");
if(!isset($_GET['view']))
{
	$_GET['view']="";
}
if($_GET["view"] == "delete")
	{
		mysql_query("DELETE FROM trp_subject WHERE subject_id ='$_GET[slid]'");
	}

if(isset($_SESSION["userid"]))
	{
	 $result = mysql_query("SELECT * FROM trp_subject");
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
			<h2>Subject  Details</h2>
		</header>
<section class="entry">
	<font color="#330000">
		<table width="508" border="1">
		<tr>
		
		 
		<td width="25" height="35" align="center"><strong>ID</strong></td>
		<td width="65" height="35" align="center"><strong>Subject Name</strong></td>		
		<td width="45" height="35" align="center"><strong>Credit</strong></td>
		<td width="60" height="35" align="center"><strong>External Marks</strong></td>
		<td width="60" height="35" align="center"><strong>Internal Marks</strong></td>
     
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
			echo "<td>" . $row['subject_id'] . "</td>";
			echo "<td>" . $row['subject_name'] . "</td>";
			echo "<td>" . $row['subject_credit'] . "</td>";
			echo "<td>" . $row['subject_internal_marks'] . "</td>";
			echo "<td>" . $row['subject_external_marks'] . "</td>";

	if($_SESSION["type"]=="admin")
		{
echo "<td>&nbsp;<a href='viewrecords.php?slid=".$row['subject_id']. "&view=subject'><img src='images/view.png' width='32' height='32'/></a>";
echo "<a href='subjectinsert.php?slid=".$row['subject_id']."&view=subject'> <img src='images/edit.png' width='32' height='32' /></a>";
echo "<a href='subject.php?slid=".$row['subject_id']."&view=delete'><img src='images/delete.png' width='32' height='32' </a>";
 
 echo "</td>";
		}
 echo "</tr>";
	}  
if($_SESSION["type"]=="admin")
	 {
	 ?>
		<tr>
		<th scope="col"><a href="addsubject.php"><img src="images/add.png" width="32" height="32" /></a></th>
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

