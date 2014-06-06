<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("header.php"); 
session_destroy();
?>
<section id="page">
<header id="pageheader" class="homeheader">
<h2 class="sitedescription">Student Information System.  </h2>
</header>

<section id="contents">

<article class="post">
<header class="postheader">
<h2><a href="#">Logged Out Successfully</a>...</h2>
<p class="postinfo">&nbsp;</p>
</header>
<p>
  <article class="post">
    <footer class="postfooter"></footer>
  </article>
</p>
</article>
<div class="blog-nav"></div>
</section>
<div class="clear"></div>

<div class="clear"></div>
</section>
</div>
<?php 
include("footer.php");
header( 'Location: index.php' ) ;
?>
