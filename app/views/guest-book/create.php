<?php

use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\db\Guestbook $model */

$this->title = 'Онлайн приемная';
// $this->params['breadcrumbs'][] = ['label' => 'Guestbooks', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-create">
    <div class="row justify-content-md-center">
        

 
    <div class="col-md-5">
    <h1><?= '<i class="fa fa-envelope me-3"></i>' . Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
    </div>
  

</div>