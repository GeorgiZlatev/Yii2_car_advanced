<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CarAdvanced $model */

$this->title = Yii::t('app', 'Create Car Advanced');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Car Advanceds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-advanced-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
