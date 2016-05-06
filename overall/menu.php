	<div class="nav-side-menu">
		<div class="brand"><a href="index.php" style="color: #ffffff; text-decoration: none;">New-War.net</a></div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

		<div class="menu-list">
			<ul id="menu-content" class="menu-content collapse out">
				<li>
					<a href="index.php"><i class="fa fa-home fa-lg"></i> Strona Główna</a>
				</li>

				<?php if(!isset($user)) { ?>
					<li>
						<a href="index.php?app=user&module=session&section=register" style="color: #66c4e8;"><i class="fa fa-user-plus fa-lg"></i> Stwórz Konto</a>
					</li>

					<li>
						<a href="index.php?app=user&module=session&section=login" style="color: #45de76;"><i class="fa fa-sign-in fa-lg"></i> Zaloguj się</a>
					</li>
				<?php } else { ?>

					<li>
						<a href="index.php?app=user"><i class="fa fa-user fa-lg"></i> Profil [<?php echo $user['uLogin']; ?>]</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-cubes fa-lg"></i> Wytwarzanie</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-map-o fa-lg"></i> Zadania</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-money fa-lg"></i> Praca</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-crosshairs fa-lg"></i> Pojedynek</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-bank fa-lg"></i> Bank</a>
					</li>

					<li data-toggle="collapse" data-target="#shop" class="collapsed">
						<a href="#"><i class="fa fa-shopping-cart fa-lg"></i> Sklep <span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="shop">
						<li><a href="#">Ekwipunek</a></li>
						<li><a href="#">Ulepszenia</a></li>
						<li><a href="#">Różności</a></li>
					</ul>

					<li>
						<a href="#"><i class="fa fa-group fa-lg"></i> Drużyna</a>
					</li>

					<li data-toggle="collapse" data-target="#rank" class="collapsed">
						<a href="#"><i class="fa fa-trophy fa-lg"></i> Ranking <span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="rank">
						<li><a href="#">Gracze</a></li>
						<li><a href="#">Drużyny</a></li>
					</ul>

					<li>
						<a href="#"><i class="fa fa-star-half-o fa-lg"></i> Osiągnięcia</a>
					</li>

					<li data-toggle="collapse" data-target="#settings" class="collapsed">
						<a href="#"><i class="fa fa-cogs fa-lg"></i> Ustawienia <span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="settings">
						<li><a href="#">Profil</a></li>
						<li><a href="#">Hasło</a></li>
						<li><a href="#">E-mail</a></li>
					</ul>

					<?php if($user['uRank'] >= $__RANK['admin']) { ?>
					<li data-toggle="collapse" data-target="#admin" class="collapsed">
						<a href="#" style="color: #d82f34;"><i class="fa fa-star fa-lg"></i> Panel Administratora <span class="arrow"></span></a>
					</li>
					<ul class="sub-menu collapse" id="admin">
						<li><a href="#">Ustawienia</a></li>
						<li><a href="index.php?app=admin&module=user">Gracze</a></li>
						<li><a href="#">Drużyny</a></li>
						<li><a href="index.php?app=admin&module=mission">Zadania</a></li>
						<li><a href="index.php?app=admin&module=item">Przedmioty</a></li>
						<li><a href="#">Raporty <span class="label label-danger">x</span></a></li>
						<li><a href="index.php?app=admin&module=main&section=help-game">Pomoc Gra</a></li>
						<li><a href="index.php?app=admin&module=main&section=help-dev">Pomoc WWW</a></li>
					</ul>
				<?php
					}
				}
				?>

				<?php if(isset($user)) { ?>
				<li>
					<a href="index.php?app=user&module=session&section=logout"><i class="fa fa-power-off fa-lg"></i> Wyloguj</a>
				</li>
				<?php } ?>

				<div id="footer">
					<span style="color: #7a7a7a;">
						<a href="#" style="color: #7a7a7a;">Forum</a> |
						<a href="#" style="color: #7a7a7a;">Regulamin</a> |
						<a href="#" style="color: #7a7a7a;">FAQ</a><br>
						All Rights Reserved &copy; <a href="#">New-War.net</a>
					</span>
				</div>
			</ul>
		</div>
	</div>