<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support;

use fortsm\support\traits\ModuleTrait;
use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;
use yii\i18n\PhpMessageSource;

/**
 * support module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        if ($app->hasModule('support') && ($module = $app->getModule('support')) instanceof Module) {

            \Yii::$container->set('fortsm\support\Mailer', $module->mailer);

            $redactorModule = $this->getModule()->redactorModule;
            if ($this->getModule()->getIsBackend() && !$app->hasModule($redactorModule)) {
                $app->setModule($redactorModule, [
                    'class' => 'yii\redactor\RedactorModule',
                    /*'imageUploadRoute' => ['/blog/upload/image'],
                    'uploadDir' => $this->getModule()->imgFilePath . '/upload/',
                    'uploadUrl' => $this->getModule()->getImgFullPathUrl() . '/upload',
                    'imageAllowExtensions' => ['jpg', 'png', 'gif', 'svg']*/
                ]);
            }

            if ($app instanceof ConsoleApplication) {
                $this->getModule()->controllerNamespace = 'fortsm\support\commands';
            }

            $app->urlManager->addRules(
                [
                    '<_m:support>/new-ticket' => '<_m>/ticket/create',
                    '<_m:support>/<id:\w+>' => '<_m>/ticket/view',
                    '<_m:support>' => '<_m>/ticket/index',
                ]
            );
            $app->get($this->getModule()->urlManagerFrontend)->addRules(
                [
                    '<_m:support>/new-ticket' => '<_m>/ticket/create',
                    '<_m:support>/<id:\w+>' => '<_m>/ticket/view',
                    '<_m:support>' => '<_m>/ticket/index',
                ]
            );

            if (!$app->has($this->getModule()->queueComponent)) {
                $app->set($this->getModule()->queueComponent, [
                    'class' => \yii\queue\sync\Queue::class,
                    'handle' => true, // whether tasks should be executed immediately
                ]);
            }
        }

        // Add module I18N category.
        if (!isset($app->i18n->translations['fortsm/support'])) {
            $app->i18n->translations['fortsm/support'] = [
                'class' => PhpMessageSource::class,
                'basePath' => __DIR__ . '/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'fortsm/support' => 'support.php',
                ]
            ];
        }
    }
}
