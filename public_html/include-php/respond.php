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
      message("Oops! There was a problem validating your request. Please try again.");
    }
    elseif(filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
      $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
      $result = $_POST['result'];
      $query = "";

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