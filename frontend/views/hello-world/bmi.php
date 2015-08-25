<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php if($model->load(Yii::$app->request->post())){?>
    <div class="alert alert-<?= $type?>">
        <?= $desc?>
    </div>
<?php }?>
<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'weight')?>
<?= $form->field($model, 'hight')?>
<?= Html::submitButton('คำนวณ', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end()?>
