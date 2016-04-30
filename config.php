<?php
ob_start();
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "newwar";

@mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error()."<br>Nie mozna polaczyc sie z baza danych.");
mysql_select_db($db_name) or die(mysql_error()."<br>Nie mozna wybrac bazy danych.");

mysql_set_charset("utf-8");

require_once('constants.php');
require_once('functions.php');