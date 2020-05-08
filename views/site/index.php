<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Student Card';
?>
<div class="form-wrapper">
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'surname') ?>
    <?= $form->field($model, 'patronymic') ?>
    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'dateOfBirth')->input('date') ?>
    <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end() ?>
</div>
