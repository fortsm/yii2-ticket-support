<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model fortsm\support\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(\fortsm\support\Module::t('support', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(\fortsm\support\Module::t('support', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
