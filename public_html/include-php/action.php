<?php
if(!isset($_GET['action'])) {
  //if it's not set, display the homepage.
  include("include-html/index.html");
}
else {
 //Else figure out which page to include
  if($_GET['action']=="play") {
    include("include-php/game1.php");
  }
  elseif($_GET['action']=="respond") {
    include("include-php/respond.php");
  }
  elseif($_GET['action']=="offer") {
    include("include-php/offer.php");
  }
  elseif($_GET['action']=="results") {
    include("include-php/results.php");
  }
  elseif($_GET['action']=="download") {
    include("include-php/download.php")
  }
  else {
    include("include-html/index.html");
  }
}
?>