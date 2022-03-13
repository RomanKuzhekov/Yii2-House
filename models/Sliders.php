<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 19:56
 */

namespace app\models;

use yii\db\ActiveRecord;

class Sliders extends ActiveRecord
{
    public static function tableName()
    {
        return 'sliders';
    }
}