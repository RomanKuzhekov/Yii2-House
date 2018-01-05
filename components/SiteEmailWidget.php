<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 03.01.2018
 * Time: 12:52
 */

namespace app\components;

use app\models\Site;
use yii\base\Widget;

/** Вывод Email на сайте */
class SiteEmailWidget extends Widget
{
    public function run()
    {
        $site = Site::find()->where(['id' => 1])->one();
        return $site->email;
    }
}