<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\personal\models\Personal;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\mission\models\Mission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'personal_user_id')
            ->dropDownList(ArrayHelper::map(
                    Personal::find()->all(), 
                    'user_id', 
                    function($model){
                        return '['.$model->department->department.'] '.$model->firstname.' '.$model->lastname;
                    }))?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_start')
                            ->widget(DateTimePicker::className(), [
                                'language' => 'th',
                                'template' => '{addon}{input}',
                                'clientOptions' => [
                                    'format' => 'yyyy-mm-dd HH:ii:00',
                                    'startDate' => date("Y-m-d H:i:s"),
                                    
                                ]
                            ]) ?>

    <?= $form->field($model, 'date_end')
                            ->widget(DateTimePicker::className(), [
                                'language' => 'th',
                                'template' => '{addon}{input}',
                                'clientOptions' => [
                                    'format' => 'yyyy-mm-dd HH:ii:00',
                                    'startDate' => date("Y-m-d H:i:s"),
                                    
                                ]
                            ]) ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
