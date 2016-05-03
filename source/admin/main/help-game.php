<h3>Ekwipunek</h3>

<h4>Pancerz</h4>
<ul>
	<b>Głowa:</b>
	<li>test</li>
</ul>
<ul>
	<b>Korpus:</b>
	<li>test</li>
</ul>
<ul>
	<b>Ręce:</b>
	<li>test</li>
</ul>
<ul>
	<b>Nogi:</b>
	<li>test</li>
</ul>

<h4>Broń</h4>
<ul>
	<b>Palna:</b>
	<li>test</li>
</ul>
<ul>
	<b>Biała:</b>
	<li>test</li>
</ul>
<ul>
	<b>Amunicja:</b>
	<li>test</li>
</ul>
<ul>
	<b>Miotana:</b>
	<li>test</li>
</ul>

<h4>Ulepszenia</h4>
<ul>
	<b>Pancerz:</b>
	<li>test</li>
</ul>
<ul>
	<b>Broń:</b>
	<li>test</li>
</ul>

<h4>Różności</h4>
<ul>
	<b>Kosztowność:</b>
	<li>Klejnot</li>
</ul>
<ul>
	<b>Składnik:</b>
	<li>Złom</li>
</ul>
<ul>
	<b>Śmieć:</b>
	<li>test</li>
</ul>
przerobić na tabelkę: nazwa, typ

<hr>

<h3>Wytwarzanie</h3>

test

<hr>

<h3>Osiągnięcia</h3>

test

<hr>

<h3>Przeliczniki</h3>

<div class="col-md-3 text-center">
	<h4>Poziomy</h4>
	<kbd>Wzór: <code>25 * (2 ^ (Poziom - 1))</code></kbd>

	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th class="text-center">Poziom</th>
				<th class="text-center">Doświadczenie do awansu</th>
			</tr>
			
			<?php
			for($i = 1; $i <= 10; $i++) {
				echo "<tr class='text-center'>";
					echo "<td>".$i."</td><td><i class='fa fa-graduation-cap' style='color: #c77800;'></i> ".(25 * pow(2, $i-1))."</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>

<div class="col-md-3 text-center">
	<h4>Umiejętności</h4>
	<kbd>Wzór: <code>5 + ((Poziom - 1) * Poziom) / 2</code></kbd><br>
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th class="text-center">Poziom</th>
				<th class="text-center">Koszt</th>
			</tr>
			
			<?php
			for($i = 1; $i <= 10; $i++) {
				echo "<tr class='text-center'>";
					echo "<td>".$i."</td><td><i class='fa fa-dollar' style='color: #45de76;'></i> ".(5 + (($i-1)*$i)/2)."</td>";
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