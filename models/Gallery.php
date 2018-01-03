<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 01.01.2018
 * Time: 12:27
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