<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\personal\models\Personal */

$this->title = 'แก้ไข: ' . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'บุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
