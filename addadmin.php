<?php
session_start();
include("validation.php");
include("config.php");
include("header.php");
include("modal.php");

?>
<section id="page">
<header id="pageheader" class="normalheader">
<h2 class="sitedescription"> Add new Records</h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2	>New Admin</h2>
  </header>
  <section class="entry">
  <font color="#330000">
<?php

if(isset($_POST['button2']))
{
	
$sql="INSERT INTO ".$trp_rp."admin (admin_email, admin_id, admin_name, passwd, admin_type, admin_contact)
VALUES
('$_POST[aemail]','$_POST[aid]','$_POST[aname]','$_POST[password]','$_POST[type1]','$_POST[contactno]')";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
	  echo "Record inserted Successfully...";
  }
}

?>
<form name="form1" method="post" action="" id="formID">
  <p>&nbsp;</p>
  <p>
    <label for="aid">Admin ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <td><input type="text" name="aid" id="aid" class="validate[required] text-input">
  </p>
  <p>
  <label for="aname">Admin Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="aname" id="aname" class="validate[required,custom[onlyLetterSp]] text-input"	>
  </p>
  <p>
    <label for="password">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="password" name="password" id="password" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield4">Confirm Password</label>	
    <input type="password" name="textfield4" id="textfield4" class="validate[required,equals[password]] text-input">
  </p>
  <p>
    <label for="aemail">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="aemail" id="aemail" class="validate[required,custom[email]] text-input">
  </p>
  
  <p>	
    <label for="contactno">Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="contactno" id="contactno" class="validate[required,custom[phone]] text-input"  value="">
  </p>
  <p>
    <label for="type1">Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="type1" id="type1" class="validate[required] text-input"  value="">
  </p>
  <p>
    
      <input type="submit" name="button2" id="button2" value="Add New" />
    
  </p>
  <p>&nbsp;</p>
</form>
<a href='adminview.php'><img src='images/back.png'></a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>
