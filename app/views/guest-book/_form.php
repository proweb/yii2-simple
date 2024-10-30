<?php

use yii\helpers\Html;
use bizley\quill\Quill;
use yii\bootstrap5\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\db\Guestbook $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="guestbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field(
        $model,
        'name',
        ['enableClientValidation' => false]
    )
        ->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
     
    <?= $form->field($model, 'message')->widget(Quill::class, [
        'localAssets' => true,
        'theme' => 'snow',
        'toolbarOptions' => [['bold', 'italic'], [['color' => ['blue', 'red', 'green']]]],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>