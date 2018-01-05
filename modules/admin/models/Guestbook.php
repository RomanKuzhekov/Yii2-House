<?php

namespace app\modules\admin\models;

/**
 * This is the model class for table "Guestbook".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $text
 * @property string $date
 */
class Guestbook extends \yii\db\ActiveRecord
{
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
            [['date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Текст',
            'date' => 'Дата',
        ];
    }
}
