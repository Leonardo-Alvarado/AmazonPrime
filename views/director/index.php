<?php

use app\models\Director;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DirectorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Directors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="director-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Director'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddirector',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Director $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddirector' => $model->iddirector]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
