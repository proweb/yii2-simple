<?php

use app\models\db\Guestbook;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\db\GuestbookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */



$this->title = 'Обращения';
$this->params['breadcrumbs'][] = 'Результаты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        в таблице то что было отправлено через форму на сегодняшний день
    </p>

    <?php $columns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '50px',
            'pageSummary' => 'Total',
            'pageSummaryOptions' => ['colspan' => 6],
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        'name',
        'email:email',
        'message:html',
        'created_at:datetime',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Guestbook $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
        ],
    ];

    echo GridView::widget([
        'id' => 'kgrid1',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,

        'headerContainer' => ['style' => 'top:75px', 'class' => 'kv-table-header'], // offset from top
        'floatHeader' => false, // table header floats when you scroll
        'floatPageSummary' => false, // table page summary floats when you scroll
        'floatFooter' => false, // disable floating of table footer
        'pjax' => false, // pjax is set to always false for this demo
        // parameters from the demo form
        'responsive' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => true,
        'hover' => true,
        'showPageSummary' => false,
        'panel' => [
            'after' => '<div class="float-right float-end"></div>',
            'heading' => '<i class="fas fa-book"></i> Обращения граждан',
            'type' => 'light',
            'before' => '<div style="padding-top: 7px;"><em>* В таблице показаны обращения граждан</em></div>',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true,
            
        ],
        'exportConfig' => [
            'html' => [],
            'csv' => [],
            'xls' => [],

        ],
        // set your toolbar
        'toolbar' => [
            [ 'content' => Html::a('<i class="fas fa-plus"></i> Добавить', URL::to(['guest-book/create']), ['class' => 'btn btn-success me-2']),
                   
            ],
            '{export}'
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],

    ]); ?>


</div>