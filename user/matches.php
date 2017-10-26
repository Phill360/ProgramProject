<?php
  require_once('./_php/connect.php');
  
// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM animals";
$result = mysql_query($sql, $connection) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

echo($numrows);

?>