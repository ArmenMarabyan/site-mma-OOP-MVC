<?php include ROOT . '/views/admin/layouts/admin_header.php'; ?>

<a href="/admin/fighters/create" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i>Добавить бойца</a>	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка статьи</th>
		      <th scope="col">Название</th>
		      <th scope="col">описание</th>

		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	<?php foreach ($fighters as $fighter): ?>
	    		
	    	

				<tr class="text-center align-middle">
					<th scope="row"><?= $fighter['id'] ?></th>
				    <td>
				    	<div class="admin__article-image">
				    		<img src="<?= $fighter['image'] ?>" alt="">
				    	</div>
				    </td>
				    <td >
				    	<a href="{{route('article', $article->alias)}}"><?= $fighter['name'] ?></a>
				    </td>
				    <td>
						<div class="admin__article-short-desc">
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
				    </td>
				    

				    <td class="text-right">

				    <form action="/admin/fighters/delete/<?= $fighter['id'] ?>" onsubmit="if(confirm('Удалить новость?')){return true}else{return false}" method="post">
				    	<input type="hidden" name="_method" value="DELETE">
				    	
						<a href="/admin/fighters/edit/<?= $fighter['id'] ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
				    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
				    </form>

				    	

				    </td>
				</tr>
	    	<?php endforeach ?>


	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			<?php if (is_array($fighters) && count($fighters) == 0): ?>
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