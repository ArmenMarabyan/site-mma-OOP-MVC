<?php include ROOT . '/views/layouts/header.php'; ?>
<style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
<div class="row">
	<div class="col-lg-12 col-xs-12 content__main" >
		<div class="header article__header">
			<?php include ROOT . '/views/layouts/mini_header.php'; ?>
			
		</div>
		<?php $fighter_name = ''; ?>
		
		
		<div class="content__main-wrapper">
			<div class="fighter">

				<?php 
				$fighter_name = $fighter['name'];
				?>

				<div class="fighter__name">
					<h1><?= $fighter['name'] ?></h1>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<img src="<?= $fighter['image'] ?>" alt="">
					</div>
					<div class="col-lg-4">
						<div class="fighter__info">
							<ul>
								<li><strong>Прозвище:</strong><?= $fighter['nickname'] ?></li>
								<li><strong>Гражданство:</strong><?= $fighter['nationality'] ?></li>
								<li><strong>Дата рождения:</strong><?= $fighter['bday'] ?></li>
								<li><strong>Рост:</strong><?= $fighter['height'] ?></li>
								<li><strong>Размах рук:</strong><?= $fighter['arm_span'] ?></li>
								<li><strong>Весовая категория:</strong><?= $fighter['w_category'] ?></li>
								<li><strong>Инстаграм:</strong><?= $fighter['insta'] ?></li>
								<li><strong>Твиттер:</strong><?= $fighter['tw'] ?></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="fighter__statistic">
							<h2>Статистика</h2>
						</div>
					</div>
					<div class="col-lg-12 fighter__biography">
						<h4>Общая информация</h4>
						<p><?= $fighter['description'] ?></p>
					</div>
				</div>
				

				
				
				
				
			</div>
			<?php if (count($fighterNewsList) > 0): ?>
				
				
				<div class="fighter__news">
					
					
					<h2>Последние новости с 
						<?php  
						$str=strpos($fighter_name, "(");
						$fighter_name=substr($fighter_name, 0, $str);
						echo $fighter_name;
						?>
					</h2>
					<div class="fighter__news">
						<div class="row">
							<?php foreach ($fighterNewsList as $fighterNewsItem): ?>
								<div class="col-lg-4" style="margin-bottom: 25px;">
									<a href="">
										<div class="fighter__news-thumb">
											<img src="<?= $fighterNewsItem['image'] ?>" class="thumb__image" alt="">
											<div class="thumb__info">
												<span><?= $fighterNewsItem['date'] ?></span>
												<p><?= $fighterNewsItem['name'] ?></p>
											</div>
										</div>
									</a>
								</div>
							<?php endforeach ?>

						</div>
					</div>
					
					
				</div>
			<?php endif ?>
			
			
		</div>				

	</div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>