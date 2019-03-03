<?php require_once ROOT . '/views/layouts/header.php'; ?>
<style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
<div class="row">
    <div class="col-lg-12 col-xs-12 content__main" >
        
        
        
        <div class="header article__header">
            <?php require_once ROOT.'/views/layouts/mini_header.php' ?>


            
        </div>
        <div class="row">

            <div class="col-lg-12" style="margin-bottom: 50px;">
                <div class="content__main-wrapper">
                    <div class="cabinet">
                        <?php if (isset($user)): ?>
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <div class="cabinet__user">
                                        <div class="cabinet__user-avatar">
                                           <?php if (empty($user['image'])): ?>
                                            <img src="/template/images/users/no_image.jpg" alt="">
                                            <?php else: ?>
                                                <img src="<?= $user['image']; ?>" alt="">
                                            <?php endif ?>
                                        </div>
                                        <div class="cabinet__user-name">
                                            <?= $user['name']; ?>
                                        </div>
                                        <div class="cabinet__user-edit">
                                            <a href="/cabinet/edit">Настройки</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">

                                                <h2>edit</h2>
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
                                            <?php if ($result): ?>

                                                <div class="alert alert-success">
                                                    Профиль обновлен!
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="name">name</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    
                                                    <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="you@example.com" required autofocus value="<?= $name; ?>">
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
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="avatar">avatar</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-danger">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                    
                                                    <input type="file" name="avatar" class="form-control" id="avatar">
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
                                            
                                            <button type="submit" name="submit" class="btn btn-success">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>



<?php require_once ROOT . '/views/layouts/footer.php'; ?>