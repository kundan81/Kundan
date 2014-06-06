<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<title>Student Information System</title>
	<link href="style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			function Openeditcourse(a)
				{
					var links = "courseinsert.php?slid=" + a + "&view=course";
					var ReturnedValue = showModalDialog(links,"Passed String","dialogWidth:450px; dialogHeight:400px; status:no; center:yes");
				}
		</script>
</head>

<body>
	<div id="wrap">
		<section id="top">
			<nav id="mainnav">
				<h1 id="sitename" class="logotext">
					<a href="index.php">SICSR</a>
				</h1>
				<ul>
					<li><a href="index.php"><span>Home</span></a></li>
					<li><a href="./viewresult.php"><span>STUDENTS</span></a></li>
					<li><a href="./admin.php"><span>Login</span></a></li>
					<li><a href="./contact.php"><span>cONTACT-US</span></a></li>
				</ul>
			</nav>
		</section>
	
	 
