<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\modules\setting\models\Department;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\personal\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มบุคลากร', ['create'], ['class' => 'btn btn-success']) ?>
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
                'filter' => Html::activeDropDownList($searchModel, 
                        'department_id', 
                        ArrayHelper::map(Department::find()->all(), 
                                'id', 
                                'department'),
                        ['class' => 'form-control', 
                            'prompt' => 'เลือกสังกัด']),
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
</div>