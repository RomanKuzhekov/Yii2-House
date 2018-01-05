<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 01.01.2018
 * Time: 21:31
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