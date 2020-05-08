<?php

/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$this->title = 'Student Card';
?>
<?php NavBar::begin(); ?>
<?= Nav::widget(['items' => [
    ['label' => 'Регистрация нового студента', 'url' => ['site/index']],
    ['label' => 'Скачать данные всех студентов', 'url' => ['site/download']],
]]) ?>
<?php NavBar::end(); ?>
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
