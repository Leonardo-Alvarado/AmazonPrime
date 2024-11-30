<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */

$this->title = Yii::t('app', 'Create Pelicula');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelicula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
