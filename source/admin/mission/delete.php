<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	$_missionid = $_GET['id'];
	$_mission = getMission($_missionid);

	if($_mission > 0) {
		if(isset($_POST['submitDelete'])) {
			mysql_query("DELETE FROM `nw_missions` WHERE `iid` = '".$_missionid."'");
			header("Location: index.php?app=admin&module=mission");
		}
		?>

		<form method="post" action="" class="col-md-offset-4 col-md-4">
			<p class="text-center">Czy chcesz usunąć tą misję?</p>
			<b>Nazwa:</b> <?php echo $_mission['mName']; ?><br>
			<b>Opis:</b><br><?php echo $_mission['mDesc']; ?><br>
			<p class="text-center">
				<button class="btn btn-danger" type="submit" name="submitDelete">
					<i class="fa fa-minus"></i> Usuń misję
				</button>
			</p>
		</form>

		<?php
	} else {
		header("Location: index.php?app=admin&module=mission");
	}

} else {
	header("Location: index.php?app=admin&module=mission");
}
?>