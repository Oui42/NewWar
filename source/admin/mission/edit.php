<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	$_missionid = $_GET['id'];
	$_mission = getMission($_missionid);

	if($_mission > 0) {
		$name = $_mission['mName'];
		$desc = $_mission['mDesc'];

		if(isset($_POST['submitSave'])) {
			$error = array();

			$name = isset($_POST['name'])? $_POST['name'] : "";
			$desc = isset($_POST['desc'])? $_POST['desc'] : "";

			if(empty($name) || empty($desc)) {
				$error[] = "Wypełnij wszystkie pola.";
			} else {
				if(strlen($name) < 3 || strlen($name) > 32)
					$error[] = "Nazwa musi mieć minimum 3 i maksimum 32 znaki.";

				if(strlen($desc) < 3)
					$error[] = "Opis musi mieć minimum 3 znaki.";
			}

			if(empty($error)) {
				mysql_query("UPDATE `nw_missions` SET `mName` = '".$name."', `mDesc` = '".$desc."' WHERE `mid` = '".$_missionid."'");
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
				<input id="name" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="form-group">
				<label for="desc">Opis</label>
				<textarea id="desc" class="form-control" rows="5" name="desc" style="resize: vertical;"><?php echo $desc; ?></textarea>
			</div>
			<div class="row">
				<div class="text-center">
					<button class="btn btn-success" type="submit" name="submitSave">
						<i class="fa fa-check"></i> Zapisz zadanie
					</button>
				</div>
			</div>
		</form>

		<?php
	} else {
		header("Location: index.php?app=admin&module=mission");
	}

} else {
	header("Location: index.php?app=admin&module=mission");
}
?>