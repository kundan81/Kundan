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
	mysql_query("DELETE FROM trp_attendence WHERE attendence_id ='$_GET[slid]'");
}

if(isset($_SESSION["userid"]))
{
	
	$result = mysql_query("SELECT * FROM trp_attendence ");

?>

<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
</h2>
</header>

<section id="contents">
<article class="post">
<header class="postheader">
<h2>Attendence Detail</h2>
  
<section class="entry">
	<font color="#330000">
		<table width="428" border="1">
			<tr>
				<th width="113" scope="col">attendence_id</th>
				<th width="122" scope="col">Lecture Number</th>
				<th width="122" scope="col">Lecture Present</th>
				
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
 while($row1 = mysql_fetch_array($result))
  {
			echo "<tr>";
			echo "<td align=center>&nbsp;" . $row1['attendence_id'] . "</td>";
			echo "<td align=center>&nbsp;" . $row1['lecture_number'] . "</td>";
			echo "<td align=center>&nbsp;" . $row1['lecture_present'] . "</td>";
			
		
		if($_SESSION["type"]=="admin")
			{
				echo "<td><a href='viewrecords.php?slid=".$row1['attendence_id']."&view=attendence'><img src='images/view.png' width='32' height='32' /></a>";
				echo "<a href='attendenceinsert.php?slid=".$row1['attendence_id']."&view=attendence'> <img src='images/edit.png' width='32' height='32' /></a>";
				echo "<a href='attendence.php?slid=".$row1['attendence_id']."&view=delete'><img src='images/delete.png' width='32' height='32' onclick='javascript:check(<?php echo 'rows[attendenceid]')'; </a>"
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
		<th scope="col"><a href="addattendence.php"><img src="images/add.png" width="33" height="33" /></a> <span id="youremail" style="color: red"></span></a></th>
		</tr>
    <?php
	 }
	?>
  </table>
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
	else
	{	
	include("lecturemenu.php");
	}
include("footer.php"); ?>
