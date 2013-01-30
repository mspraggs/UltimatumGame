<?php

//First check for the csrf token to protect against cross site requests.
if(isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['token1']) {
  include_once("include-html/message.php");
  include("include-html/offer.php");

  //Check to see if the user is trying to submit their offer
  if(!isset($_POST['offer'])) {
    //If not, give them the form.
    offer_form($_GET['csrf']);
  }
  else {
    if(filter_var($_POST['offer'],FILTER_VALIDATE_INT)) {
      //Grab the numerical value from the post data.
      $offer = filter_var($_POST['offer'],FILTER_SANITIZE_NUMBER_INT);
      //Need to check that the value is in the specified range.
      if($offer <= 100 && $offer >= 0) {
	//All systems go, so import and use the database connection function.
	include("../protected-324hjk/sql_connect.php");
	sql_connect("ultimatumgame");
	//Check if they've entered an email address
	if($_POST['email'] != "" && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
	  //If they have, then extract it and create the query appropriately.
	  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
	  $query = "insert into game1 (id,player,offer,email,contact) values (0, 1, '$offer', '$email', 'Y')";
	}
	else {
	  //If no email, then don't add one to the table.
	  $query = "insert into game1 (id,player,offer,contact) values (0, 1, '$offer', 'N')";
	}
	//Add the query, close out the database and thank the user.
	mysql_query($query) or die();
	mysql_close();
	session_destroy();
      setcookie("participated", "true", time()+5184000);
	message("Thank you for your participation.");
	//
      }
      else {
	//If the number isn't between 0 and 100, we've got a problem
	offer_form($_GET['csrf']);
	message("Please enter a number between 0 and 100.");
      }
    }
    else {
      //The input must be numeric, otherwise we'll run into trouble
      offer_form($_GET['csrf']);
      message("Please enter a number between 0 and 100.");
    }
  }

}
else {
  include_once("include-html/message.php");
  message("Your session appears to be invalid. Please restart the game and try again.");
}
?>