<?php
if(isset($user)) {
	header("Location: index.php");
}

if(isset($_POST['submitRegister'])) {
	$error = array();
	$login = (isset($_POST['login']))? vtxt($_POST['login']) : "";
	$email = (isset($_POST['email']))? vtxt($_POST['email']) : "";
	$pass = (isset($_POST['pass']))? vtxt($_POST['pass']) : "";
	$passr = (isset($_POST['passr']))? vtxt($_POST['passr']) : "";
	$rules = (isset($_POST['rules']))? $_POST['rules'] : "";

	if(empty($login) || empty($email) || empty($pass) || empty($pass)) {
		$error[] = "Wypełnij wszystkie pola.";
	} else {
		if($pass != $passr)
			$error[] = "Podane hasła nie są identyczne.";

		if(strlen($pass) < 6)
			$error[] = "Hasło musi mieć minimum 6 znaków.";

		if(strlen($login) < 3 || strlen($login) > 32)
			$error[] = "Hasło musi mieć minimum 3 i maksimum 32 znaki.";

		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			$error[] = "Adres e-mail jest nieprawidłowy.";

		if(mysql_num_rows(mysql_query("SELECT `uLogin` FROM `nw_users` WHERE `uLogin` = '".$login."'")) > 0)
			$error[] = "Login jest już zajęty.";

		if(mysql_num_rows(mysql_query("SELECT `uEmail` FROM `nw_users` WHERE `uEmail` = '".$email."'")) > 0)
			$error[] = "Adres e-mail jest już zajęty.";

		if($rules != 1)
			$error[] = "Musisz zaakceptować regulamin.";
	}

	if(empty($error)) {
		$salt = substr(md5(time()), 0, 5);
		$insertPassword = md5(md5($salt).md5($pass));
		$code = substr(md5(time()), 0, 30);
		$ip = $_SERVER['REMOTE_ADDR'];

		mysql_query("INSERT INTO `nw_users` (uid, uLogin, uPass, uSalt, uCode, uEmail, uIp, uDate) VALUES('NULL', '".$login."', '".$insertPassword."', '".$salt."', '".$code."', '".$email."', '".$ip."', '".time()."')") or die(mysql_error());
		$id = mysql_insert_id();
		alert("success", "Konto zostało założone.");
	} else {
		echo "<div class='alert alert-danger' role='alert'><i class='fa fa-times-circle' style='font-size: 20;'></i> <b>Błąd!</b> Wystąpiły następujące błędy:<br>";
		foreach($error as $e)
			echo "- ".$e."<br>";
		echo "</div>";
	}
}

?>


<form method="post" action="" class="col-md-offset-4 col-md-4">
	<div class="form-group">
		<label for="login">Login</label>
		<input id="login" type="text" class="form-control" name="login">
	</div>
	<div class="form-group">
		<label for="email">E-mail</label>
		<input id="email" type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label for="pass">Hasło</label>
		<input id="pass" type="password" class="form-control" name="pass">
	</div>
	<div class="form-group">
		<label for="passr">Powtórz hasło</label>
		<input id="passr" type="password" class="form-control" name="passr">
	</div>
	<div class="row">
		<p class="text-center">
			<input type="checkbox" id="rules" name="rules" value="1">
			<label for="rules">Akceptuję <a href="#">regulamin</a>.</label>
		</p>
		<div class="text-center">
			<button class="btn btn-success" type="submit" name="submitRegister">
				Zarejestruj się
			</button>
		</div>
	</div>
</form>