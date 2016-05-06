<?php
$list = array();
$sql = "SELECT * FROM `nw_items` ORDER BY `iid` ASC";
$query = mysql_query($sql);
if(mysql_num_rows($query) > 0) {
	while($row = mysql_fetch_array($query)) {
		$list[] = $row;
	}
}

?>

<div class="text-center">
	<a href="index.php?app=admin&module=item&section=add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Dodaj przedmiot</a>
</div>

<hr>

<?php if(!empty($list)) { ?>

<div class="table-responsive col-md-offset-2 col-md-8">
	<table class="table table-hover table-condensed">
		<tr>
			<th class="text-center">ID</th>
			<th>Typ</th>
			<th>Nazwa</th>
			<th>Wartość 1</th>
			<th>Wartość 2</th>
			<th>Cena</th>
			<th class="text-right">Opcje</th>
		</tr>
		<?php
			foreach($list as $l) {
				echo "<tr>";
					echo "<td class='text-center'>".$l['iid']."</td>";
					echo "<td>".$__ITEM[$l['iType']]['name']."</td>";
					echo "<td>".$l['iName']."</td>";
					echo "<td>".$l['iValue1']."</td>";
					echo "<td>".$l['iValue2']."</td>";
					echo "<td>".$l['iCost']."</td>";
					echo "<td class='text-right'>";
					?>
						<a href="index.php?app=admin&module=item&section=edit&id=<?php echo $l['iid']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
						<a href="index.php?app=admin&module=item&section=delete&id=<?php echo $l['iid']; ?>" class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i></a>
					<?php
					echo "</td>";
				echo "<tr>";
			}
		?>
	</table>
</div>

<?php
} else
	alert("warning", "Brak przedmiotów w bazie danych.");
?>