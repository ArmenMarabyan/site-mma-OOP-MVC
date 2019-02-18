<?php include ROOT . '/views/admin/layouts/admin_header.php'; ?>

<?php if (isset($errors) && is_array($errors)): ?>
<div class="alert alert-danger" role="alert">
	<ul>
		<?php foreach ($errors as $error): ?>
			<li> - <?= $error ?></li>
		<?php endforeach ?>
	</ul>
</div>
<?php endif ?>
<?php if ($result): ?>

	<div class="alert alert-success">
		Новость обновлена!
	</div>
<?php endif ?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
				<label for="">Название статьи</label>
				<input type="text" class="form-control" name="name" placeholder="Заголовок продукта" value="<?= $newsItem['name'] ?>">
			</div>

			<div class="form-group">
				<label for="description">Короткое описание статьи</label>
				<textarea class="form-control" id="description" name="short_description"><?= $newsItem['short_description'] ?></textarea>
			</div>

			<div class="form-group">
				<label for="description">Полное описание статьи</label>
				<textarea class="form-control" id="description" name="description"><?= $newsItem['description'] ?></textarea>
			</div>
			

			<div class="form-group">
				<label for="">Тип статьи</label>
				<select name="main_article" class="form-control" id="">
					<option value="0" <?php if($newsItem['main_article'] == 0) echo 'selected=selected'; ?> >Простая статья</option>
					<option value="1" <?php if($newsItem['main_article'] == 1) echo 'selected=selected'; ?>>Статья для слайдера</option>

				</select>
			</div>

			<div class="form-group">
				<label for="">source</label>
				<input type="text" class="form-control" name="source" placeholder="source" value="<?= $newsItem['source'] ?>">
			</div>

			<div class="row">

				<div class="form-group col-lg-3">
					<label for="">Мета заголовок</label>
					<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="<?= $newsItem['meta_title'] ?>">
				</div>

				<div class="form-group col-lg-3">
					<label for="">Мета описание</label>
					<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="<?= $newsItem['meta_description'] ?>">
				</div>

				<div class="form-group col-lg-5">
					<label for="">Ключевые слова</label>
					<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="<?= $newsItem['meta_keyword'] ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="">Alias</label>
				<input type="text" readonly="" class="form-control" name="alias" placeholder="Автоматическая генерация" value="alias">
			</div>

			<div class="form-group">
				<label for="">Картинки</label>
				<input type="file" name="files" id= "files" class="filestyle image" data-buttonText="asdasd" data-classButton="btn btn-primary">
			</div>

		</div>

	</div>

	<div id="list"></div>
	<input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
	<div id = "div" class="d-flex"></div>


		<!-- <script>
			var count = 0;
			$(document).ready(function() {
				$(document).on('change', "#files", function() {
					if(count == 10) {
				      	// $(".form-horizontal .form-group #files").attr('disabled', 'disabled');
				      	$(".form-horizontal .form-group #files").parent().fadeOut(500);
				    }
				})	
			
			})
		function handleFileSelect(evt) {
			count++
			
			
		    var files = evt.target.files;
		    for (var i = 0, f; f = files[i]; i++) {
		    	
		      if (!f.type.match('image.*')) {
		        continue;
		      }
		      var reader = new FileReader();
		      reader.onload = (function(theFile) {
		        return function(e) {
		          var span = document.createElement('div');
		          span.id = "uploaded_img";
		          span.innerHTML = 
		          [
		            '<span id = "clear" class = "fas fa-times-circle"></span><img class="uploaded_image" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '" /> ',
		            '<input type="hidden" name="files1[]" value="'+e.target.result+'">'
		          ].join('');
		          
		          document.getElementById('list').insertBefore(span, null);
		        };
		      })(f);
		      reader.readAsDataURL(f);
		      
		    }
		    
		  }
		  document.getElementById('files').addEventListener('change', handleFileSelect, false);
		    $(document).on ("click", "#clear", function () {
		        console.log($(this).parent())
		        $(this).parent().remove();
		        count = count - 1;
		        if(count < 5) {
		        	// $(".form-horizontal .form-group #files").removeAttr('disabled');
		        	$(".form-horizontal .form-group #files").parent().fadeIn(500);
		        }
		        if(count == 0) {
		        	$(".form-horizontal .form-group #files").filestyle('clear');
		        }
		    });
		</script> -->

	</form>

	<?php include ROOT . '/views/admin/layouts/admin_footer.php'; ?>