<?
/* @var $data \app\models\Pages */
/* @var $posts \app\models\Guestbook */
/* @var $pages \yii\data\Pagination */
/* @var $model \app\models\Guestbook */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $data->title;
$this->params['breadcrumbs'][] = $data->title;
?>
<div class="posts">
    <h1><?= $data->title ?></h1>
    <div class="content">
        <arcticle>
            <p><?= $data->description ?></p>
            <hr>
            <?php foreach ($posts as $post): ?>
                <div class="guest_comment">
                    <h4><?= $post['name'] ?></h4>
                    <span class="date"><?= $post['date'] ?></span>
                    <div><?= $post['text'] ?></div>
                </div>
            <?php endforeach; ?>
            <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>

            <div id="guest_post">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
                <?= \himiklab\yii2\recaptcha\ReCaptcha::widget(['name' => 'reCaptcha']) ?>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </arcticle>
    </div>
</div>

