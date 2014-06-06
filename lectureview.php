<?php 
session_start();
include("header.php"); 
include("config.php");
if(!isset($_GET['view']))
{
	$_GET['view']="undefine";
	
}
if($_GET['view'] == "delete")
{
mysql_query("DELETE FROM trp_lecturer WHERE lecturer_id ='$_GET[slid]'");
}
if(isset($_SESSION["userid"]))
{
	
	$result = mysql_query("SELECT * FROM trp_lecturer ");
?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Lecture Details</h2>
  </header>
  <section class="entry">
    <table width="508" border="1">
  <tr>
    <td width="45"><strong>&nbsp; ID</strong></td>
    <td width="94"><strong>&nbsp; Lecturer Name</strong></td>
    <td width="80"><strong>&nbsp; Email</strong></td>
    <td width="71"><strong>&nbsp; Contact No.</strong></td>
    <td width="106"><strong>&nbsp; Action</strong></td>
    
  </tr>
    <?php
  while($row = mysql_fetch_array($result))
  {
		echo "<tr>";
		echo "<td>". $row['lecturer_id'] . "</td>";
		echo "<td>". $row['lecturer_name'] . "</td>";
		echo "<td>&nbsp;" . $row['lecturer_email'] . "</td>";
		echo "<td>&nbsp;" . $row['lecturer_contact'] . "</td>";
	   
	echo "<td>&nbsp; <a href='viewrecords.php?slid=".$row['lecturer_id']."&view=lecturer'><img src='images/view.png' width='32' height='32' /></a> 
	<a href='lecture.php?slid=".$row['lecturer_id']."&view=lecturer'> <img src='images/edit.png' width='32' height='32' /></a>
	<a href='lectureview.php?slid=".$row['lecturer_id']."&view=delete'><img src='images/delete.png' width='32' height='32'  onclick='return confirm('Are you sure??')'/></a></td>";
  ?>
  <?php
  echo "</tr>&nbsp;";
  }

?>
  <tr>
   
    <td><a href="./addlecture.php"><img src="images/add.png" alt="" width="32" height="32" /></a></td>
    
  </tr>
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
include("adminmenu.php");
include("footer.php"); ?>
