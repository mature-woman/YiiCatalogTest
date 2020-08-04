<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Companies */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="companies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label'     => $model->getAttributeLabel('category'),
                
                /**
                 * Я бы переписал под HMVC с локальным запросом, не создавая здесь дополнительную зависимость от модели Categories
                 * в данном случае усложнять смысла нет, поэтому оставлю так
                 */
                'value'     => (new Categories())::find()
                    ->select('name')
                    ->where(['id' => $model->category_id])
                    ->column()[0] // Возвращает двумерный массив с одним значением
            ],
            'name',
        ],
    ]); ?>

</div>