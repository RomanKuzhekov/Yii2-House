<?php /** @var \app\models\Sliders $slides */ ?>
<?php foreach ($slides as $slide): ?>
    <img alt="Дома Волгограда" src="/<?=$slide->img?>"/>
<?php endforeach; ?>
