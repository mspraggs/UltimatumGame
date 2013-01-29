<?php
include_once("../protected-324hjk/sql_connect.php");

sql_connect("ultimatumgame");

$query = "select offer from game1 where result is null";
$results = mysql_query($query);

if(mysql_num_rows($results) == 0 || rand(0,1) == 0) {
  header("Location: index.php?action=offer");
}
else {
  header("Location: index.php?action=respond");
}

?>