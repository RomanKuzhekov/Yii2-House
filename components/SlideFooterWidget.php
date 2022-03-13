<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.03.2022
 * Time: 20:03
 */

namespace app\components;

use app\models\Sliders;
use yii\base\Widget;

/**
 * Нижний слайдер на главной странице
 * Class SlideFooterWidget
 * @package app\components
 */
class SlideFooterWidget extends Widget
{
    public function run()
    {
        $slides = Sliders::find()->where(['name' => 'footer'])->all();
        return $this->render('Slides', compact('slides'));
    }
}