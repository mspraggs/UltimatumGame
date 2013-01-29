<?php
include_once("../protected-324hjk/sql_connect.php");

sql_connect("ultimatumgame");

$query = "select offer where result=''";

$results = mysql_query($query);
$a=rand(0,1);

if(mysql_num_rows($results) == 0 || $a == 0) {
  echo mysql_num_rows($results)."<br />".$a;
  //header("Location: index.php?action=offer");
}
else {
  header("Location: index.php?action=respond");
}

?>