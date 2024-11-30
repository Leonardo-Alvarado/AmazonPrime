<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actor $model */

$this->title = Yii::t('app', 'Update Actor: {name}', [
    'name' => $model->idactor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idactor, 'url' => ['view', 'idactor' => $model->idactor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="actor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
