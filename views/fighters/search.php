<?php require_once ROOT.'/views/layouts/header.php' ?>

	<div class="row">
		<div class="col-lg-12 col-xs-12 content__main" >
			<div class="header article__header">
				<?php require_once ROOT.'/views/layouts/mini_header.php' ?>
			
			</div>
			<div class="content__main-wrapper">
				<div class="row">
					
					<?php foreach ($searchedFightersList as $searchedFightersItem): ?>
						
					
						<div class="col-lg-2" style="padding-right: 1px; padding-left: 1px;">
							<div class="fighters__item">
								<div class="fighters__item-image">
									<a href="">
										<img src="<?= $searchedFightersItem['image'] ?>" alt="">
									</a>
								</div>
								<div class="fighters__item-name">
									<?= $searchedFightersItem['name'] ?>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				
				</div>
				<!-- {{$results->links()}} -->
			</div>
		</div>
	</div>
<?php require_once ROOT.'/views/layouts/footer.php' ?>