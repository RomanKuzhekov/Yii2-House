<?= \yii\widgets\Menu::widget([
    'items' => [
        ['label' => 'Главная', 'url' => ['site/index']],
        ['label' => 'О компании', 'url' => ['site/company']],
//        [
//            'label' => 'Строительство домов',
//            'url' => ['#'],
//            'options' => ['class' => 'menu_lower'],
//            'items' => [
//                 ['label' => 'Строительство фундамента', 'url' => ['site/company']],
//                ['label' => 'Монолитные работы', 'url' => ['site/company']],
//            ]
//        ],
        ['label' => 'Строительство домов', 'url' => ['site/articles']],
        ['label' => 'Наши услуги', 'url' => ['site/sale']],
//        [
//            'label' => 'Услуги',
//            'url' => ['#'],
//            'options' => ['class' => 'menu_lower'],
//            'items' => [
//                ['label' => 'Продажа коттеджа', 'url' => ['site/company']],
//                ['label' => 'Продажа домов', 'url' => ['site/company']],
//            ]
//        ],
        ['label' => 'Фото', 'url' => ['site/gallery']],
        ['label' => 'Отзывы', 'url' => ['site/guestbook']],
        ['label' => 'Контакты', 'url' => ['site/contacts']],
    ],
    'activeCssClass'=>'active',
    'firstItemCssClass'=>'fist-item',
    'lastItemCssClass' =>'last-item'
]); ?>
