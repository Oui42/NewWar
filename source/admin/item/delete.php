<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
	$_itemid = $_GET['id'];
	$_item = getItem($_itemid);

	if($_item > 0) {
		if(isset($_POST['submitDelete'])) {
			mysql_query("DELETE FROM `nw_items` WHERE `iid` = '".$_itemid."'");
			mysql_query("DELETE FROM `nw_user_items` WHERE `uiItem` = '".$_itemid."'");
			header("Location: index.php?app=admin&module=item");
		}
		?>

		<form method="post" action="" class="col-md-offset-4 col-md-4">
			<p class="text-center">Czy chcesz usunąć ten przedmiot?</p>
			<b>Typ:</b> <?php echo $__ITEM[$_item['iType']]['name']; ?><br>
			<b>Nazwa:</b> <?php echo $_item['iName']; ?><br>
			<b>Poziom:/b> <?php echo $_item['iLevel']; ?><br>
			<b>Wartość 1:</b> <?php echo $_item['iValue1']; ?><br>
			<b>Wartość 2:</b> <?php echo $_item['iValue2']; ?><br>
			<b>Koszt:</b> <?php echo $_item['iCost']; ?><br>
			<p class="text-center">
				<button class="btn btn-danger" type="submit" name="submitDelete">
					<i class="fa fa-minus"></i> Usuń przedmiot
				</button>
			</p>
		</form>

		<?php
	} else {
		header("Location: index.php?app=admin&module=item");
	}

} else {
	header("Location: index.php?app=admin&module=item");
}
?>