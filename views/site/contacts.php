<?
/* @var $data \app\models\Pages */

$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;
?>
<section>
    <div class="posts">
        <h1><?= $data->title ?></h1>
        <p><b>Адрес:</b> <?= \Yii::$app->params['siteAddress'] ?></p>
        <p><b>Телефон:</b> <?= \Yii::$app->params['sitePhone'] ?></p>
        <p><b>E-mail:</b> <?= \Yii::$app->params['siteEmail'] ?></p>
        <?= $this->render('../layouts/_map.php') ?>
    </div>
</section>
