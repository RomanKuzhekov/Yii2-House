<?php

use yii\helpers\Html;
use \app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name="keywords"
              content="Строительная компания «Дома Волгограда» осуществляет строительство домов в Волгограде и Волгоградской области из различных материалов."/>
        <meta name="description" content="Дома Волгограда"/>
        <meta NAME="Robots" CONTENT="NOINDEX,NOFOLLOW">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="general">
        <h1>Админка!!!</h1>
        <?= $content ?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>