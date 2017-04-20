<?php
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Главное меню', 'options' => ['class' => 'header text-center']],
                    ['label' => 'Категории', 'icon' => 'fa fa-bars', 'url' => ['category/index'], 'items' => [
                        ['label' => 'Новая', 'icon' => 'fa fa-plus', 'url' => ['category/create']],
                        ['label' => 'Все', 'icon' => 'fa fa-list', 'url' => ['category/index']],
                    ]],
                    ['label' => 'Поздравления', 'icon' => 'fa fa-diamond', 'url' => ['gratter/index'], 'items' => [
                        ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['gratter/create']],
                        ['label' => 'Все поздравления', 'icon' => 'fa fa-list', 'url' => ['gratter/index']],
                    ]],
                    ['label' => 'Запросы', 'icon' => 'fa fa-question', 'url' => ['request/index']],

                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>
