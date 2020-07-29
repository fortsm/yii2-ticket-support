<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

use fortsm\support\models\Category;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel fortsm\support\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


/* breadcrumbs */
$this->params['breadcrumbs'][] = $this->title;

/* misc */
$this->registerJs('$(document).on("pjax:send", function(){ $(".grid-view-overlay").removeClass("hidden");});$(document).on("pjax:complete", function(){ $(".grid-view-overlay").addClass("hidden");})');
//$js=file_get_contents(__DIR__.'/index.min.js');
//$this->registerJs($js);
//$css=file_get_contents(__DIR__.'/index.css');
//$this->registerCss($css);
?>
<div class="category-index">
    <div class="box box-primary">
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php Pjax::begin(); ?>
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'title',
                        //'status',
                        //'created_at',
                        //'updated_at',
                        //[
                        //    'attribute' => 'created_at',
                        //    'value' => 'created_at',
                        //    'format' => 'dateTime',
                        //    'filter' => DatePicker::widget(['model' => $searchModel, 'attribute' => 'created_at', 'dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]),
                        //    'contentOptions'=>['style'=>'min-width: 80px']
                        //],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return $model->statusColorText;
                            },
                            'filter' => Category::getStatusOption(),
                            'format' => 'raw'
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <?php Pjax::end(); ?>
            <p>
                <?= Html::a(\fortsm\support\Module::t('support', 'Add Category'), ['create'],
                    ['class' => 'btn btn-success']) ?>
            </p>

        </div>
        <!-- Loading (remove the following to stop the loading)-->
        <div class="overlay grid-view-overlay hidden">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- end loading -->
    </div>
</div>
