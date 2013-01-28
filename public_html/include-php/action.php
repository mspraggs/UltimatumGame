<?php
if(!isset($_GET['action']))
  {
    //if it's not set, display the homepage.
    include("2IAcowwxOi/home2.php");
  }
else
  { //Else figure out which page to include
    if($_GET['action']=="offer")
      {
	include("include-html/offer.php");
      }
    elseif($_GET['action']=="thread")
      {
	include("include-html/respond.php");
      }
    else
      {
	include("include-html/index.php");
      }
  }
?>