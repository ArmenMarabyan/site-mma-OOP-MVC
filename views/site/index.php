	<?php require_once ROOT . '/views/layouts/header.php'; ?>
	

	<div class="content">
		<div class="row">
			<div class="col-lg-3 sidebar" style="padding: 0;">
				<div class="logo">
					<a href="/">
						<h1>MMA</h1>
					</a>
				</div>
				<div class="sidebar__inner">
					
				</div>
				
			</div>
			<div class="col-lg-9 col-xs-12 content__main" >
				
				
				<header>
					<?php if ($main_article): ?>
						<div class="header" style="background: url(template/images/articles/3C2XEMp5.jpg) no-repeat; background-size: cover">
							<div class="header__top d-flex">
								<div class="header__top-nav">
									<ul class="d-flex">
										<li><a href="/">Новости</a></li>
										<li><a href="/fighters/">Список бойцов</a></li>
									</ul>
								</div>
								<div class="header__top-search">
									<form action="/search" class="header__search" method="post" role="search">
										
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
								<a href="/news/<?= $main_article['id'] ?>">
									<div class="header__slider">
										<div class="header__slider-info">
											<div class="article__info">
												<span class="source" style="color: #fff;"><?= $main_article['source'] ?></span>
												<span class="date" style="color: #fff;"><?= $main_article['date'] ?></span>
											</div>
											<div class="header__slider-title">
												<h2><?= $main_article['name'] ?></h2>
											</div>
										</div>
									</div>
								</a>
								
							</div>
							<?php else: ?>
								<div class="header article__header">
									<div class="header__top d-flex">
										<div class="header__top-nav d-flex">

											<ul class="d-flex">
												<li><a href="">Новости</a></li>
												<li><a href="">Список бойцов</a></li>
											</ul>
										</div>
										<div class="header__top-search">
											<form action="/search" class="header__search" method="post" role="search">
												
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
								<?php endif ?>


								
								
								
								
							</header>
							<div class="row">

								<div class="col-lg-9" style="margin-bottom: 50px;">
									<div class="content__main-wrapper">
										<div class="wrapper__head">
											<h2>Последние события</h2>
											<div class="wrapper__head-tabs">
												<ul class="d-flex">
													<li><a href="{{route('index')}}">свежее</a></li>
													<li><a href="?sort=views">популярное</a></li>
													<li><a href="">понравившееся</a></li>
												</ul>

												
												
												
											</div>
										</div>
										<?php foreach($newsList as $newsItem): ?>
											<article class="article">
												<div class="article__info">
													<span class="source"><?php echo $newsItem['source']; ?></span>
													<span class="date"><?php echo $newsItem['date']; ?></span>
												</div>
												<a href="/news/<?= $newsItem['id']; ?>" class="article__title"><?php echo $newsItem['name']; ?> </a>
												<div class="article__desc">
													<?php echo $newsItem['short_description']; ?>
												</div>
												
												<div class="article__image">
													<a href="/news/<?= $newsItem['id']; ?>">
														<img src="/template/images/articles/3C2XEMp5.jpg" alt="">
													</a>
												</div>
												<div class="article__footer">
													<div class="article__footer-like">
														<a href="#" class="like__down likes" data-dislike='1' data-id='{{$article->id}}'><i class="fas fa-arrow-down"></i><small class="dislike"></small></a>
													</div>
													<span class='line'>
														<b style="color: #999;">—</b>
													</span>
													<div class="article__footer-like">
														<a href="#" class="like__up likes" data-id='{{$article->id}}' data-like='1'><i class="fas fa-arrow-up"></i> <small class="like">Нравится: </small></a>
													</div>
													<span class="views" style="float: right;">Просмотры: <?php echo $newsItem['views']; ?></span>
												</div>


												

											</article>
										<?php endforeach; ?>

										
										
										
									</div>
									<?= $pagination->get(); ?>
								</div>
								<div class="col-lg-3" id="sticky" style="background-color: #EEE;">
									<div class="content__right-top" id="sidebar">
										<strong>Топ статей</strong>
										<?php foreach ($popularNewsList as $popularNewsItem): ?>
											<a href="/news/<?= $main_article['id'] ?>">
												<div class="top__articles">
													<div class="top__article-image">
														<img src="template/images/articles/3C2XEMp5.jpg" alt="">
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
				</div>
				
				<?php require_once ROOT . '/views/layouts/footer.php'; ?>