<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 15:59
 */

namespace app\components;

use app\models\Site;
use yii\base\Widget;

/** Вывод описания на сайте */
class SiteDescWidget extends Widget
{
    public function run()
    {
        $site = Site::find()->where(['id' => 1])->one();
        return $site->description;
    }
}