<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        // Получение имён и идентификаторов и преобразование в вид массива для вывода в списке

        $categories_raw = (new Categories())::find()
            ->select(['name', 'id',])
            ->limit(30)
            ->all();

        $categories = [];
        foreach ($categories_raw as $category) $categories[$category->id] = $category->name;
    ?>
    <?=
        $form->field($model, 'category_id')->dropDownList($categories);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>