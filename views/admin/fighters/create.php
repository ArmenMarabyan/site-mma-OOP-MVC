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
            Боец добавлен!
        </div>
    <?php endif ?>

	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Имя</label>
					<input type="text" class="form-control" name="name" placeholder="Имя" value="<?= $opt['name'] ?>">
				</div>

				<div class="form-group">
					<label for="description">Описание</label>
					<textarea class="form-control" id="description" name="description"><?= $opt['description'] ?></textarea>
				</div>

				<div class="form-group">
					<label for="">Ник</label>
					<input type="text" class="form-control" name="nickname" placeholder="nickname" value="<?= $opt['nickname'] ?>">
				</div>

				<div class="form-group">
					<label for="">nationality</label>
					<input type="text" class="form-control" name="nationality" placeholder="nationality" value="<?= $opt['nationality'] ?>">
				</div>

				<div class="form-group">
					<label for="">bday</label>
					<input type="text" class="form-control" name="bday" placeholder="bday" value="<?= $opt['bday'] ?>">
				</div>

				<div class="form-group">
					<label for="">height</label>
					<input type="text" class="form-control" name="height" placeholder="height" value="<?= $opt['height'] ?>">
				</div>


				

				<div class="row">

					<div class="form-group col-lg-3">
						<label for="">Мета заголовок</label>
						<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="<?= $opt['meta_title'] ?>">
					</div>

					<div class="form-group col-lg-3">
						<label for="">Мета описание</label>
						<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="<?= $opt['meta_description'] ?>">
					</div>

					<div class="form-group col-lg-6">
						<label for="">Ключевые слова</label>
						<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="<?= $opt['meta_keyword'] ?>">
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
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">arm_span</label>
					<input type="text" class="form-control" name="arm_span" placeholder="arm_span" value="<?= $opt['arm_span'] ?>">
				</div>
				<div class="form-group">
					<label for="">w_category</label>
					<input type="text" class="form-control" name="w_category" placeholder="w_category" value="<?= $opt['w_category'] ?>">
				</div>
				<div class="form-group">
					<label for="">insta</label>
					<input type="text" class="form-control" name="insta" placeholder="insta" value="<?= $opt['insta'] ?>">
				</div>
				<div class="form-group">
					<label for="">tw</label>
					<input type="text" class="form-control" name="tw" placeholder="tw" value="<?= $opt['tw'] ?>">
				</div>
				<div class="form-group">
					<label for="">wins</label>
					<input type="text" class="form-control" name="wins" placeholder="wins" value="<?= $opt['wins'] ?>">
				</div>
				<div class="form-group">
					<label for="">loses</label>
					<input type="text" class="form-control" name="loses" placeholder="loses" value="<?= $opt['loses'] ?>">
				</div>
				<div class="form-group">
					<label for="">not_heald</label>
					<input type="text" class="form-control" name="not_heald" placeholder="not_heald" value="<?= $opt['not_heald'] ?>">
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