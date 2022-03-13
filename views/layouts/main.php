<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Modal;
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
        <meta NAME="Robots" CONTENT="NOINDEX, NOFOLLOW">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="general">
        <header>
            <div class="header">
                <div class="logo">
                    <a href="<?= \yii\helpers\Url::home() ?>"><h1>Дома Волгограда</h1> <span>Строительство загородных домов</span></a>
                </div>
                <div class="address">
                    <p><i class="glyphicon glyphicon-map-marker"></i> <?= \app\components\SiteAddressWidget::widget() ?>
                    </p>
<!--                    --><?// Modal::begin([
//                        'header' => '<h2>Расположение на карте:</h2>',
//                        'toggleButton' => ['label' => '<p class="main-map">Мы на карте</p>'],
//                        'footer' => 'Дома Волгограда',
//                    ]); ?>
<!--                    --><?//= $this->render('_map.php') ?>
<!--                    --><?// Modal::end(); ?>
                </div>
                <div class="phone">
                    <p><i class="glyphicon glyphicon-earphone"></i> <?= \app\components\SitePhoneWidget::widget() ?></p>
<!--                    --><?// Modal::begin([
//                        'header' => '<h2>Оставьте ваши контакты:</h2>',
//                        'toggleButton' => ['label' => '<p class="main-map">Заказать звонок</p>', 'class' => 'order-phone'],
//                        'footer' => 'Дома Волгограда',
//                    ]); ?>
<!--                    --><?//= \app\components\OrderWidget::widget() ?>
<!--                    --><?// Modal::end(); ?>
                </div>
            </div>
        </header>
        <nav>
            <div class="menu">
                <?= $this->render('_menu.php') ?>
            </div>
            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <?= \yii\widgets\Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
    </div>
    <footer>
        <div class="footer">
            <div class="footer_content">
                <div>
                    <h4>О компании</h4>
                    <p><?= \app\components\SiteDescWidget::widget() ?></p>
                </div>
                <div>
                    <h4>Наши контакты</h4>
                    <p>Адрес: <?= \app\components\SiteAddressWidget::widget() ?></p>
                    <p>Телефон: <?= \app\components\SitePhoneWidget::widget() ?></p>
                    <p>E-mail: <?= \app\components\SiteEmailWidget::widget() ?></p>
                </div>
            </div>
        </div>
    </footer>
    <div id="overlay"></div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>