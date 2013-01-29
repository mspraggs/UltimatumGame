<?php
//First check for the csrf token to protect against cross site requests.
if(isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['token']) {
  include_once("../protected-324hjk/sql_connect.php");
  if(!isset($_POST['result']) || !isset($_POST['id'])) {
    include_once("include-html/respond.php");

    sql_connect("ultimatumgame");

    $query = "select id, offer from game1 where result is null order by rand()";
    $results = mysql_query($query);

    //We're only bothered about the first result: we only need one.
    $first_result = mysql_fetch_array($results);
  
    response_form($first_result['offer'],$first_result['id'], $_GET['csrf']);
  }
  else {
    include_once("include-html/message.php");
    if($_POST['result'] != "accept" && $_POST['result'] != "reject") {
      message("There was a problem validating your request. Please try again.");
    }
    elseif(filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
      $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
      $result = $_POST['result'];

      $query = "select email, offer, contact from game1 where id=$id";
      $result = mysql_query($query);
      if($result['contact']=="Y") {
	$subject = "Ultimatum game result";
	$email = $result['email'];
	$message = "Your offer of ".$result['offer']." coins was ";
	if($result == "accept") $message = $message."accepted";
	else $message = $message."rejected";
	$message = " by Player 2. Your email address has now been removed from the database";
	mail($email,$subject,$message);
	mysql_query("update game1 set email=NULL,contact='N' where id=$id");
      }
      //Need something in here to handle the situation that could arise if an offer has already been responded to.
      $query = "";

      //Also need some code to grab the email address and let the Player 1 know the outcome of their offer, if they asked for it.

      if($result == "accept") {
	$query = "update game1 set result='Y' where id=$id";
      }
      else {
	$query = "update game1 set result='N' where id=$id";
      }

      sql_connect("ultimatumgame");
      mysql_query($query);
      mysql_close();
      message("Thank you for your participation.");
      setcookie("participated", "true", time()+5184000);
      session_destroy();
    }
    else {
      message("There was a problem validating your request. Please try again.");
    }
  }
}
else {
  include_once("include-html/message.php");
  message("Your session appears to be invalid. Please restart the game and try again.");
}

?>