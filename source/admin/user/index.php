<?php
$list = array();
$sql = "SELECT * FROM `nw_users` ORDER BY `uid` ASC";
$query = mysql_query($sql);
if(mysql_num_rows($query) > 0) {
	while($row = mysql_fetch_array($query)) {
		$list[] = $row;
	}
}

if(!empty($list)) {
?>

<div class="table-responsive col-md-offset-3 col-md-6">
	<table class="table table-hover table-condensed">
		<tr>
			<th class="text-center">ID</th>
			<th>Login</th>
			<th>E-mail</th>
			<th class="text-right">Opcje</th>
		</tr>
		<?php
			foreach($list as $l) {
				echo "<tr>";
					echo "<td class='text-center'>".$l['uid']."</td>";
					echo "<td><a href=''>".$l['uLogin']."</a></td>";
					echo "<td>".$l['uEmail']."</td>";
					echo "<td class='text-right'>";
					?>
						<a href="index.php?app=admin&module=user&section=edit&uid=<?php echo $l['uid']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
					<?php
					echo "</td>";
				echo "<tr>";
			}
		?>
	</table>
</div>

<?php
} else
	alert("error", "Brak użytkowników w bazie danych.");
?>