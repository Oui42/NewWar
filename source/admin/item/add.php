<?php
if(isset($_POST['addItem'])) {
	$error = array();
	$type = (isset($_POST['type']))? $_POST['type'] : "";
	$name = (isset($_POST['name']))? vtxt($_POST['name']) : "";
	$level = (isset($_POST['level']))? vtxt($_POST['level']) : "";
	$value1 = (isset($_POST['value1']))? vtxt($_POST['value1']) : "";
	$value2 = (isset($_POST['value2']))? vtxt($_POST['value2']) : "";
	$cost = (isset($_POST['cost']))? $_POST['cost'] : "";

	if(empty($name) || empty($level) || empty($value1) || empty($value2) || empty($cost)) {
		$error[] = "Wypełnij wszystkie pola.";
	} else {
		if(empty($type))
			$error[] = "Musisz wybrać typ przedmiotu.";

		if(strlen($name) < 3 || strlen($name) > 32)
			$error[] = "Nazwa musi mieć minimum 3 i maksimum 32 znaki.";

		if(strlen($level) > 4 || !is_numeric($level))
			$error[] = "Poziom musi być liczbą i może mieć maksymalnie 4 cyfry.";

		if(strlen($value1) > 8 || !is_numeric($value1))
			$error[] = "Wartość 1 musi być liczbą i może mieć maksymalnie 8 cyfr.";

		if(strlen($value2) > 8 || !is_numeric($value2))
			$error[] = "Wartość 2 musi być liczbą i może mieć maksymalnie 8 cyfr.";

		if(strlen($cost) > 8 || !is_numeric($cost))
			$error[] = "Koszt musi być liczbą i może mieć maksymalnie 8 cyfr.";
	}

	if(empty($error)) {
		mysql_query("INSERT INTO `nw_items` (iid, iType, iName, iLevel, iValue1, iValue2, iCost) VALUES('NULL', '".$type."', '".$name."', '".$level."', '".$value1."', '".$value2."', '".$cost."')") or die(mysql_error());
		$id = mysql_insert_id();
		header("Location: index.php?app=admin&module=item");
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
		<label for="type">Typ</label>
		<select id="type" name="type" class="form-control">
			<option disabled selected>Wybierz typ przedmiotu</option>
			<option value="<?php echo $__ITEM['armor_head']['dbname']; ?>">Pancerz: Głowa</option>
			<option value="<?php echo $__ITEM['armor_body']['dbname']; ?>">Pancerz: Korpus</option>
			<option value="<?php echo $__ITEM['armor_hands']['dbname']; ?>">Pancerz: Ręce</option>
			<option value="<?php echo $__ITEM['armor_legs']['dbname']; ?>">Pancerz: Nogi</option>
			<option value="<?php echo $__ITEM['weapon_gun']['dbname']; ?>">Broń: Palna</option>
			<option value="<?php echo $__ITEM['weapon_white']['dbname']; ?>">Broń: Biała</option>
			<option value="<?php echo $__ITEM['weapon_ammo']['dbname']; ?>">Broń: Amunicja</option>
			<option value="<?php echo $__ITEM['weapon_thrown']['dbname']; ?>">Broń: Miotana</option>
			<option value="<?php echo $__ITEM['upgrade_armor']['dbname']; ?>">Ulepszenia: Pancerz</option>
			<option value="<?php echo $__ITEM['upgrade_weapon']['dbname']; ?>">Ulepszenia: Broń</option>
			<option value="<?php echo $__ITEM['other_value']['dbname']; ?>">Różności: Kosztowność</option>
			<option value="<?php echo $__ITEM['other_component']['dbname']; ?>">Różności: Składnik</option>
			<option value="<?php echo $__ITEM['other_trash']['dbname']; ?>">Różności: Śmieć</option>
		</select>
	</div>
	<div class="form-group">
		<label for="name">Nazwa</label>
		<input id="name" type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label for="level">Minimalny poziom</label>
		<input id="level" type="text" class="form-control" name="level">
	</div>
	<div class="form-group">
		<label for="value1">Wartość 1</label>
		<input id="value1" type="text" class="form-control" name="value1">
	</div>
	<div class="form-group">
		<label for="value2">Wartość 2</label>
		<input id="value2" type="text" class="form-control" name="value2">
	</div>
	<div class="form-group">
		<label for="cost">Koszt</label>
		<input id="cost" type="text" class="form-control" name="cost">
	</div>
	<div class="row">
		<div class="text-center">
			<button class="btn btn-success" type="submit" name="addItem">
				<i class="fa fa-plus"></i> Dodaj przedmiot
			</button>
		</div>
	</div>
</form>