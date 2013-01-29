<?php
include_once("../protected-324hjk/sql_connect.php");

if(!isset($_POST['result']) || !isset($_POST['id'])) {
  include_once("include-html/respond.php");

  sql_connect("ultimatumgame");

  $query = "select id, offer from game1 where result is not null order by rand()";
  $results = mysql_query($query);

  //We're only bothered about the first result: we only need one.
  $first_result = mysql_fetch_array($results);
  
  response_form($first_result['offer'],$first_result['id']);
}
else {
  include_once("include-html/message.php");
  if($_POST['result'] != "accept" && $_POST['result'] != "reject") {
    echo "It's failing at the result validation";
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

    mysql_query($query);
    message("Thank you for your participation.");
  }
  else {
    echo "It didn't work!";
    message("Oops! There was a problem validating your request. Please try again.");
  }
}
?>