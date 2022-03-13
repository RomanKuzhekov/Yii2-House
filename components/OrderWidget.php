<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 16:13
 */

namespace app\components;

use app\models\Orders;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Виджет - Заказать звонок
 * Class OrderWidget
 * @package app\components
 */
class OrderWidget extends Widget
{
    public function run()
    {
        $formOrder = new Orders();

        if($formOrder->load(\Yii::$app->request->post()) && $formOrder->validate() && $formOrder->save()){
            /** Нужно указать Email в Config - params.php и раскоменнтить ниже код */
//            \Yii::$app->mailer->compose()
//                ->setFrom(\Yii::$app->params['siteEmail'])
//                ->setTo(\Yii::$app->params['siteEmail'])
//                ->setSubject('Новая заявка на сайте - ' . \Yii::$app->params['siteName'])
//                ->setHtmlBody('Поступила заявка на звонок от:<br>Имя: <b>' . $formOrder->name . '</b><br>Телефон: <b>' . $formOrder->phone . '</b>')
//                ->send();
            return true;
        } else {
            $form = \yii\widgets\ActiveForm::begin();
            echo $form->field($formOrder, 'name');
            echo $form->field($formOrder, 'phone');
            echo Html::submitButton('Отправить', ['class'=>'btn btn-success']);
            \yii\widgets\ActiveForm::end();
        }
    }
}