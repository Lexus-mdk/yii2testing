<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Images $model */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'datetime',
        ],
    ]) ?>
    <img src="/uploads/<?= $model->name ?>" style="width: 100%;">
</div>
