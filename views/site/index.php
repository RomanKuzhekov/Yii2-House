<?
/* @var $data \app\models\Pages */
$this->title = $data->title;
?>
<?=$this->render('../layouts/_slide.php') ?>
<div class="content">
    <arcticle>
        <h1><?=$data->title ?></h1>
        <?=$data->description ?>
    </arcticle>
</div>

