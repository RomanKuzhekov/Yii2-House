<?
/* @var $data \app\models\Pages */
/* @var $post \app\models\Articles */
/* @var $lastArticles \app\models\Articles */
$this->title = $post->title;

$this->params['breadcrumbs'][] = [
    'label' => $data->title,
    'url' => ['/' . $data->name]
];
$this->params['breadcrumbs'][] = $post->title;
?>
<section>
    <div class="posts">
        <h1><?= \yii\helpers\Html::encode($post->title) ?></h1>
        <p class="post-detail">Дата публикации: <?= $post->date ?>; Количество просмотров: <?= $post->count ?></p>
        <div class="content">
            <arcticle>
                <img src="/<?= $post->img ?>" alt="Дома Волгограда"/>
                <?= $post->text ?>
            </arcticle>
            <div class="last_articles">
                <h4>Последние добавленные статьи:</h4>
                <ul>
                    <?php foreach ($lastArticles as $article): ?>
                        <? if ($post->id != $article['id']): ?>
                            <li><a href="/<?= $data->name ?>/<?= $article['id'] ?>"><?= $article['title'] ?></a></li>
                        <? endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
