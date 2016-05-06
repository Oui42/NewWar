<?php
if(isset($_POST['addMission'])) {
	$error = array();
	$name = (isset($_POST['name']))? vtxt($_POST['name']) : "";
	$desc = (isset($_POST['desc']))? vtxt($_POST['desc']) : "";

	if(empty($name) || empty($desc)) {
		$error[] = "Wypełnij wszystkie pola.";
	} else {
		if(strlen($name) < 3 || strlen($name) > 32)
			$error[] = "Nazwa musi mieć minimum 3 i maksimum 32 znaki.";

		if(strlen($desc) < 3)
			$error[] = "Opis musi mieć minimum 3 znaki.";
	}

	if(empty($error)) {
		mysql_query("INSERT INTO `nw_missions` (mid, mName, mDesc) VALUES('NULL', '".$name."', '".$desc."')") or die(mysql_error());
		$id = mysql_insert_id();
		header("Location: index.php?app=admin&module=mission");
	} else {
		echo "<div class='alert alert-danger' role='alert'><i class='fa fa-times-circle' style='font-size: 20;'></i> <b>Błąd!</b> Wystąpiły następujące błędy:<br>";
		foreach($error as $e)
			echo "- ".$e."<br>";
		echo "</div>";
	}
}
?>

<form method="post" action="" class="col-md-offset-3 col-md-6">
	<div class="form-group">
		<label for="name">Nazwa</label>
		<input id="name" type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label for="desc">Opis</label>
		<textarea id="desc" class="form-control" rows="5" name="desc" style="resize: vertical;"></textarea>
	</div>
	<div class="row">
		<div class="text-center">
			<button class="btn btn-success" type="submit" name="addMission">
				<i class="fa fa-plus"></i> Dodaj zadanie
			</button>
		</div>
	</div>
</form>