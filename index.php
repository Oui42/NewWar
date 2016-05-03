<?php
require 'config.php';
include 'overall/header.php';

date_default_timezone_set('Europe/Warsaw');

$app = @$_GET['app'];
$module = @$_GET['module'];
$section = @$_GET['section'];

if(empty($app)) $app = 'main';
if(empty($module)) $module = 'main';
if(empty($section)) $section = 'index';

$path = 'source'."/".$app."/".$module."/".$section.".php";

if($app == "admin") {
	if(!isset($user) || $user['uRank'] < $__RANK['admin']) {
		alert("error", "Nie masz dostępu do tej części strony.");
		include 'overall/footer.php';
		die();
	}
}

if($app == "user" && $module != "session") {
	if(!isset($user)) {
		header("Location: index.php?app=user&module=session&section=login");
	}
}

if(file_exists($path))
	include($path);
else
	alert("warning", "Taka strona nie istnieje!");

include 'overall/footer.php';