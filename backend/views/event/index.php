<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'host',
            'venue',
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
    ]); ?>


</div>
