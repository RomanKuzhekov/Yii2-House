<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 31.12.2017
 * Time: 16:17
 */

namespace app\models;


use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }
}