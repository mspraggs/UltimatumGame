<?php
include_once("../protected-324hjk/sql_connect.php");

if(!isset($_COOKIE['participated'])) {

  sql_connect("ultimatumgame");
  $query = "select offer from game1 where result is null";
  $results = mysql_query($query);
  mysql_close();

  //Create a csrf token to prevent people randomly adding results to the database.
  $_SESSION['token1'] = md5(uniqid(mt_rand(),true));
  $_SESSION['token2'] = md5(uniqid(mt_rand(),true));

  if(mysql_num_rows($results) == 0 || rand(0,1) == 0) {
    header("Location: index.php?action=offer&csrf=".$_SESSION['token1']);
  }
  else {
    header("Location: index.php?action=respond&csrf=".$_SESSION['token2']);
  }
}
else {
  include_once("include-html/message.php");
  message("It looks like you've already participated. Thank you!");
}
?>