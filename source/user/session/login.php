<?php
if(isset($user['uid']))
	header("Location: index.php");

if(isset($_POST['submitLogin'])) {
	$login = (isset($_POST['login']))? vtxt($_POST['login']) : "";
	$pass = (isset($_POST['pass']))? vtxt($_POST['pass']) : "";

	$sql = "SELECT `uSalt`, `uid` FROM `nw_users` WHERE `uLogin` = '".$login."'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0) {
		$row = mysql_fetch_assoc($query);
		$pass = md5(md5($row['uSalt']).md5($pass));
		
		$sql = "SELECT * FROM `nw_users` WHERE `uLogin` = '".$login."' AND `uPass` = '".$pass."'";
		$query = mysql_query($sql) or die(mysql_error());
		
		if(mysql_num_rows($query) > 0) {
			$user = mysql_fetch_assoc($query);

			$_SESSION['uLogin'] = $login;
			$_SESSION['uid'] = $user['uid'];
			header("Location: index.php");
		} else {
			alert("error", "Podane hasło jest nieprawidłowe.");
		}
	} else {
		alert("error", "Takie konto nie jest zarejestrowane.");
	}
}
?>

<form method="post" action="" class="col-md-offset-4 col-md-4">
	<div class="form-group">
		<label for="login">Login</label>
		<input id="login" type="text" class="form-control" name="login">
	</div>
	<div class="form-group">
		<label for="pass">Hasło</label>
		<input id="pass" type="password" class="form-control" name="pass">
	</div>
	<div class="row">
		<div class="text-center">
			<button class="btn btn-success" type="submit" name="submitLogin">
				Zaloguj się
			</button>
		</div>
	</div>
</form>