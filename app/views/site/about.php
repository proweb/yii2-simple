<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О сайте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="md-5">
        
    </p>
 

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"><?= Html::encode($this->title) ?></h1>

        <p class="lead">Пример приложения на Yii2.</p>
        <p class="lead">Гостевая книга(CRUD) - для отправки сообщений в приемную организации.</p>
        <hr />
        <p><a class="btn btn-primary" href="https://github.com/proweb/yii2-simple">Repo Github</a> 
         <a class="btn btn-secondary" href="https://sg43.ru">Разработчик</a></p>
    </div>
</div>
