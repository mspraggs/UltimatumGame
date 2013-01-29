<?php

include_once("../protected-324hjk/sql_connect.php");
include_once("include-html/results.php");

sql_connect("ultimatumgame");
$query = "select player,offer,result from game where result is not null";
$results = mysql_query($query);
mysql_close();

while($row = mysql_fetch_array($results)) {
  result($row);
}

?>