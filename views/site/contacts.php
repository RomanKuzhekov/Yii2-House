<?
/* @var $data \app\models\Pages */
/* @var $site \app\models\Site */
$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;
?>
<section>
    <div class="posts">
        <h1><?= $data->title ?></h1>
        <p><b>Адрес:</b> <?= $site->address ?></p>
        <p><b>Телефон:</b> <?= $site->phone ?></p>
        <p><b>E-mail:</b> <?= $site->email ?></p>
        <?= $data->description ?>
    </div>
</section>
