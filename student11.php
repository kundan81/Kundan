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
<h2	>New Student</h2>
  </header>
  <section class="entry">
  <font color="#330000">
<?php

if(isset($_POST['button2']))
{
	$pwde = md5($_POST['password']);
$sql="INSERT INTO  (lecid, password, courseid, lecname, gender, address ,contactno)
VALUES
('$_POST[lecid]','$pwde', '$_POST[course]',  '$_POST[lecname]', '$_POST[gender]','$_POST[address]','$_POST[contactno]')";

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
  <p>	<br/></p>
  <p><h1>Personal Detail</h1></p>
  <p>
    <label for="stuid">Student PRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="stuid" id="stuid" class="validate[required] text-input">
  </p>
  <p>
  <label for="sname">First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="sname" id="sname" class="validate[required,custom[onlyLetterSp]] text-input"	>
  </p>
  <p>
    <label for="password">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="password" name="password" id="password" class="validate[required] text-input">
  </p>
  <p>
    <label for="textfield4">Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>	
    <input type="password" name="textfield4" id="textfield4" class="validate[required,equals[password]] text-input">
  </p>
   <p>  
      <label for="semail">Email ID &nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <input name="semail" id="semail" value="" type="text" class="validate[required,custom[email]] text-input">
   </p>

	<p>
    <label for="percontact">Personal Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="percontact" id="percontact" class="validate[required,custom[phone]] text-input"  value="">
  </p>
  
  <p>
    <label for="textfield2">Course &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select name="course" value="">
      <option value="">-----------</option>
      <option value="">MScCa</option>
      <option value="">MBA IT</option> 
      <option value="">BCA</option>
      <option value="">BBA IT </option>
    </select>
  </p>
  <p>Gender
    <input type="radio" name="gender" id="radio" value="Male" class="validate[required] radio" />
    <label for="radio">Male</label>
    <input type="radio" name="gender" id="radio2" value="Female" class="validate[required] radio" />
    <label for="radio2">Female</label>
  </p><hr/>
  <p><h1>Prevoius Qualification Details</h1></p>
  <p>
	  <label for='uni'>University/College Board&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <input type="text" name="uni" id="uni" class="validate[required] text-input"/>
  </p>
  <p>
	  <label for='perc'>Perentage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <input type="text" name="perc" id="perc" class="validate[required] text-input"/>
  </p>
  <p>
	  <label for='year1'>Passing Year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	  <input type="text" name="year1" id="year1" class="validate[required,custom[year]] text-input"/>
  </p> <hr/>
  <p><h1>Adresss Detail</h1></p>
  <p><h2>Permanent Address</h2></p>
  <p>
  <label for="pname">Father's/Mother's Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="pname" id="pname" class="validate[required,custom[onlyLetterSp]] text-input"	>
  </p>
  <p>
    <label for="pcontact">Parents Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="pcontact" id="pcontact" class="validate[required,custom[phone]] text-input"  value="">
  </p>
	<p>  
      <label for="pemail">Parent's Email ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <input name="pemail" id="pemail" value="" type="text" class="validate[required,custom[email]] text-input">
   </p>

  <p>
    <label for="paddress">Permenent Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <textarea name="paddress" id="paddress" class="validate[required]" cols="25" rows="5"></textarea>
  </p>
	  <p><h2>Local Address</h2></p>
    <p>
  <label for="gname">Guardian Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="gname" id="gname" class="validate[required,custom[onlyLetterSp]] text-input"	>
  </p>
  <p>
    <label for="gcontact">Guardian Contact No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="gcontact" id="gcontact" class="validate[required,custom[phone]] text-input"  value="">
  </p>
	<p>  
      <label for="gemail">Gardian's Email ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <input name="gemail" id="gemail" value=""  type="text" class="validate[required,custom[email]] text-input">
   </p>

  <p>
    <label for="gaddress">Local Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <textarea name="gaddress" id="gaddress" class="validate[required]" cols="25" rows="5"></textarea>
  </p>
    
      <input type="submit" name="button2" id="button2" value="Add New" />
    
  </p>
  <p>&nbsp;</p>
</form>
<a href='student.php'><< Back </a>
 </section>
</article>


</section>
<?php
include("adminmenu.php");
include("footer.php"); 
?>
</section>
