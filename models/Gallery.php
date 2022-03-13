<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 19:52
 */

namespace app\models;

use yii\db\ActiveRecord;

class Gallery extends ActiveRecord
{
    public static function tableName()
    {
        return 'gallery';
    }
}