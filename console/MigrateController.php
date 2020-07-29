<?php
/**
 * @author akiraz@bk.ru
 * @link https://github.com/fortsm/yii2-ticket-support
 * @copyright 2018 fortsm
 * @license MIT
 */

namespace fortsm\support\console;

use MongoDB\BSON\UTCDateTime;
use yii\db\Query;

/**
 * Class MigrateController
 *
 */
class MigrateController extends \yii\console\Controller
{
    public function actionIndex()
    {
        echo "Migrating Cat...\n";
        /* logs */
        $rows = (new Query())->select('*')->from('{{%support_category}}')->all();
        $collection = \Yii::$app->mongodb->getCollection('support_categorys');
        foreach ($rows as $row) {
            $collection->insert([
                'title' => $row['title'],
                'status' => (int)$row['status'],
                'created_at' => new UTCDateTime($row['created_at'] * 1000),
                'updated_at' => new UTCDateTime($row['updated_at'] * 1000),
            ]);
        }
        echo "Cat migration completed.\n";
    }
}