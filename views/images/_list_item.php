<?php

use yii\helpers\Html;

?>

    <div class="card">
        <img src="/uploads/<?= $model->name ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id]) ?></h5>
            <p class="card-text"><?= $model->datetime ?></p>
        </div>
    </div>
