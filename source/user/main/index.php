<?php
$levelPercent = (($user['uExp'] * 100) / ($__SETTINGS['expTo'] * pow(2, $user['uLevel']-1)));

if(isset($_POST['addSkill1'])) {
	$cost = $__SETTINGS['skillCost'] + (($user['uSkill1']-1) * $user['uSkill1']) / 2;
	if($user['uMoney'] >= $cost) {
		mysql_query("UPDATE `nw_users` SET `uSkill1` = '".($user['uSkill1'] + 1)."', `uMoney` = '".($user['uMoney'] - $cost)."' WHERE `uid` = '".$user['uid']."'");
		header("Location: index.php?app=user");
	} else {
		alert("error", "Nie masz wystarczającej ilości pieniędzy.");
	}
}

if(isset($_POST['addSkill2'])) {
	$cost = $__SETTINGS['skillCost'] + (($user['uSkill2']-1) * $user['uSkill2']) / 2;
	if($user['uMoney'] >= $cost) {
		mysql_query("UPDATE `nw_users` SET `uSkill2` = '".($user['uSkill2'] + 1)."', `uMoney` = '".($user['uMoney'] - $cost)."' WHERE `uid` = '".$user['uid']."'");
		header("Location: index.php?app=user");
	} else {
		alert("error", "Nie masz wystarczającej ilości pieniędzy.");
	}
}

if(isset($_POST['addSkill3'])) {
	$cost = $__SETTINGS['skillCost'] + (($user['uSkill3']-1) * $user['uSkill3']) / 2;
	if($user['uMoney'] >= $cost) {
		mysql_query("UPDATE `nw_users` SET `uSkill3` = '".($user['uSkill3'] + 1)."', `uMoney` = '".($user['uMoney'] - $cost)."' WHERE `uid` = '".$user['uid']."'");
		header("Location: index.php?app=user");
	} else {
		alert("error", "Nie masz wystarczającej ilości pieniędzy.");
	}
}

if(isset($_POST['addSkill4'])) {
	$cost = $__SETTINGS['skillCost'] + (($user['uSkill4']-1) * $user['uSkill4']) / 2;
	if($user['uMoney'] >= $cost) {
		mysql_query("UPDATE `nw_users` SET `uSkill4` = '".($user['uSkill4'] + 1)."', `uMoney` = '".($user['uMoney'] - $cost)."' WHERE `uid` = '".$user['uid']."'");
		header("Location: index.php?app=user");
	} else {
		alert("error", "Nie masz wystarczającej ilości pieniędzy.");
	}
}
?>

<div class="text-center">
	<div class="col-md-offset-4 col-md-4">
		<h3>
			<?php echo $user['uLogin']; ?><br>
			<small>[<a href="#">Drużyna</a>]</small>
		</h3>

		<img src="images/user/avatar/example.jpg" alt="avatar" class="img-rounded">

		<h4>Poziom: <?php echo $user['uLevel']; ?></h4>
		<div class="progress" style="margin: 10px auto;">
			<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $levelPercent; ?>" aria-waluemin="0" aria-valuemax="100" style="width: <?php echo $levelPercent; ?>%">
				<span class="badge" style="margin-top: 1px;"><?php echo $levelPercent; ?>%</span>
			</div>
		</div>
	</div>

	<?php if($user['uRank'] >= $__RANK['admin']) { ?>
	<div class="col-md-offset-1 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				Opcje administratora
			</div>
			<div class="panel-body">
				<a href="index.php?app=admin&module=user&section=edit&uid=">Edytuj gracza</a>
			</div>
		</div>
	</div>
	<?php } ?>

	<form method="post" action="">
		<div class="col-md-offset-4 col-md-4">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tr>
						<th class="text-center">Umiejętność</th>
						<th class="text-center">Poziom</th>
						<th class="text-center">Koszt</th>
						<th class="text-center"></th>
					</tr>
					<tr class="text-center">
						<td>Celność</td>
						<td><?php echo $user['uSkill1']; ?></td>
						<td><i class='fa fa-dollar' style='color: #45de76;'></i> <?php echo ($__SETTINGS['skillCost'] + (($user['uSkill1']-1) * $user['uSkill1']) / 2); ?></td>
						<td>
						<?php
						if($user['uMoney'] >= ($__SETTINGS['skillCost'] + (($user['uSkill1']-1) * $user['uSkill1']) / 2))
							echo '<button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name="addSkill1"><i class="fa fa-plus"></i></button>';
						?>
						</td>
					</tr>
					<tr class="text-center">
						<td>Kondycja</td>
						<td><?php echo $user['uSkill2']; ?></td>
						<td><i class='fa fa-dollar' style='color: #45de76;'></i> <?php echo ($__SETTINGS['skillCost'] + (($user['uSkill2']-1) * $user['uSkill2']) / 2); ?></td>
						<td>
						<?php
						if($user['uMoney'] >= ($__SETTINGS['skillCost'] + (($user['uSkill2']-1) * $user['uSkill2']) / 2))
							echo '<button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name="addSkill2"><i class="fa fa-plus"></i></button></td>';
						?>
						</td>
					</tr>
					<tr class="text-center">
						<td>Wytrzymałość</td>
						<td><?php echo $user['uSkill3']; ?></td>
						<td><i class='fa fa-dollar' style='color: #45de76;'></i> <?php echo ($__SETTINGS['skillCost'] + (($user['uSkill3']-1) * $user['uSkill3']) / 2); ?></td>
						<td>
						<?php
						if($user['uMoney'] >= ($__SETTINGS['skillCost'] + (($user['uSkill3']-1) * $user['uSkill3']) / 2))
							echo '<button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name="addSkill3"><i class="fa fa-plus"></i></button></td>';
						?>
						</td>
					</tr>
					<tr class="text-center">
						<td>Inteligencja</td>
						<td><?php echo $user['uSkill4']; ?></td>
						<td><i class='fa fa-dollar' style='color: #45de76;'></i> <?php echo ($__SETTINGS['skillCost'] + (($user['uSkill4']-1) * $user['uSkill4']) / 2); ?></td>
						<td>
						<?php
						if($user['uMoney'] >= ($__SETTINGS['skillCost'] + (($user['uSkill4']-1) * $user['uSkill4']) / 2))
							echo '<button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name="addSkill4"><i class="fa fa-plus"></i></button></td>';
						?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</form>

	<div class="col-md-6">
		<h4>Ekwipunek</h4>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th>Nazwa</th>
					<th>Typ</th>
					<th class="text-center">Opcje</th>
				</tr>
				<tr>
					<td>test</td>
					<td>Pancerz: Głowa</td>
					<td class="text-center">
						<button class="btn btn-xs btn-default" type="submit" name="">Nie używaj</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-6">
		<h4>Plecak (x/10)</h4>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th>Nazwa</th>
					<th>Typ</th>
					<th>Cena</th>
					<th class="text-center">Opcje</th>
				</tr>
				<tr>
					<td>test</td>
					<td>test</td>
					<td>xxx</td>
					<td class="text-center">
						<button class="btn btn-xs btn-default" type="submit" name="">Użyj</button>
						<button class="btn btn-xs btn-default" type="submit" name="">Wyrzuć</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>