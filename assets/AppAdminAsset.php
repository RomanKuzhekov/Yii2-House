<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 05.01.2018
 * Time: 14:57
 */

namespace app\assets;

use yii\web\AssetBundle;

class AppAdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/reset.css',
        'css/style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}