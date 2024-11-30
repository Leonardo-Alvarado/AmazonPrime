<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Director;
use app\models\Actor;

/** @var yii\web\View $this */
/** @var app\models\Pelicula $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pelicula-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if($model->portada): ?>
        <div class="form-group">
            <?= Html::label('Imagen Actual') ?>
            <div>
                <?= Html::img(Yii::getAlias('@web' . '/portadas/' . $model->portada), ['style' => 'width: 200px']) ?>
            </div>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Seleccionar portada') ?>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Título de la Película',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'anio')->input('number', [
        'min' => 1900,
        'max' => date('Y'),
        'placeholder' => 'YYYY',
        'required' => true,
        'pattern' => '\d{4}',
        'title' => 'Debe ser un año de 4 dígitos'
    ]) ?>

    <?= $form->field($model, 'duracion')->textInput([
        'placeholder' => '00:00:00',
        'pattern' => '^([0-1]?[0-9]|1[0-3]):[0-5][0-9]:[0-5][0-9]$',
        'title' => 'Formato requerido: HH:MM:SS',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'sinopsis')->textarea([
        'maxlength' => 255,
        'placeholder' => 'Escriba aquí su sinopsis...',
        'required' => true
    ]) ?>

    <?= $form->field($model, 'fk_iddirector')->dropDownList(
        ArrayHelper::map(
            Director::find()
                ->select(['iddirector', 'CONCAT(apellido, " ", nombre) AS nombre_completo'])
                ->orderBy('apellido')
                ->asArray()
                ->all(),
            'iddirector', 'nombre_completo'
        ),
        ['prompt' => 'Seleccione un director', 'required' => true]
    ) ?>

    <div class="mb-3">
        <?= Html::label('Seleccione los actores', 'actor-search', ['class' => 'dorm-label']) ?>
        <div class="input-group">
            <input type="text" id="actor-search" placeholder="Buscar actor..." class="form-control">
            <a href="<?= Yii::$app->urlManager->createUrl(['actor/create']) ?>" class="btn btn-secondary">
                <i class="bi bi-plus"></i>
                Nuevo actor
            </a>
        </div>
        <?= Html::activeListBox(
            $model, 'actors', 
            ArrayHelper::map(Actor::find()->orderBy(['apellido' => SORT_ASC])->all(), 'idactor', function($actor){
                return $actor->apellido . ', ' . $actor->nombre;
            }), 
            ['multiple' => true, 'size' => 10, 'id' => 'actors-select', 'class' => 'form-control mt-2']
        ) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    document.querySelector("#actor-search").addEventListener('input', function() {
        let actors = document.querySelectorAll("#actors-select option");
        actors.forEach(actor => {
            if (actor.text.toLowerCase().includes(this.value.toLowerCase())) {
                actor.style.display = 'block';
            } else {
                actor.style.display = 'none';
            }
        });
    });
</script>
