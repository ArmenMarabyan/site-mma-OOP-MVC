<?php include ROOT . '/views/admin/layouts/admin_header.php'; ?>


<div class="row">
	<div class="col-lg-6">
		<div class="jumbotron">
			<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Бойцы <?=$totalFighters; ?></span></p>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="jumbotron">
			<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Новостей <?=$totalNews; ?></span></p>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		
		<a href="{{route('admin.fighters.index')}}" class="btn btn-secondary btn-lg btn-block">Добавить бойца</a>
		<?php foreach ($fightersList as $fightersItem): ?>
			<a href="" class="list-group-item list-group-item-action list-group-item-light"><?= $fightersItem['name'] ?></a>
		<?php endforeach ?>
		
		
		
	</div>
	<div class="col-lg-6">
		<a href="" class="btn btn-secondary btn-lg btn-block">Добавить статью</a>
		<?php foreach ($newsList as $newsItem): ?>
			<a href="" class="list-group-item list-group-item-action list-group-item-light"><?= $newsItem['name'] ?></a>
		<?php endforeach ?>
	</div>
	

</div>

<?php include ROOT . '/views/admin/layouts/admin_footer.php'; ?>
