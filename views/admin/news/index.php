<?php include ROOT . '/views/admin/layouts/admin_header.php'; ?>

<a href="/admin/news/create" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i> Создать новость</a>	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка статьи</th>
		      <th scope="col">Название</th>
		      <th scope="col">Краткое описание</th>
		      <th scope="col">Полное описание</th>
		      <th scope="col">Тип статьи</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	<?php foreach ($newsList as $newsItem): ?>
	    		
	    	

				<tr class="text-center align-middle">
					<th scope="row"><?= $newsItem['id'] ?></th>
				    <td>
				    	<div class="admin__article-image">
				    		<img src="<?= $newsItem['image'] ?>" alt="">
				    	</div>
				    </td>
				    <td >
				    	<a href="{{route('article', $article->alias)}}"><?= $newsItem['name'] ?></a>
				    </td>
				    <td>
						<div class="admin__article-short-desc">
				    		<span><?= $newsItem['short_description'] ?>...</span>
				    	</div>
				    </td>
				    <td>
						<div class="admin__article-desc">
				    		<span><?= $newsItem['description'] ?>...</span>
				    	</div>
				    </td>
				    <td>
						<div class="admin__article-available">
				    		<span>
				    			<?php if ($newsItem['main_article'] != 0): ?>
				    				Главная статья
				    			<?php endif ?>
			
				    		</span>
				    	</div>
				    </td>

				    <td class="text-right">

				    <form action="/admin/news/delete/<?= $newsItem['id'] ?>" onsubmit="if(confirm('Удалить новость?')){return true}else{return false}" method="post">
				    	<input type="hidden" name="_method" value="DELETE">
				    	
						<a href="/admin/news/edit/<?= $newsItem['id'] ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
				    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
				    </form>

				    	

				    </td>
				</tr>
	    	<?php endforeach ?>


	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			<?php if (count($newsList) == 0): ?>
	  				<div class="col-lg-12">
						<h3 class="alert alert-light" style="text-align: center;">Данные отсутсвуют</h3>
					</div>
	  			<?php endif ?>
	  				
	  		</td>
	  	</tr>
	  </tfoot>
	</table>

	<div class="float-right">
		{{$articles->links()}}
	</div>


	<?php include ROOT . '/views/admin/layouts/admin_footer.php'; ?>