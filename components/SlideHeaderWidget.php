<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 31.12.2017
 * Time: 0:16
 */

namespace app\components;

use app\models\Sliders;
use yii\base\Widget;

/**
 * Верхний слайдер на главной странице
 * Class SlideHeaderWidget
 * @package app\components
 */
class SlideHeaderWidget extends Widget
{
    public function run()
    {
        $slides = Sliders::find()->where(['name' => 'header'])->all();
        return $this->render('Slides', compact('slides'));
    }
}