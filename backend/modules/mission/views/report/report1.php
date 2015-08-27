<?php
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
$this->title = 'สรุปจำนวนการทำภารกิจ';
//var_dump($data);
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
        
    
<?= Highcharts::widget([
    'options' => [
        'title' => ['text' => 'สรุปจำนวนการทำภารกิจ'],
        'xAxis' => [
            'categories' => ['จำนวน']
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน']
        ],
        'series' => $data,
    ]
])?>
        </div>
</div>

<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'firstname',
            'label' => 'ชื่อ'
        ],
        [
            'attribute' => 'lastname',
            'label' => 'นามสกุล'
        ],
        [
            'attribute' => 'mid',
            'label' => 'จำนวน (ครั้ง)'
        ]
    ]
])?>
    </div>
</div>