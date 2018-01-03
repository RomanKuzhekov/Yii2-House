<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 01.01.2018
 * Time: 23:41
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