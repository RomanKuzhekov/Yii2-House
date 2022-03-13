<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 16:00
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