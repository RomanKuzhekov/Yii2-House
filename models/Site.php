<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 14:59
 */

namespace app\models;

use yii\db\ActiveRecord;

class Site extends ActiveRecord
{
    public static function tableName(){
        return 'site';
    }
}