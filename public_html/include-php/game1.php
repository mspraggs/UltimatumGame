<?php
include_once("../protected-324hjk/sql_connect.php");

sql_connect("ultimatumgame");

$query = "select offer where result is null";

$results = mysql_query($query);
$a=rand(0,1);
$b=mysql_num_rows($results);
echo $b;

if(0 == 0 || $a == 0) {
  echo "<br />".$b."<br />".$a;
  //header("Location: index.php?action=offer");
}
else {
  header("Location: index.php?action=respond");
}

?>