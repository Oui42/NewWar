<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	$_itemid = $_GET['id'];
	$_item = getItem($_itemid);

	if($_item > 0) {
		$type = $_item['iType'];
		$name = $_item['iName'];
		$value1 = $_item['iValue2'];
		$value2 = $_item['iValue2'];
		$cost = $_item['iCost'];

		if(isset($_POST['submitSave'])) {
			$error = array();

			$type = $_POST['type'];
			$name = isset($_POST['name'])? $_POST['name'] : "";
			$value1 = isset($_POST['value1'])? $_POST['value1'] : "";
			$value2 = isset($_POST['value2'])? $_POST['value2'] : "";
			$cost = isset($_POST['cost'])? $_POST['cost'] : "";

			if(empty($name) || empty($value1) || empty($value2) || empty($cost)) {
				$error[] = "Wypełnij wszystkie pola.";
			} else {
				if(strlen($name) < 3 || strlen($name) > 32)
					$error[] = "Nazwa musi mieć minimum 3 i maksimum 32 znaki.";

				if(strlen($value1) > 8 || !is_numeric($value1))
					$error[] = "Wartość 1 musi być liczbą i może mieć maksymalnie 8 cyfr.";

				if(strlen($value2) > 8 || !is_numeric($value2))
					$error[] = "Wartość 2 musi być liczbą i może mieć maksymalnie 8 cyfr.";

				if(strlen($cost) > 8 || !is_numeric($cost))
					$error[] = "Koszt musi być liczbą i może mieć maksymalnie 8 cyfr.";
			}

			if(empty($error)) {
				mysql_query("UPDATE `nw_items` SET `iType` = '".$type."', `iName` = '".$name."', `iValue1` = '".$value1."', `iValue2` = '".$value2."', `iCost` = '".$cost."' WHERE `iid` = '".$_itemid."'");
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
					<option <?php if($type == $__ITEM['armor_head']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['armor_head']['dbname']; ?>">Pancerz: Głowa</option>
					<option <?php if($type == $__ITEM['armor_body']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['armor_body']['dbname']; ?>">Pancerz: Korpus</option>
					<option <?php if($type == $__ITEM['armor_hands']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['armor_hands']['dbname']; ?>">Pancerz: Ręce</option>
					<option <?php if($type == $__ITEM['armor_legs']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['armor_legs']['dbname']; ?>">Pancerz: Nogi</option>
					<option <?php if($type == $__ITEM['weapon_gun']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['weapon_gun']['dbname']; ?>">Broń: Palna</option>
					<option <?php if($type == $__ITEM['weapon_white']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['weapon_white']['dbname']; ?>">Broń: Biała</option>
					<option <?php if($type == $__ITEM['weapon_ammo']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['weapon_ammo']['dbname']; ?>">Broń: Amunicja</option>
					<option <?php if($type == $__ITEM['weapon_thrown']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['weapon_thrown']['dbname']; ?>">Broń: Miotana</option>
					<option <?php if($type == $__ITEM['upgrade_armor']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['upgrade_armor']['dbname']; ?>">Ulepszenia: Pancerz</option>
					<option <?php if($type == $__ITEM['upgrade_weapon']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['upgrade_weapon']['dbname']; ?>">Ulepszenia: Broń</option>
					<option <?php if($type == $__ITEM['other_value']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['other_value']['dbname']; ?>">Różności: Kosztowność</option>
					<option <?php if($type == $__ITEM['other_component']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['other_component']['dbname']; ?>">Różności: Składnik</option>
					<option <?php if($type == $__ITEM['other_trash']['dbname']) echo 'selected'; ?> value="<?php echo $__ITEM['other_trash']['dbname']; ?>">Różności: Śmieć</option>
				</select>
			</div>
			<div class="form-group">
				<label for="name">Nazwa</label>
				<input id="name" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="value1">Wartość 1</label>
				<input id="value1" type="text" class="form-control" name="value1" value="<?php echo $value1; ?>">
			</div>
			<div class="form-group">
				<label for="value2">Wartość 2</label>
				<input id="value2" type="text" class="form-control" name="value2" value="<?php echo $value2; ?>">
			</div>
			<div class="form-group">
				<label for="cost">Koszt</label>
				<input id="cost" type="text" class="form-control" name="cost" value="<?php echo $cost; ?>">
			</div>
			<div class="row">
				<div class="text-center">
					<button class="btn btn-success" type="submit" name="submitSave">
						<i class="fa fa-check"></i> Zapisz przedmiot
					</button>
				</div>
			</div>
		</form>

		<?php
	} else {
		header("Location: index.php?app=admin&module=item");
	}

} else {
	header("Location: index.php?app=admin&module=item");
}
?>