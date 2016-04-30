<?php

function vtxt($var) {
	return trim(mysql_real_escape_string(strip_tags($var)));
}

function row($sql) {
	return mysql_fetch_assoc(mysql_query($sql)); 
}

function getUser($uid) {
	if(isset($uid) && is_numeric($uid)) {
		$ret = row("SELECT * FROM `nw_users` WHERE uid = '".$uid."' LIMIT 1");
		return $ret;
	} else {
		return array();
	}
}

if(isset($_SESSION['uid'])) {
	$user = getUser($_SESSION['uid']);
}

function alert($type, $text) {
	if($type == "success") {
		$message = "<div class='alert alert-success' role='alert'><i class='fa fa-check-circle' style='font-size: 20;'></i> <b>Sukces!</b> ".$text."</div>";
	} else if($type == "error") {
		$message = "<div class='alert alert-danger' role='alert'><i class='fa fa-times-circle' style='font-size: 20;'></i> <b>Błąd!</b> ".$text."</div>";
	} else if($type == "warning") {
		$message = "<div class='alert alert-warning' role='alert'><i class='fa fa-exclamation-triangle' style='font-size: 20;'></i> <b>Uwaga!</b> ".$text."</div>";
	} else if($type == "info") {
		$message = "<div class='alert alert-info' role='alert'><i class='fa fa-info-circle' style='font-size: 20;'></i> <b>Informacja!</b> ".$text."</div>";
	} else {
		$message = "BŁĄD WYŚWIETLANIA alert();";
	}

	echo $message;
}