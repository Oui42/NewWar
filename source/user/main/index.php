<div class="text-center">
	<h3>
		<?php echo $user['uLogin']; ?><br>
		<small>[<a href="#">Drużyna</a>]</small>
	</h3>

	<img src="images/user/avatar/example.jpg" alt="avatar" class="img-rounded">

	<h4>Poziom: <?php echo $user['uLevel']; ?></h4>
	<div class="progress" style="width: 30%; margin: 10px auto;">
		<div class="progress-bar" role="progressbar" aria-valuenow="20" aria-waluemin="0" aria-valuemax="100" style="width: 20%">
			<span class="badge" style="margin-top: 1px;">20%</span>
		</div>
	</div>

	<div class="col-md-offset-4 col-md-4">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th class="text-center">Skill</th>
					<th class="text-center">Poziom</th>
					<th class="text-center">Koszt</th>
					<th class="text-center"></th>
				</tr>
				<tr class="text-center">
					<td>Skill1</td>
					<td><?php echo $user['uSkill1']; ?>
					<td>xxx</td>
					<td><button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name=""><i class="fa fa-plus"></i></button></td>
				</tr>
				<tr class="text-center">
					<td>Skill2</td>
					<td><?php echo $user['uSkill2']; ?>
					<td>xxx</td>
					<td><button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name=""><i class="fa fa-plus"></i></button></td>
				</tr>
				<tr class="text-center">
					<td>Skill3</td>
					<td><?php echo $user['uSkill3']; ?>
					<td>xxx</td>
					<td><button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name=""><i class="fa fa-plus"></i></button></td>
				</tr>
				<tr class="text-center">
					<td>Skill4</td>
					<td><?php echo $user['uSkill4']; ?>
					<td>xxx</td>
					<td><button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-placement="right" title="Kup" name=""><i class="fa fa-plus"></i></button></td>
				</tr>
			</table>
		</div>
	</div>

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