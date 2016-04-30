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

if(file_exists($path))
	include($path);
else
	echo "Taka strona nie istnieje!";

include 'overall/footer.php';