<?php

use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CarAdvanced $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile(
    '@web/js/projectForm.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="car-advanced-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

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

    <?php foreach ($model->images as $image): ?>
    <div id="project-form__image-container-<?= $image->id ?>" class"project-form__image-container">
    <?= Html::img($image->file->absoluteUrl(), [
        'alt' => 'Demonstration of the user interface',
        'height' => 200,
        'class' => 'project-form__image',
        'data-project-image-id' => $image->id

    ]) ?>

    <?= Html::button(Yii::t('app', 'Delete'),[
        'class' => 'btn btn-danger btn-delete-project',
    ])?>

    <div id="project-form__image-error-message-<?= $image->id ?>" class="text-danger"></div>
</div>


<?php endforeach; ?>

<?= $form->field($model,'imageFile')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
