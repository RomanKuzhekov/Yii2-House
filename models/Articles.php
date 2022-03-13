<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 19:49
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