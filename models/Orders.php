<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 16:14
 */

namespace app\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['phone'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон'
        ];
    }

    public function afterSave($insert, $changedAttributes){
        if($insert){
            \Yii::$app->session->setFlash('success','Заказ звонка принят!');
        }
    }
}