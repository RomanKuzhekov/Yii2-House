<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 14:55
 */

namespace app\components;

use app\models\Site;
use yii\base\Widget;

/** Вывод адреса на сайте */
class SiteAddressWidget extends Widget
{
    public function run()
    {
        $site = Site::find()->where(['id' => 1])->one();
        return $site->address;
    }
}