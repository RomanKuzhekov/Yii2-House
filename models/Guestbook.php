<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 19:53
 */

namespace app\models;

use himiklab\yii2\recaptcha\ReCaptchaValidator;
use Yii;
use yii\db\ActiveRecord;

class Guestbook extends ActiveRecord
{
    public $reCaptcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guestbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            [['text'], 'string'],
            [['email'], 'email'],
            [['name', 'text'], 'string', 'max' => 255],
            [['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6Lcosj4UAAAAAGpM2R61-RFCy0oBn4i7RmncJOS0', 'uncheckedMessage' => 'Please confirm that you are not a bot.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Эл. почта',
            'text' => 'Ваше сообщение'
        ];
    }

    public function afterSave($insert, $changedAttributes){
        if($insert){
            Yii::$app->session->setFlash('success','Комментарий добавлен!');
        }
    }
}