<?php
$log=""; 	
session_start();
if(isset($_SESSION["userid"]))
{
	if($_SESSION["type"]=="admin")
	{
	header("Location: dashboard.php");
	}
	else if($_SESSION["type"]=="lecturer")
	{	
	header("Location: lectureaccount.php");
	}
	else
	{
		header("Location:cordinatoraccount.php");
	}
}
include("validation.php");
include("header.php"); 
include("config.php");
if(isset($_POST["aemail"]) && isset($_POST["pwd"]) )
{
	$flag=false;
	$result = mysql_query("SELECT * FROM ".$trp_rp."admin WHERE admin_email='$_POST[aemail]'");
	if(mysql_fetch_assoc($result)!=false)
	{
		$flag=true;
	}
	if($flag)
	{
		$result = mysql_query("SELECT * FROM ".$trp_rp."admin WHERE admin_email='$_POST[aemail]'");
		while($row = mysql_fetch_array($result))
			{	
				$pwd = $row['passwd'];
				$type = $row['admin_type'];
			}

		if(($_POST["pwd"]) == $pwd)
		{
			
			if($type =='superuser')
			{
				$_SESSION["userid"] = $_POST["aemail"];
				$_SESSION["type"]="admin";
				header("Location: dashboard.php");
			}
			
			else if($type=="cordinator")
			{
				$_SESSION["userid"] = $_POST["aemail"];
				$_SESSION["type"]="cordinator";
				header("Location: cordinatoraccount.php");
			}
			else if($type=="")
			{
				$log = "Login failed.. Type is empty";

			}
			else
			{
				$log = "Login failed.. Type of user doesn't match";

			}
		
		}
		else
			{
				$log = "Login failed.. user email and password doesn't match";

			}
	}
	else
	{
		$result1 = mysql_query("SELECT * FROM ".$trp_rp."lecturer WHERE lecturer_email='$_POST[aemail]'");
		while($row = mysql_fetch_array($result1))
		{	
			$pwd = $row["lecturer_passwd"];
		}
		if(($_POST["pwd"])==$pwd)
		{
				$_SESSION["userid"] = $_POST["aemail"];
				$_SESSION["type"]= "lecturer";
				header("Location: lectureaccount.php");
		}
		else
			{
				$log = "Login failed.. Please try again..";

			}
	}
	
}
?>
<section id="page">
<header id="pageheader" class="homeheader">
<h2 class="sitedescription">
</h2>
</header>
<section id="contents">

<article class="post">
  <header class="postheader">
  <h2><u>Login Here</u></h2>
 <h2><?php echo $log;?></h2>
  </header>
  <section class="entry">
  <form action="admin.php" method="post" class="form" id="formID">
   <p class="textfield">
      <label for="author">
             <small>Login Email (required)</small>
          </label>
           <input name="aemail" id="aemail" value="" size="22" tabindex="1" type="text" class="validate[required,custom[email]] text-input">
   </p>
   <p class="textfield">
   <label for="email">	
              <small>Password (required)</small>
          </label>
       <input name="pwd" id="pwd"  size="22" tabindex="2" type="password" class="validate[required] text-input">
   </p>
   <p>
     <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png">
     <input name="comment_post_ID" value="1" type="hidden">
     
   </p>
   <div class="clear"></div>
</form>
  
</section>
</article>
</section>

<?php 
include("adminmenu.php");
include("footer.php"); ?>
