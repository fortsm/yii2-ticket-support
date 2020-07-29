<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

/* @var $this yii\web\View */
/* @var $model fortsm\support\models\Category */


$this->params['breadcrumbs'][] = [
    'label' => \fortsm\support\Module::t('support', 'Categories'),
    'url' => ['index']
];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \fortsm\support\Module::t('support', 'Update');

/* misc */
//$js=file_get_contents(__DIR__.'/index.min.js');
//$this->registerJs($js);
//$css=file_get_contents(__DIR__.'/index.css');
//$this->registerCss($css);
?>
<div class="category-update">
    <div class="box box-primary">
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
