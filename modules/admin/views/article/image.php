<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 05.01.2019
 * Time: 14:50
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="article-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
