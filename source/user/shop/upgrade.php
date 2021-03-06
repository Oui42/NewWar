<div class="row">
	<?php
	$armor_list = array();
	$sql = "SELECT * FROM `nw_items` WHERE `iType` = '".$__ITEM['upgrade_armor']['dbname']."' ORDER BY `iLevel` ASC";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0) {
		while($row = mysql_fetch_array($query)) {
			$armor_list[] = $row;
		}
	}

	$weapon_list = array();
	$sql = "SELECT * FROM `nw_items` WHERE `iType` = '".$__ITEM['upgrade_weapon']['dbname']."' ORDER BY `iLevel` ASC";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0) {
		while($row = mysql_fetch_array($query)) {
			$weapon_list[] = $row;
		}
	}

	if(isset($_POST['buyItem'])) {
		$_itemid = $_POST['buyItem'];
		$_item = getItem($_itemid);

		if($_item > 0) {
			$value = ($_item['iType'] == $__ITEM['weapon_ammo']['dbname'] || $_item['iType'] == $__ITEM['weapon_thrown']['dbname'])? $_item['iValue2'] : 0;

			mysql_query("UPDATE `nw_users` SET `uMoney` = '".($user['uMoney'] - $_item['iCost'])."' WHERE `uid` = '".$user['uid']."'");
			mysql_query("INSERT INTO `nw_user_items` (uiid, uiOwner, uiItem, uiActive, uiValue) VALUES('NULL', '".$user['uid']."', '".$_itemid."', '".$__ITEM_STATUS['unactive']."', '".$value."')") or die(mysql_error());
			header("Location: index.php?app=user&module=shop&section=upgrade");
		}
	}

	if(!empty($armor_list)) {
	?>

	<form method="post" action="">
		<div class="col-md-6">
			<h3 class="text-center">Ulepszenia: Pancerz</h3>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tr>
						<th>Nazwa</th>
						<th class="text-center">Poziom</th>
						<th class="text-center">Kondycja</th>
						<th class="text-center">Wytrzymałość</th>
						<th class="text-center">Cena</th>
						<th></th>
					</tr>
					<?php
						foreach($armor_list as $l) {
							echo "<tr>";
								echo "<td>".$l['iName']."</td>";
								if($user['uLevel'] < $l['iLevel'])
									echo "<td class='text-center'><span class='text-danger'>".$l['iLevel']."</span></td>";
								else
									echo "<td class='text-center'>".$l['iLevel']."</td>";
								echo "<td class='text-center'>".$l['iValue1']."</td>";
								echo "<td class='text-center'>".$l['iValue2']."</td>";
								echo "<td class='text-center'><i class='fa fa-dollar' style='color: #45de76;'></i> ".$l['iCost']."</td>";
								echo "<td class='text-right'>";
									if($user['uMoney'] >= $l['iCost'] && $user['uLevel'] >= $l['iLevel']) {
										echo '<button class="btn btn-xs btn-success" type="submit" name="buyItem" value="'.$l['iid'].'"><i class="fa fa-shopping-basket"></i> Kup</button>';
									}
								echo "</td>";
							echo "<tr>";
						}
					?>
				</table>
			</div>
		</div>
	</form>

	<?php
	}

	if(!empty($weapon_list)) {
	?>

	<form method="post" action="">
		<div class="col-md-6">
			<h3 class="text-center">Ulepszenia: Broń</h3>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tr>
						<th>Nazwa</th>
						<th class="text-center">Poziom</th>
						<th class="text-center">Celność</th>
						<th class="text-center">Cena</th>
						<th></th>
					</tr>
					<?php
						foreach($weapon_list as $l) {
							echo "<tr>";
								if($l['iType'] == $__ITEM['weapon_ammo']['dbname'] || $l['iType'] == $__ITEM['weapon_thrown']['dbname'])
									echo "<td>".$l['iName']." <small>(".$l['iValue2']."szt.)</small></td>";
								else
									echo "<td>".$l['iName']."</td>";
								if($user['uLevel'] < $l['iLevel'])
									echo "<td class='text-center'><span class='text-danger'>".$l['iLevel']."</span></td>";
								else
									echo "<td class='text-center'>".$l['iLevel']."</td>";
								echo "<td class='text-center'>".$l['iValue1']."</td>";
								echo "<td class='text-center'><i class='fa fa-dollar' style='color: #45de76;'></i> ".$l['iCost']."</td>";
								echo "<td class='text-right'>";
									if($user['uMoney'] >= $l['iCost'] && $user['uLevel'] >= $l['iLevel']) {
										echo '<button class="btn btn-xs btn-success" type="submit" name="buyItem" value="'.$l['iid'].'"><i class="fa fa-shopping-basket"></i> Kup</button>';
									}
								echo "</td>";
							echo "<tr>";
						}
					?>
				</table>
			</div>
		</div>
	</form>

	<?php } ?>
</div>

<hr>

<?php
$user_list = array();
$sql = "SELECT * FROM `nw_user_items` WHERE `uiOwner` = '".$user['uid']."' ORDER BY `uiid` ASC";
$query = mysql_query($sql);
if(mysql_num_rows($query) > 0) {
	while($row = mysql_fetch_array($query)) {
		$user_list[] = $row;
	}
}

if(isset($_POST['sellItem'])) {
	$_itemid = $_POST['sellItem'];
	$_useritem = getUserItem($_itemid);
	$_item = getItem($_useritem['uiItem']);

	if($_item > 0) {
		mysql_query("UPDATE `nw_users` SET `uMoney` = '".($user['uMoney'] + intval($_item['iCost'] / $__SETTINGS['sellCost']))."' WHERE `uid` = '".$user['uid']."'");
		mysql_query("DELETE FROM `nw_user_items` WHERE `uiid` = '".$_itemid."'") or die(mysql_error());
		header("Location: index.php?app=user&module=shop&section=upgrade");
	}
}

if(!empty($user_list)) {
?>

<form method="post" action="">
	<div class="col-md-offset-3 col-md-6">
		<h3 class="text-center">Twoje przedmioty</h3>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th>Nazwa</th>
					<th>Typ</th>
					<th class="text-center">Poziom</th>
					<th class="text-center">Cena</th>
					<th></th>
				</tr>
				<?php
					foreach($user_list as $l) {
						$_item = getItem($l['uiItem']);

						echo "<tr>";
							if($_item['iType'] == $__ITEM['weapon_ammo']['dbname'] || $_item['iType'] == $__ITEM['weapon_thrown']['dbname'])
								echo "<td>".$_item['iName']." <small>(".$l['uiValue'].")</small></td>";
							else
								echo "<td>".$_item['iName']."</td>";
							echo "<td>".$_item['iName']."</td>";
							echo "<td>".$__ITEM[$_item['iType']]['name']."</td>";
							if($user['uLevel'] < $_item['iLevel'])
								echo "<td class='text-center'><span class='text-danger'>".$_item['iLevel']."</span></td>";
							else
								echo "<td class='text-center'>".$_item['iLevel']."</td>";
							echo "<td class='text-center'><i class='fa fa-dollar' style='color: #45de76;'></i> ".intval($_item['iCost'] / $__SETTINGS['sellCost'])."</td>";
							echo "<td class='text-right'>";
								if($l['uiActive'] != $__ITEM_STATUS['active']) {
									echo '<button class="btn btn-xs btn-success" type="submit" name="sellItem" value="'.$l['uiid'].'"><i class="fa fa-shopping-basket"></i> Sprzedaj</button>';
								}
							echo "</td>";
						echo "<tr>";
					}
				?>
			</table>
		</div>
	</div>
</form>

<?php } ?>