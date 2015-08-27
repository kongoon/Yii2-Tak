<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\mission\models\Mission */

$this->title = 'เพิ่มภารกิจ';
$this->params['breadcrumbs'][] = ['label' => 'ภารกิจ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</div>