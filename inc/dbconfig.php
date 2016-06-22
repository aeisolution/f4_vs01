<?php
define("MYSQLUSER", "root");
define("MYSQLPASS", "");
define("HOSTNAME", "localhost");
define("MYSQLDB", "vs_ed");

$connection = @new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

if ($connection->connect_error) {
  die("Connect Error: " . $connection->connect_error);
}
?>
