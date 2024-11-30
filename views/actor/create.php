<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Actor $model */

$this->title = Yii::t('app', 'Create Actor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
