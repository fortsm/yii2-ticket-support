<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support\jobs;

use fortsm\support\Mailer;
use fortsm\support\models\Ticket;
use fortsm\support\traits\ModuleTrait;
use yii\base\BaseObject;

class FetchMailJob extends BaseObject implements \yii\queue\JobInterface
{
    use ModuleTrait;

    public function execute($queue)
    {
        $this->getModule()->fetchMail();
    }
}