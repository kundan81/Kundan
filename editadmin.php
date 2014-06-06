
<?php
session_start();
include("validation.php");
include("config.php");
include("header.php");


?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Update new Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2>Update Admin Record</h2>
  </header>
  <section class="entry">
  <font color="#330000">
<?php

if(isset($_POST['button2']))
{
    $sql="UPDATE trp_admin SET admin_email='$_POST[email]', admin_id='$_POST[aid]', admin_name='$_POST[aname]',passwd='$_POST[password]', admin_type='$_POST[type1]', admin_contact='$_POST[contactno]' WHERE admin_email='$_GET[slid]'";
    if (!mysql_query($sql,$conn))
     {
		die('Error: ' . mysql_error());
	}
  else
  {
	  echo "Record inserted Successfully...";
  }
}

if($_GET['view'] == "administrator")
{
$result = mysql_query("SELECT * FROM trp_admin where admin_email='$_GET[slid]'");	
 while($row1 = mysql_fetch_array($result))
  {
	$adminid = $row1["admin_id"];
	$adminname = $row1["admin_name"];
	$email = $row1["admin_email"];
	$contact = $row1["admin_contact"];
	$type = $row1["admin_type"];
	}
}


?>

<form name="form1" method="post" action="" id="formID">
  <p>
    <label for="aid">Admin ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="aid" id="aid"  class="validate[required] text-input" readonly value="<?php echo $adminid; ?>">
</p>
  <p>
    <label for="aname">Admin Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="aname" id="aname"  class="validate[required,custom[onlyLetterSp]] text-input"  value="<?php echo $adminname; ?>">
</p>
<p>
  <label for="password">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="password" id="password"  class="validate[required] text-input" >
</p>
 <p>
    <label for="cpassword">Confirm Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="cpassword" id="cpassword" class="validate[required,equals[password]] text-input">
</p>
  <p>
    <label for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="email" id="email"  class="validate[required,custom[email]] text-input"  value="<?php echo $email; ?>"readonly>
</p>
  <p>
    <label for="contactno">Contact No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="contactno" id="contactno"  class="validate[required,custom[phone]] text-input" value="<?php echo $contact; ?>">
</p>
<p>
    <label for="type1">Admin Type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="type1" id="type1"  class="validate[required,] text-input" value="<?php echo $type; ?>">
</p>
  <p>
    <input type="submit" name="button2" id="button2" value="Update" />
</p>
</form>

  <p>&nbsp;</p>
<a href='adminview.php'><img src='images/back.png'></a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>
