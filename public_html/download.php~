<?php
include_once("../protected-324hjk/sql_connect.php");
sql_connect("ultimatumgame");
$query = "select player,offer,result from game1 where result is not null";
$results = mysql_query($query);

while($row = mysql_fetch_array($results)) {
  echo "Matthew Spraggs ".$row['player']." ".$row['offer']." ".$row['result']."\n";
}
?>