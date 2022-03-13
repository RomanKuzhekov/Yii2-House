<?php

/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 14:41
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Pages
 * @package app\models
 */
class Pages extends ActiveRecord
{
    public static function tableName(){
        return 'pages';
    }
}