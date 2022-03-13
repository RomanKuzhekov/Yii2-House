<?
/* @var $data \app\models\Pages */
$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;
?>
<section>
    <div class="posts">
        <h1><?= $data->title ?></h1>
        <div class="content">
            <arcticle>
                <?= $data->description ?>
            </arcticle>
        </div>
    </div>
</section>