<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 20:04
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