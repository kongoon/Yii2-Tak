<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\mission\models\Mission */

$this->title = 'Create Mission';
$this->params['breadcrumbs'][] = ['label' => 'Missions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
