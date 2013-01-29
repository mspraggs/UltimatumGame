<?php
include_once("../protected-324hjk/sql_connect.php");
sql_connect("ultimatumgame");
$query = "select player,offer,result from game1 where result is not null";
$results = mysql_query($query);

header("Content-Type: text/plain");
while($row = mysql_fetch_array($results)) {
  echo "MatthewSpraggs ".$row['player']." ".$row['offer']." ".$row['result']."\n";
}
?>