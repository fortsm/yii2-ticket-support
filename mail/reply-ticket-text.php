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
    'ID' => $model->ticket->hash_id,
    'NAME' => $model->getUsername()
]) ?>

<?= Yii::$app->formatter->asNtext($model->content) ?>
