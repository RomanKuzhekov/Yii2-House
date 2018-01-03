<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 25.12.2017
 * Time: 23:38
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Pages
 * @package frontend\models
 */
class Pages extends ActiveRecord
{
    public static function tableName(){
        return 'pages';
    }

}