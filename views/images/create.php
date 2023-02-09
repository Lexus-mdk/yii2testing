<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UploadImageForm $model */

$this->title = 'Загрузка изображений';
?>
<div class="images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
