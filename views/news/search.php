




<?php require_once ROOT.'/views/layouts/header.php' ?>

<div class="row">
	<div class="col-lg-3 sidebar" style="padding: 0;">
		<div class="logo">
			<a href="/">
				<h1>MMA</h1>
			</a>
		</div>

	</div>
	<div class="col-lg-9 col-xs-12 content__main" >



		<header>
			<div class="header article__header">
				<div class="header__top d-flex">
					<div class="header__top-nav d-flex">

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
			</div>
		</header>
		<div class="row">

			<div class="col-lg-9">
				<div class="content__main-wrapper">

					<?php foreach ($searchedNewsList as $k => $searchedNewsItem): ?>
						<article class="article">
							<div class="article__info">
								<span class="source"><?= $searchedNewsItem['source'] ?></span>
								<span class="date"><?= $searchedNewsItem['date'] ?></span>
							</div>
							<a href="" class="article__title">
								<?php  
								echo str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>',  $searchedNewsItem['name'] );
								?>
							</a>
							<div class="article__desc">
								<?php 
								echo str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>', $searchedNewsItem['short_description'] );
								?>
							</div>

							<div class="article__image">
								<a href="">
									<img src="<?= $searchedNewsItem['image'] ?>" alt="">
								</a>
							</div>

						</article>
					<?php endforeach ?>

					<?= $pagination->get(); ?>
				</div>
			</div>
			<div class="col-lg-3" id="sticky" style="background-color: #EEE;">
				<div class="content__right-top" id="sidebar">
					<strong>Топ 10 статей</strong>
					<?php foreach ($popularNewsList as $popularNewsItem): ?>

						
						<a href="">
							<div class="top__articles">
								<div class="top__article-image">
									<img src="<?= $popularNewsItem['image'] ?>" alt="">
								</div>
								<div class="top__article-title">
									<?= $popularNewsItem['name'] ?>
								</div>
								<div class="top__article-views">
									<small><?= $popularNewsItem['views'] ?> Просмотров</small>
								</div>
							</div>
						</a>
					<?php endforeach ?>

				</div>
			</div>
		</div>
	</div>
</div>


<?php require_once ROOT.'/views/layouts/footer.php' ?>