<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

$this->title = 'Student Card';
?>
<div class="form-wrapper">
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username') ?>
</div>
