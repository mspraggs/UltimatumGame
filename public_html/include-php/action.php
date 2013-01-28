<?php
if(!isset($_GET['action']))
  {
    //if it's not set, display the homepage.
    include("include-html/index.php");
  }
else
  { //Else figure out which page to include
    if($_GET['action']=="game1")
      {
	include("include-html/game1.php");
      }
    else
      {
	include("include-html/index.php");
      }
  }
?>