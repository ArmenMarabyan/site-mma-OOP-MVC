<?php require_once ROOT . '/views/layouts/header.php'; ?>
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
                    <div class="cabinet">
                        <?php if ($user): ?>
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
                                    <div class="col-lg-8">asd</div>
                                    
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>



    <?php require_once ROOT . '/views/layouts/footer.php'; ?>