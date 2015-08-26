<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\setting\models\Department;
use kartik\color\ColorInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\personal\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo $form->field($user, 'username')?>
    
    <?= $form->field($user, 'password_hash')?>
    
    <?= $form->field($user, 'email')?>

    <?= $form->field($model, 'department_id')
            ->dropDownList(ArrayHelper::map(Department::find()->all(), 'id', 'department')) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::classname(), [
    'options' => ['placeholder' => 'เลือกสีที่ชอบ'],
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
