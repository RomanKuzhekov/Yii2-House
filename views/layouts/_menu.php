<?= \yii\widgets\Menu::widget([
    'items' => [
        ['label' => 'Главная', 'url' => ['site/index']],
        ['label' => 'О компании', 'url' => ['site/company']],
        ['label' => 'Строительство домов', 'url' => ['site/articles']],
        ['label' => 'Наши услуги', 'url' => ['site/sale']],
        ['label' => 'Фото', 'url' => ['site/gallery']],
        ['label' => 'Отзывы', 'url' => ['site/guestbook']],
        ['label' => 'Контакты', 'url' => ['site/contacts']],
    ],
    'activeCssClass'=>'active',
    'firstItemCssClass'=>'fist-item',
    'lastItemCssClass' =>'last-item'
]); ?>
