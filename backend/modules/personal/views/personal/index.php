<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\modules\setting\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\personal\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user.username',
            //'department.department',
            [
                'format' => 'html',
                'attribute'=>'department_id',
                'value'=>function($model){
                    return $model->department->department;
                },
                'filter' => Html::activeDropDownList($searchModel, 'department_id', ArrayHelper::map(Department::find()->all(), 'id', 'department'),['class' => 'form-control', 'prompt' => 'เลือกสังกัด']),
            ],
            'firstname',
            'lastname',
            //'address:ntext',
            // 'tel',
            // 'color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
