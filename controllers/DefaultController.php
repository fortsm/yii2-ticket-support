<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support\controllers;

use fortsm\support\components\BackendFilter;
use fortsm\support\jobs\FetchMailJob;
use fortsm\support\models\Ticket;
use fortsm\support\traits\ModuleTrait;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `ticket` module
 */
class DefaultController extends Controller
{
    use ModuleTrait;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $array = [];
        if (!$this->getModule()->yii2basictemplate) {
            $array = ['backend' => [
                'class' => BackendFilter::className(),
                'actions' => [
                    '*',
                ],
            ]];
        }
        
        return array_merge($array, [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return $this->getModule()->adminMatchCallback;
                        },
                    ],
                ],
            ],
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFetchMail()
    {
        $id = \Yii::$app->get($this->getModule()->queueComponent)->push(new FetchMailJob());
        if ($id) {
            \Yii::$app->session->setFlash('success', \fortsm\support\Module::t('support', 'Added job to fetch tickets from mailbox, please wait'));
        }
        return $this->redirect(['/support/ticket/manage']);
    }
}
