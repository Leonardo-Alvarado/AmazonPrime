<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */

$this->title = $model->idpelicula;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pelicula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idpelicula' => $model->idpelicula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idpelicula' => $model->idpelicula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpelicula',
            //'portada',
            [
                'attribute' => 'portada',
                'format' => 'html',
                'value' => function($model){
                    return Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portada, ['style' => 'width: 100px']);
                }
            ],
            'titulo',
            'anio',
            'duracion',
            'sinopsis',
            'fk_iddirector',
        ],
    ]) ?>


</div>
