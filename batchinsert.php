<?php
$error="";
session_start();
include("validation.php");
include("config.php");
include("header.php");
include("modal.php");

?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Update Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2>Update</h2>
  </header>
  <section class="entry">
  <font color="#330000">
	  
<?php

if(isset($_POST["button"]))
{
	$sql="INSERT INTO ".$trp_rp."batch (course_id, batch_id, batch_name, batch_description)
	VALUES('$_POST[courseid]','$_POST[coursename]','$_POST[coursedesc]','$_POST[coursedur]')";

if (!mysql_query($sql,$conn))
  {
     $erorr= mysql_error();
  }
  else
  {
	  echo "1 record Inserted Successfully...";
  }
}

if(isset($_POST["button2"]))
{
mysql_query("UPDATE ".$trp_rp."batch SET batch_name='$_POST[coursename]', batch_description='$_POST[coursedesc]' WHERE batch_id = '$_GET[slid]'");
echo "Record updated successfully...";
}


if($_GET["view"] == "batch")
{
$result = mysql_query("SELECT * FROM ".$trp_rp."batch where batch_id='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$courseid = $row1["course_id"];
	$batchid = $row1["batch_id"];
	$coursename = $row1["batch_name"];
	$coursedesc = $row1["batch_description"];
	}
}
else
{
$result = mysql_query("SELECT * FROM ".$trp_rp."batch");
}

?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="textfield">Course ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="courseid" id="textfield" class="validate[required] text-input" value="<?php echo $courseid; ?>" readonly>
  </p>
  <p>
    <label for="textfield5">Batch ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="courseid" id="textfield5" class="validate[required] text-input" value="<?php echo $batchid; ?>" readonly>
  </p>
  <p>
    <label for="textfield2">Batch Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="coursename" id="textfield2" class="validate[required] text-input" value="<?php echo $coursename; ?>">
  </p>
  <p>
    <label for="textfield3">Batch Description</label>
    <textarea name="coursedesc" id="textfield3" class="validate[required]" cols="30" rows="2"><?php echo $coursedesc; ?></textarea>
  </p>
  <p>
    
    <input type="submit" name="button2" id="button2" value="Update" />
  
  </p>
</form>
<?php echo $error ?>
<p>&nbsp;</p>
<a href='batch.php'><img src="images/back.png"> </a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>

