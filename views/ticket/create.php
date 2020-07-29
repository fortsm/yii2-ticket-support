<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

/* @var $this yii\web\View */
/* @var $model fortsm\support\models\Ticket */


/* breadcrumbs */
$this->params['breadcrumbs'][] = ['label' => \fortsm\support\Module::t('support', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\fortsm\support\assets\TicketAsset::register($this);

?>
<div class="ticket-create">
    <div class="box box-success">
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
