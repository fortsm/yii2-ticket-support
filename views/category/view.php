<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model fortsm\support\models\Category */

$this->params['breadcrumbs'][] = [
    'label' => \fortsm\support\Module::t('support', 'Categories'),
    'url' => ['index']
];
$this->params['breadcrumbs'][] = $this->title;

/* misc */
//$js=file_get_contents(__DIR__.'/index.min.js');
//$this->registerJs($js);
//$css=file_get_contents(__DIR__.'/index.css');
//$this->registerCss($css);
?>
<div class="category-view">
    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'title',
                        ['attribute' => 'status', 'value' => $model->statusText],
                        'createdAt:date',
                        'updatedAt:date',
                    ],
                ]) ?>
            </div>
            <p>
                <?= Html::a(\fortsm\support\Module::t('support', 'Update'),
                    ['update', 'id' => is_a($model, '\yii\mongodb\ActiveRecord') ? (string)$model->id : $model->id],
                    ['class' => 'btn btn-primary']) ?>
                <?= Html::a(\fortsm\support\Module::t('support', 'Delete'),
                    ['delete', 'id' => is_a($model, '\yii\mongodb\ActiveRecord') ? (string)$model->id : $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => \fortsm\support\Module::t('support',
                                'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
            </p>
        </div>
    </div>
</div>
