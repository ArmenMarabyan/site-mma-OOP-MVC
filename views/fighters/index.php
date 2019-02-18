<?php include ROOT . '/views/layouts/header.php'; ?>
	<style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
	<div class="row">
		<div class="col-lg-12 col-xs-12 content__main" >
			<div class="header article__header">
				<?php include ROOT . '/views/layouts/mini_header.php'; ?>	
			
			</div>
			<div class="content__main-wrapper">
				<div class="row">
					<?php foreach ($fighters as $fighter): ?>
						<div class="col-lg-2" style="padding-right: 1px; padding-left: 1px;">
							<div class="fighters__item">
								<div class="fighters__item-image">
									<a href="/fighters/<?= $fighter['id'] ?>">
										<img src="<?= $fighter['image'] ?>" alt="">
									</a>
								</div>
								<div class="fighters__item-name">
									<?= $fighter['name'] ?>
								</div>
							</div>
						</div>
					<?php endforeach ?>

				</div>

				
			</div>
			<div class="col-lg-12" style="text-align: center;">
				<?= $pagination->get(); ?>
			</div>
			

		</div>
	</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>