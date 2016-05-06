<h3><i class="fa fa-suitcase"></i> Typy przedmiotów</h3>
<div class="table-responsive">
	<table class="table table-hover table-condensed">
		<tr>
			<th>ID</th>
			<th>Nazwa</th>
			<th>Nazwa w bazie</th>
			<th>Wartość 1</th>
			<th>Wartość 2</th>
		</tr>
		
		<tr>
			<td><?php echo $__ITEM['armor_head']['type']; ?></td>
			<td><?php echo $__ITEM['armor_head']['name']; ?></td>
			<td><?php echo $__ITEM['armor_head']['dbname']; ?></td>
			<td>+kondycja</td>
			<td>+wytrzymałość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['armor_body']['type']; ?></td>
			<td><?php echo $__ITEM['armor_body']['name']; ?></td>
			<td><?php echo $__ITEM['armor_body']['dbname']; ?></td>
			<td>+kondycja</td>
			<td>+wytrzymałość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['armor_hands']['type']; ?></td>
			<td><?php echo $__ITEM['armor_hands']['name']; ?></td>
			<td><?php echo $__ITEM['armor_hands']['dbname']; ?></td>
			<td>+kondycja</td>
			<td>+wytrzymałość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['armor_legs']['type']; ?></td>
			<td><?php echo $__ITEM['armor_legs']['name']; ?></td>
			<td><?php echo $__ITEM['armor_legs']['dbname']; ?></td>
			<td>+kondycja</td>
			<td>+wytrzymałość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['weapon_gun']['type']; ?></td>
			<td><?php echo $__ITEM['weapon_gun']['name']; ?></td>
			<td><?php echo $__ITEM['weapon_gun']['dbname']; ?></td>
			<td>+celność</td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['weapon_white']['type']; ?></td>
			<td><?php echo $__ITEM['weapon_white']['name']; ?></td>
			<td><?php echo $__ITEM['weapon_white']['dbname']; ?></td>
			<td>+celność</td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['weapon_ammo']['type']; ?></td>
			<td><?php echo $__ITEM['weapon_ammo']['name']; ?></td>
			<td><?php echo $__ITEM['weapon_ammo']['dbname']; ?></td>
			<td>+celność</td>
			<td>ilość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['weapon_thrown']['type']; ?></td>
			<td><?php echo $__ITEM['weapon_thrown']['name']; ?></td>
			<td><?php echo $__ITEM['weapon_thrown']['dbname']; ?></td>
			<td>+celność</td>
			<td>ilość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['upgrade_armor']['type']; ?></td>
			<td><?php echo $__ITEM['upgrade_armor']['name']; ?></td>
			<td><?php echo $__ITEM['upgrade_armor']['dbname']; ?></td>
			<td>+kondycja</td>
			<td>+wytrzymałość</td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['upgrade_weapon']['type']; ?></td>
			<td><?php echo $__ITEM['upgrade_weapon']['name']; ?></td>
			<td><?php echo $__ITEM['upgrade_weapon']['dbname']; ?></td>
			<td>+celność</td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['other_value']['type']; ?></td>
			<td><?php echo $__ITEM['other_value']['name']; ?></td>
			<td><?php echo $__ITEM['other_value']['dbname']; ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['other_component']['type']; ?></td>
			<td><?php echo $__ITEM['other_component']['name']; ?></td>
			<td><?php echo $__ITEM['other_component']['dbname']; ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><?php echo $__ITEM['other_trash']['type']; ?></td>
			<td><?php echo $__ITEM['other_trash']['name']; ?></td>
			<td><?php echo $__ITEM['other_trash']['dbname']; ?></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>

<hr>

<h3><i class="fa fa-cubes"></i> Wytwarzanie</h3>

test

<hr>

<h3><i class="fa fa-star-half-o"></i> Osiągnięcia</h3>

test

<hr>

<h3><i class="fa fa-calculator"></i> Przeliczniki</h3>

<div class="row">
	<div class="col-md-3 text-center">
		<h4>Poziomy</h4>
		<kbd>Wzór: <code>expTo * (2 ^ (Poziom - 1))</code></kbd>

		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">Poziom</th>
					<th class="text-center">Doświadczenie do awansu</th>
				</tr>
				
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<tr class='text-center'>";
						echo "<td>".$i."</td><td><i class='fa fa-graduation-cap' style='color: #c77800;'></i> ".($__SETTINGS['expTo'] * pow(2, $i-1))."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>

	<div class="col-md-3 text-center">
		<h4>Umiejętności</h4>
		<kbd>Wzór: <code>skillCost + ((Poziom - 1) * Poziom) / 2</code></kbd><br>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">Poziom</th>
					<th class="text-center">Koszt</th>
				</tr>
				
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<tr class='text-center'>";
						echo "<td>".$i."</td><td><i class='fa fa-dollar' style='color: #45de76;'></i> ".($__SETTINGS['skillCost'] + (($i-1)*$i)/2)."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>

	<div class="col-md-3 text-center">
		<h4>Zadania</h4>
		<kbd>Wzór: <code>expMin += 5 * Poziom</code> - <code>expMax += 10 * Poziom</code></kbd><br>
		<kbd>Wzór: <code>moneyMin += 2 * Poziom</code> - <code>moneyMax += 5 * Poziom</code></kbd>

		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">Poziom</th>
					<th class="text-center">Doświadczenie</th>
					<th class="text-center">Gotówka</th>
				</tr>
				
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<tr class='text-center'>";
						echo "<td>".$i."</td><td><i class='fa fa-graduation-cap' style='color: #c77800;'></i> ".($__SETTINGS['expMin'] += 5*$i)."-".($__SETTINGS['expMax'] += 10*$i)."</td><td><i class='fa fa-dollar' style='color: #45de76;'></i> ".($__SETTINGS['moneyMin'] += 2*$i)."-".($__SETTINGS['moneyMin'] += 5*$i)."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>

	<div class="col-md-3 text-center">
		<h4>Praca (1 godzina)</h4>
		<kbd>Wzór: <code>workPayment += 2 * (Poziom - 1)</code></kbd>

		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">Poziom</th>
					<th class="text-center">Nagroda</th>
				</tr>
				
				<?php
				for($i = 1; $i <= 10; $i++) {
					echo "<tr class='text-center'>";
						echo "<td>".$i."</td><td><i class='fa fa-dollar' style='color: #45de76;'></i> ".($__SETTINGS['workPayment'] += 2*($i-1))."</td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>