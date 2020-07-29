<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support\jobs;

use fortsm\support\Mailer;
use fortsm\support\models\Content;
use fortsm\support\traits\ModuleTrait;
use yii\base\BaseObject;

class SendMailJob extends BaseObject implements \yii\queue\JobInterface
{
    use ModuleTrait;

    public $contentId;

    public function execute($queue)
    {
        $content = Content::findOne(['id' => $this->contentId]);
        if ($content !== null) {
            $email = $content->ticket->user_contact;
            /* send email */
            $subject = \fortsm\support\Module::t('support', '[{APP} Ticket #{ID}] Re: {TITLE}',
                ['APP' => \Yii::$app->name, 'ID' => $content->ticket->hash_id, 'TITLE' => $content->ticket->title]);

            $this->mailer->sendMessage(
                $email,
                $subject,
                'reply-ticket',
                ['title' => $subject, 'model' => $content]
            );

        }
    }

    protected function getMailer()
    {
        return \Yii::$container->get(Mailer::className());
    }
}