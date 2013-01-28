<?php
include("include-html/message.php");

//Check to see if the user is trying to 
if(!isset($_POST['offer'])) {
  include("include-html/offer.html");
}
else {
  if(filter_var($_POST['offer'],FILTER_VALIDATE_INT)) {
    //Grab the numerical value from the post data.
    $offer = filter_var($_POST['offer'],FILTER_SANITIZE_NUMBER_INT);
    if($offer <= 100 && $offer >= 0) {
      sql_connect("ultimatumgame");
      if($_POST['email'] != "" && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	$query = "insert into game1 (id,player,offer,email,contact) values (0, 1, '$offer', '$email', 'Y')";
      }
      else {
	$query = "insert into game1 (id,player,offer,contact) values (0, 1, '$offer', 'N')";
      }
      mysql_query($query) or die();
      message("Thank you for your participation");
      //
    }
    else {
      //If the number isn't between 0 and 100, we've got a problem
      include("include-html/offer.html");
      message("Please enter a number between 0 and 100.");
    }
  }
  else {
    //The input must be numeric, otherwise we'll run into trouble
    include("include-html/offer.html");
    message("Please enter a number between 0 and 100.");
  }
}