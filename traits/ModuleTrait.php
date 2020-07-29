<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support\traits;

use fortsm\support\Module;

trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('support');
    }
}
