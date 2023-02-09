<?php

use app\models\Images;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\data\Sort $sort */

$this->title = 'Фотачки';
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $sort->link('name')?>
    <?= $sort->link('datetime')?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-3'],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item',['model' => $model]);
            return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        },
        'options' => [
            'tag' => 'div',
            'class' => 'row',
            'id' => 'list-wrapper',
        ],
    ]) ?>


</div>
