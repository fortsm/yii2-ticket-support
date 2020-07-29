<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

/* @var $this yii\web\View */
/* @var $model \fortsm\support\models\Content */
?>

<?= \fortsm\support\Module::t('support', 'Ticket #{ID}: New reply from {NAME}:', [
    'ID' => $model->ticket->id,
    'NAME' => !empty($model->user_id) ? $model->user->{\Yii::$app->getModule('support')->userName} : \fortsm\support\Module::t('support',
        'Ticket System')
]) ?>

<?= Yii::$app->formatter->asNtext($model->content) ?>


<?= \fortsm\support\Module::t('support', 'View Ticket: {URL}', ['URL' => $model->ticket->getUrl(true)]) ?>