<?php
$list = array();
$sql = "SELECT * FROM `nw_missions` ORDER BY `mid` ASC";
$query = mysql_query($sql);
if(mysql_num_rows($query) > 0) {
	while($row = mysql_fetch_array($query)) {
		$list[] = $row;
	}
}

?>

<div class="text-center">
	<a href="index.php?app=admin&module=mission&section=add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Dodaj zadanie</a>
</div>

<hr>

<?php if(!empty($list)) { ?>

<div class="table-responsive col-md-offset-4 col-md-4">
	<table class="table table-hover table-condensed">
		<tr>
			<th class="text-center">ID</th>
			<th>Nazwa</th>
			<th class="text-right">Opcje</th>
		</tr>
		<?php
			foreach($list as $l) {
				echo "<tr>";
					echo "<td class='text-center'>".$l['mid']."</td>";
					echo "<td>".$l['mName']."</td>";
					echo "<td class='text-right'>";
					?>
						<a href="index.php?app=admin&module=mission&section=edit&id=<?php echo $l['mid']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
						<a href="index.php?app=admin&module=mission&section=delete&id=<?php echo $l['mid']; ?>" class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i></a>
					<?php
					echo "</td>";
				echo "<tr>";
			}
		?>
	</table>
</div>

<?php
} else
	alert("warning", "Brak zadań w bazie danych.");
?>