<?php
/** @var string $content */

use yii\helpers\Html;

\app\assets\AppAdminAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta NAME="Robots" CONTENT="NOINDEX,NOFOLLOW">
</head>
<body>
<div class="admin-panel">
    <?php $this->beginBody() ?>
    <?php
    \yii\bootstrap\NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
        'brandLabel' => 'Строительство домов',
        'brandUrl' => Yii::$app->homeUrl,
    ]);
    echo \yii\bootstrap\Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => [Yii::$app->params['adminUrl'].' ']],
            ['label' => 'Заявки', 'url' => [Yii::$app->params['adminUrl'].'orders']],
            ['label' => 'Страницы', 'url' => [Yii::$app->params['adminUrl'].'pages']],
            ['label' => 'Статьи', 'url' => [Yii::$app->params['adminUrl'].'articles']],
            ['label' => 'Гостевая книга', 'url' => [Yii::$app->params['adminUrl'].'guestbook']],
            ['label' => 'Фото', 'url' => [Yii::$app->params['adminUrl'].'gallery']],
            ['label' => 'Слайдеры', 'url' => [Yii::$app->params['adminUrl'].'sliders']],
            (Yii::$app->user->identity->username == 'admin') ? (
                ['label' => 'Пользователи', 'url' => [Yii::$app->params['adminUrl'].'user']]
            ) : ('&nbsp'),
            Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/login']]
            ) : (
                '<li>'
                . Html::beginForm([Yii::$app->params['adminUrl'].'site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    \yii\bootstrap\NavBar::end();
    ?>

    <div class="general-admin">
        <p class="general-p">Администраторская часть сайта!</p>
        <? Yii::$app->homeUrl = Yii::$app->params['adminUrl']; ?>
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>