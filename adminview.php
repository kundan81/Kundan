<?php 
session_start();
include("header.php"); 
include("config.php");	
include("modal.php");
if(!isset($_GET['view']))
{
	$_GET['view']="undefine";
	
}
if($_GET['view'] == "delete")
{
mysql_query("DELETE FROM trp_admin WHERE admin_email ='$_GET[slid]'");
}
if(isset($_SESSION["userid"]))
{
	
$result = mysql_query("SELECT * FROM trp_admin");

?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription">
Admin Details.  </h2>
</header>

<section id="contents">

<article class="post">
  <header class="postheader">
  <h2>Admin Details</h2>
  </header>
  <section class="entry">
  <font color="#330000">
    <table width="458" border="1">
  <tr>
    <th width="62" scope="col">Admin ID</th>
    <th width="73" scope="col">Admin Name</th>
    <th width="73" scope="col">Admin Email</th>
    <th width="84" scope="col">Contact No</th>
    <th width="132" scope="col">Type</th>
    <?php
    if($_SESSION['type'] =="admin")
    {?>
    <th width="132" scope="col">Action</th>
  </tr>
  <?php }?>
  <?php
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td align=center>&nbsp;" . $row['admin_id'] . "</td>";
  echo "<td align=center>&nbsp;" . $row['admin_name'] . "</td>";
  echo "<td>&nbsp;" . $row['admin_email'] . "</td>";
   echo "<td>&nbsp;" . $row['admin_contact'] . "</td>";
   echo "<td>&nbsp;" . $row['admin_type'] . "</td>";
   if($_SESSION['type'] =="admin")
   {
   echo "<td>&nbsp; <a href='viewrecords.php?slid=".$row['admin_email']."&view=administrator'><img src='images/view.png' width='32' height='32' /></a>
 <a href='editadmin.php?slid=".$row['admin_email']."&view=administrator'>  <img src='images/edit.png' width='32' height='32' /></a>";

	echo "<a href='adminview.php?slid=".$row['admin_email']."&view=delete'><img src='images/delete.png' width='32' height='32' onclick='return confirm('Are you sure??')' /></a> </td>";
	}?>
<?php
	echo "</tr>&nbsp;";
  }
  ?>
  <tr>
	  
    <th scope="col">
<a href="./addadmin.php"><img src="images/add.png" width="32" height="32" /></a> <span id="youremail" style="color: red"></span>
</a></th>   </tr>
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
include("footer.php"); 

?>
