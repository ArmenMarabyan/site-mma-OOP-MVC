<div class="header__top d-flex">
	<div class="header__top-nav d-flex">
		<a href="/">
			<h1>MMA</h1>
		</a>
		<ul class="d-flex">
			<li><a href="">Новости</a></li>
			<li><a href="">Список бойцов</a></li>
		</ul>
	</div>
	<div class="header__top-search">
		<form action="/fighters_search" class="header__search" method="post" role="search">
			
			<input type="text" class="header__search-input" name="search">
			<button type="submit" class="header__search-btn" ><i class="fas fa-search"></i></button>
		</form>
	</div>
	<div class="header__top-user">
		<a href="javascript:void(0);" class="user__icon"><i class="fas fa-user"></i></a>
		
		
		<?php if (User::isGuest()): ?>
			<div class="user__signIn">
				<h3>Авторизация</h3>
				<a href="/login">Войти</a>
				<a href="/register">Регистрация</a>
			</div>
			<?php else: ?>
				<?php 
				$user = User::getUserById($_SESSION['user']);
				?>
				<div class="user__signIn">
					<img src="<?= $user['image'] ?>" alt="">
					<h3><?= $user['name'] ?></h3>
					<a href="/cabinet">В кабинет</a>
					<a href="/logout">Выйти</a>
				</div>
			<?php endif ?>
			
		</div>
	</div>