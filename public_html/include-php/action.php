<?php
if(!isset($_GET['action'])) {
  //if it's not set, display the homepage.
  include("include-html/index.php");
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
  else {
    include("include-html/index.html");
  }
}
?>