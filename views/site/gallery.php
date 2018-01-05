<?
/* @var $data \app\models\Pages */
/* @var $posts \app\models\Gallery */
/* @var $pages \yii\data\Pagination */
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
                        <a class="fancybox" href="/<?= $post['imgBig'] ?>" data-fancybox-group="gallery"
                           title="Дома Волгограда"><img src="/<?= $post['imgSmall'] ?>" alt="Дома Волгограда"
                                                        id="photo"/></a>
                    <?php endforeach; ?>
                    <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>
                </div>
            </arcticle>
        </div>
    </div>
</section>
