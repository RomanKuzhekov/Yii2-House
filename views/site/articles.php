<?
/* @var $data \app\models\Pages */

$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;

//echo $string;
//var_dump($posts);
?>
<section>
    <div class="posts">
        <h1><?= $data->title ?></h1>
        <div class="content">
            <arcticle>
                <p><?= $data->description ?></p>

                <?php foreach ($posts as $post): ?>
                    <div class="article">
                        <h3><a href="/<?=$data->name?>/<?=$post['id']?>"><?=$post['title']?></a></h3>
                        <img src="<?=$post['img']?>" title="<?=$post['title']?>">
                        <div><?=$post['description']?>...</div>
                        <p class="more-link"><a href=""><span class="glyphicon glyphicon-eye-open"></span> <?=$post['count']?></a> &nbsp; <span>Дата: <?=$post['date']?></span> </p>
                        <a class="view" href="/<?=$data->name?>/<?=$post['id']?>">Подробнее</a>
                    </div>
                    <div id="clear"></div>
                <?php endforeach; ?>
                <?= \yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
            </arcticle>
        </div>
    </div>
</section>


