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
<h2	>New Lecture</h2>
  </header>
  <section class="entry">
  <font color="#330000">
<?php

if(isset($_POST['button2']))
{
$sql="INSERT INTO ".$trp_rp."lecturer VALUES('$_POST[lecid]','$_POST[lecname]','$_POST[password]','$_POST[contactno]','$_POST[email]')";

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
    <label for="lecid">Lecturer ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <td><input type="text" name="lecid" id="lecid" class="validate[required] text-input">
  </p>
  <p>
  <label for="lecname">Lecturer Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="lecname" id="lecname" class="validate[required,custom[onlyLetterSp]] text-input"	>
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
    <label for="email">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="email" id="email" class="validate[required,custom[email]] text-input" value="">
  </p>
  <p>
    <label for="contactno">Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="contactno" id="contactno" class="validate[required,custom[phone]] text-input"  value="">
  </p>
  <p>
    
      <input type="submit" name="button2" id="button2" value="Add New" />
    
  </p>
  <p>&nbsp;</p>
</form>
<a href='lectureview.php'><img src='images/back.png'> </a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>
