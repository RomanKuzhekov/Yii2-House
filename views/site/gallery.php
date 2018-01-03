<?
/* @var $data \app\models\Pages */

$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;

?>

<section>
    <div class="posts">
        <h1><?= $data->description ?></h1>
        <div class="content">
            <arcticle>
                <div class="photos">
                    <?php foreach ($posts as $post): ?>
                        <a class="fancybox" href="/<?=$post['small-img']?>" data-fancybox-group="gallery" title="Дома Волгограда"><img src="/<?=$post['big-img']?>" alt="Дома Волгограда" id="photo" /></a>
                    <?php endforeach; ?>
                    <?= \yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
                </div>
            </arcticle>
        </div>
    </div>
</section>
