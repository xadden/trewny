<?php

use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $filtro \trewny\models\filters\Bookmarks */

$this->params = [
    'tab' => 'bookmark',
    'title' => 'Bookmarks',
    'actions' => [
            ['add bookmark', ['bookmark/add']]
    ]
];

$this->registerCssFile("@web/css/crud.css", ['depends' => 'trewny\assets\MainBundle']);

?>

<div class="wrapper">
    <h1>bookmarks</h1>
    <?=
    GridView::widget([
        'dataProvider' => $filter->search(Yii::$app->request->get()),
        'filterModel' => $filter,
        'tableOptions' => [
            'class' => 'table',
        ],
        'summaryOptions' => [
                'class' => 'summary',
        ],
        'layout' => '{items} {summary} {pager}',
        'columns' => [
            [
                'attribute' => 'title',
                'content' => function ($model, $key, $index, $column) {
                    return Html::a($model->title, Url::to(['bookmark/view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'link',
                'content' => function ($model, $key, $index, $column) {
                    return Html::a($model->link, Url::to(['bookmark/view', 'id' => $model->id]));
                }
            ],
            [
                'attribute' => 'color',
                'content' => function ($model, $key, $index, $column) {
                    return Html::a($model->color, Url::to(['bookmark/view', 'id' => $model->id]));
                }
            ],
        ]
    ])
    ?>
</div>