<?php include ROOT . '/views/layouts/header.php'; ?>
<style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
<div class="row">
        <div class="col-lg-12 col-xs-12 content__main" >
            
            
                
            <div class="header article__header">
                    <div class="header__top d-flex">
                        <div class="header__top-nav d-flex">
                            <a href="/">
                                <h1>MMA</h1>
                            </a>
                            <ul class="d-flex">
                                <li><a href="">Новости</a></li>
                                <li><a href="">Список бойцов</a></li>
                            </ul>
                        </div>
                        <div class="header__top-search">
                            <form action="/search" class="header__search" method="post" role="search">
                                <input type="text" class="header__search-input" name="search">
                                <button type="submit" class="header__search-btn" ><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>


                
            </div>
                <div class="row">

                    <div class="col-lg-12" style="margin-bottom: 50px;">
                        <div class="content__main-wrapper">
                            

                                <form class="form-horizontal" role="form" method="POST" action="/login">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">

                                            <h2>Log in</h2>
                                            <hr>
                                            <?php if (isset($errors) && is_array($errors)): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                        <?php foreach ($errors as $error): ?>
                                                            <li> - <?= $error ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="email">E-Mail Address</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    
                                                    <input type="text" name="email" class="form-control" id="email"
                                                           placeholder="you@example.com" required autofocus value="<?= $email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-control-feedback">
                                                    <span class="text-danger align-middle">
                                                        <!-- Put e-mail validation error messages here -->
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-danger">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    
                                                    <input type="password" name="password" class="form-control" id="password"
                                                           placeholder="Password" required value="<?= $password; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            
                                        </div>
                                        <div class="col-md-6">
                                            


                                                
                                                <span class="text-danger align-middle">
                                                    
                                                </span>
                                            
                                            <button type="submit" name="login" class="btn btn-success">Login</button>

                                            <a href="/restore">Забыли пароль?</a>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>



    <?php include ROOT . '/views/layouts/footer.php'; ?>