<?php

use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CarAdvanced $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-advanced-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_auto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'model')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'year_car')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->widget(Summernote::class, [
        'useKrajeePresets' => true,
        // other widget settings
    ]);
    ?>

    <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
        //'language' => 'bg',
        //'dateFormat' => 'yyyy-MM-dd',
        'options' => ['readOnly' => true],
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
        //'language' => 'bg',
        //'dateFormat' => 'yyyy-MM-dd',
        'options' => ['readOnly' => true],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
