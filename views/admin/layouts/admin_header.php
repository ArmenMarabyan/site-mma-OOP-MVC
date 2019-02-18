<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/template/css/style.css">

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src='/template/js/common.js' defer></script>
</head>
<body style="background-color: #fff !important; ">
	<div id="wrapper" style="height: 100%; ">
		
		
		
		<div class="container-fluid h-100" style="padding-left: 0;">
			<div class="row h-100">
				<div class="col-lg-2 admin_sidebarMenu hidden-md-down" style="padding-right: 0; padding-top: 0;">
					<div class="logo">
						<a href="http://127.0.0.1:8000">
					<h1>MMA</h1>
				</a>
					</div>
					<div class="main-menu">
						<div class="menu-inner">
							<nav>
								<h3>Основное</h3>
								<ul class="menu">

									<li><a href="/admin/fighters/"><i class="fas fa-list"></i> &nbsp; Бойцы</a></li>
									<li><a href="/admin/news/"><i class="far fa-newspaper"></i> &nbsp; Статьи</a></li>
									

								</ul>
							</nav>
							
								
								<a href="/user/logout/"><i class="fas fa-sign-out-alt"></i> &nbsp; Выход</a>
							
						</div>
					</div>

				</div>
			


			
				<div class="col-lg-10">

					<div class="admin_content">
						<div class="admin_content__header">
							<a href="/" style="text-align: left; line-height:80px;">Назад на сайт</a>
							<a href="#" style="float:right;line-height:80px;">asd</a>

						</div>