<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 03.01.2018
 * Time: 12:44
 */

namespace app\models;

use yii\db\ActiveRecord;

class Site extends ActiveRecord
{
    public static function tableName(){
        return 'site';
    }
}