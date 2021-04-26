<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="role-view">

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
            'r_name',
            [
                'label' => 'Created At',
                'value' => function ($model) {
                    $item_date = $model->created_at;
                    $dt = new DateTime();
                    $dt->setTimestamp($item_date);
                    $dt->setTimezone(new DateTimeZone("Asia/Calcutta"));
                    $would_be = $dt->format('g:ia T \o\n d-m-Y');
                    return $would_be;
                }
            ],
            [
                'label' => 'Created By',
                'value' => function($model) {
                    return $model->createdBy->username;
                }
            ],
            [
                'label' => 'Updated At',
                'value' => function ($model) {
                    $item_date = $model->updated_at;
                    $dt = new DateTime();
                    $dt->setTimestamp($item_date);
                    $dt->setTimezone(new DateTimeZone("Asia/Calcutta"));
                    $would_be = $dt->format('g:ia T \o\n d-m-Y');
                    return $would_be;
                }
            ],
            [
                'label' => 'Updated By',
                'value' => function($model) {
                    return $model->updatedBy->username;
                }
            ]
        ],
    ]) ?>

</div>
