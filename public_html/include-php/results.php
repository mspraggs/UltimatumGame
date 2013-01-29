<?php

include_once("../protected-324hjk/sql_connect.php");
include_once("include-html/results.php");

//Check if we're using pagination
if(!(isset($_GET['pagenum']))) {
  //If not set, set the pagenumber to 1
  $pagenum = 1;
}
else {
  //Else get it from the GET variables
  $pagenum=filter_var($_GET['pagenum'],FILTER_SANITIZE_NUMBER_INT);
}

sql_connect("ultimatumgame");
$query = "select player,offer,result from game1 where result is not null";
$results = mysql_query($query);

//Get number of blog entries
$rows=mysql_num_rows($results);
	
//How many posts per page?
$page_rows=10;
//Calculate the last page number
$last=ceil($rows/$page_rows);
//Sanity check the pagenumber
if($pagenum<1) $pagenum=1;
elseif($pagenum>$last) $pagenum=$last;
//Construct the pagination query filter
$max='LIMIT '.($pagenum-1)*$page_rows.','.$page_rows;

$query="select player, offer, result from game1 where result is not null $max"
$results = mysql_query($query);
mysql_close();

while($row = mysql_fetch_array($results)) {
  //Probably going to need some pagination in here.
  result($row);
}
pagination($pagenum);
?>
