<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\personal\models\Personal;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\mission\models\MissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการภารกิจบุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <?= Html::a('เพิ่มภารกิจ', ['create'], ['class' => 'btn btn-warning']) ?>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

      
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

       

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                //'personal_user_id',
                [
                    'attribute' => 'personal_user_id',
                    'value' => function($model) {
                        return $model->personal->firstname . ' ' . $model->personal->lastname;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'personal_user_id', ArrayHelper::map(Personal::find()->all(), 'user_id', function($model) {
                                        return $model->firstname . ' ' . $model->lastname;
                                    }), ['class' => 'form-control']
                    ),
                ],
                //'title',
                [
                    'format' => 'html',
                    'attribute' => 'title',
                    'value' => function($model) {
                        return Html::a($model->title, ['mission/view', 'id' => $model->id]);
                    }
                        ],
                        //'description:ntext',
                        'date_start',
                        'date_end',
                        // 'created_at',
                        // 'updated_at',
                        [
                            'attribute' => 'user_id',
                            'value' => function($user) {
                                return $user->personalUser->firstname . ' ' . $user->personalUser->lastname;
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

    </div>
</div>