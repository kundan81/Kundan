<?php
session_start();
include("header.php");
include("config.php");
if(!isset($_GET['view']))
	{
		$_GET['view']="undefine";
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
  <h2>Contact Inbox</h2>
  </header>
  <section class="entry">
  <form name="form2" method="post" action="">
<table width="485" border="1">
  <tr>
    <th width="56">Name</th>
<th width="56"><strong>Subject</strong></th>
<th width="20"><strong>View</strong></th>
    
  </tr>
  <?php
	  $result=mysql_query("select * from ".$trp_rp."contact ");
  while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
     	  echo "<td>&nbsp;" . $row['contact_name'] . "</td>";
     	  echo "<td>&nbsp;" . $row['contact_subject'] . "</td>";
  echo "<td>&nbsp";
  ?>
  <a href='viewrecords.php?slid=<?php echo $row['contact_id']; ?>&view=contact'><img src='images/edit.png' width='32' height='32'  onclick="return confirm('Are you sure??')"/></a>
  
  
  
<?php
	echo "</td>";
	echo "</tr>&nbsp;";
  }
  
?>

  
</table>
    </form>
  </section>
</article>


</section>
<?php 
include("adminmenu.php");
include("footer.php"); ?>
