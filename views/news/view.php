<?php require ROOT . '/views/layouts/header.php'; ?>
<style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
<div class="row">
	
	<div class="col-lg-12 col-xs-12 content__main" >
		
		
		
		<div class="header article__header">
			<?php require_once ROOT.'/views/layouts/mini_header.php' ?>
			
		</div>
		<div class="row">

			<div class="col-lg-9" style="margin-bottom: 50px;">
				<div class="content__main-wrapper">


					<div class="open__article">
						<div class="open__article-info">
							<span class="source"><?= $newsItem['source'] ?></span>
							<span class="date"><?= $newsItem['date'] ?></span>
							<span class="views" style="float: right;"><i class="fas fa-eye"></i> <?= $newsItem['views'] ?></span>
						</div>
						<h1 ><?= $newsItem['name'] ?></h1>
						<div class="open__article-desc">
							<?= $newsItem['short_description'] ?>
						</div>
						
						<div class="open__article-image">
							<img src="/template/images/articles/3C2XEMp5.jpg" alt="">
						</div>

						<div class="open__article-full-desc" style="font-size: 15px;">
							<?= $newsItem['description'] ?>
						</div>
						
						<div class="open__article-comments">
							<?php if (isset($errors) && is_array($errors)): ?>
							<div class="alert alert-danger" role="alert">
								<ul>
									<?php foreach ($errors as $error): ?>
										<li> - <?= $error ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						<?php endif ?>


						<form class="form-horizontal" action="" method="post" id="ajax_form">
							<?php if (User::isGuest()): ?>
								<div class="form-group">
									<textarea name="user_comment" class="form-control" id="" cols="30" rows="5"></textarea>
								</div>

								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Имя">
								</div>

								<div class="form-group">	
									<input type="button" class="btn btn-primary form-control col-3" id="add_comment" name="submit" value="Добавить" onclick="alert('Для добавления комментариев необходимо авторизоваться на сайте!')">
								</div>

								
								<?php else: ?>
									<?php 
									$user = User::getUserById($_SESSION['user']);
									?>
									
									<div class="form-group">
										<textarea name="user_comment" class="form-control" id="user_comment" cols="30" rows="5"></textarea>
									</div>

									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control col-3" value="<?= $user['name']; ?>" placeholder="Имя">
									</div>

									<div class="form-group">
										<input type="submit" class="btn btn-primary form-control col-3" id="add_comment" data-id="<?= $newsItem['id'] ?>" name="submit" value="Добавить">
									</div>
									
									
								<?php endif ?>
							</form>
							<hr>
							<div class="comments__list">
								<?php foreach ($commentsList as $comment): ?>
									<div class="comment">
										<div class="comment__avatar">
											<img src="/template/images/users/no_image.jpeg" alt="">
										</div>
										<div class="comment__info">
											<span class="comment__info-name"><?= $comment['name'] ?></span>
											<span class="comment__info-date"><?= $comment['date'] ?></span>
											<div class="comment__text"><?= $comment['user_comment'] ?></div>
										</div>
									</div>
								<?php endforeach ?>
								
							</div>

						</div>

					</div>
					
					
				</div>
			</div>
			<div class="col-lg-3" id="sticky" style="background-color: #EEE;">
				<div class="content__right-top" id="sidebar">
					<strong>Новые материалы</strong>
					<?php foreach ($latestNews as $latestNewsItem): ?>
						<a href="/news/<?= $latestNewsItem['alias']; ?>">
							<div class="top__articles">
								<div class="top__article-image">
									<img src="/template/images/articles/3C2XEMp5.jpg" alt="">
								</div>
								<div class="top__article-title">
									<?= $latestNewsItem['name']; ?>
								</div>
								<div class="top__article-views">
									<small><?= $latestNewsItem['views']; ?> Просмотров</small>
								</div>
							</div>
						</a>
					<?php endforeach ?>
					
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php require ROOT . '/views/layouts/footer.php'; ?>
<script>
    $(document).ready(function(){
        $("#add_comment").click(function(e){
            e.preventDefault();

            var userComment = $("#user_comment").val();
            var userName = $("#name").val();
           	var id = this.getAttribute('data-id');

            var postData = {'user_comment': userComment, 'name' : userName};

            $.ajax({ 
            	url: "/comment/addAjax/"+id,
		     	data: postData,
		     	type: 'post',
		     	dataType:'html',
		     	success: function(output) {
		            var commentItem = JSON.parse(output);
		            $('.comments__list').append('<div class="comment"><div class="comment__avatar"><img src="/template/images/users/no_image.jpeg" alt=""></div><div class="comment__info"><span class="comment__info-name">'+commentItem[0].name+'</span><span class="comment__info-date"> '+commentItem[0].date+'</span><div class="comment__text">'+commentItem[0].user_comment+'</div></div></div></div>');
		            $("#user_comment").val('')
		        },
		      	error: function(request, status, error){
		        	alert("Error: Could not delete");
		      	}
			});


        })
    })
</script>

