<?php
  require_once('./_php/connect.php');
  
// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM animals";
$result = mysql_query($sql, $connection) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];
?>

<DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php echo($numrows);?>
</body>
  
</html>