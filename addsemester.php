
<?php
$error="";
$success="";
session_start();
include("validation.php");
include("config.php");
include("header.php");


?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Add Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2>Add new Semester</h2>
  </header>
  <section class="entry">
  <font color="#330000">
	  
<?php
if(isset($_POST["button"]))
{
$sql="INSERT INTO trp_semester (batch_id, semester_id, semester_name, semester_comment, batch_year)
VALUES('$_POST[batchid]','$_POST[semesterid]','$_POST[semestername]','$_POST[semestercom]','$_POST[batchyr]')";

if (!mysql_query($sql,$conn))
  {
     $error= mysql_error();
  }
  else
  {
	 $success="1 record Inserted Successfully...";
  }
}


?> 
<form name="form1" method="post" action="" id="formID">
  <p>
    <label>Batch ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="batchid" value="">
      <?php
      $result1 = mysql_query("SELECT * FROM trp_batch");
	  while($row1 = mysql_fetch_array($result1))
	  {
		$batchid  = $row1['batch_id']
	  ?>
      <option value=<?php echo $batchid?> ><?php echo $batchid ?></option>;
      <?php
	  }
	  ?>
	  </select>
  </p>
  <p>
    <label for="textfield2">Semester Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="semesterid" id="textfield2" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
    <p>
    <label for="textfield4">Semester Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="semestername" id="textfield4" class="validate[required] text-input" value="">
  </p>
  <p>
    <label for="textarea">Semester Comment</label>&nbsp;&nbsp;
    <textarea name="semestercom" id="textarea" class="validate[required]" cols="30" rows="2" ></textarea>
  </p>
  <p>
    <label for="batchyr">Batch Year</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="batchyr" id="batchyr" class="validate[required,custom[onlyNumberSp]] text-input" value="">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
<form id="myform">
 </p>
</form>
  </p>
</form>
<?php echo $error; echo $success;?>
<p>&nbsp;</p>
<p><a href='semester.php'><img src='images/back.png'> </a></p>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>

