<?php
if(!isset($_GET['action']))
  {
    //if it's not set, display the homepage.
    include("2IAcowwxOi/home2.php");
  }
else
  { //Else figure out which page to include
    if($_GET['action']=="forum")
      {
	include("2IAcowwxOi/forum.php");
      }
    elseif($_GET['action']=="thread")
      {
	include("2IAcowwxOi/thread.php");
      }
    else
      {
	include("inlude-html/index.html");
      }
  }
?>