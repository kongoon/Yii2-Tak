<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
$this->title = 'สรุปข้อมูลตามเดือน';
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
<?php
echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'รายงานจำนวนภารกิจแบ่งตามบุคคล'],
        'xAxis' => [
            'categories' => ['ม.ค.',
                        'ก.พ.',
                        'มี.ค.',
                        'เม.ย.',
                        'พ.ค.',
                        'มิ.ย.',
                        'ก.ค.',
                        'ส.ค.',
                        'ก.ย.',
                        'ต.ค.',
                        'พ.ย.',
                        'ธ.ค.']
        ],
        'yAxis' => [
            'title' => ['text' => 'จำนวน']
        ],
        'series' => 
            $data

    ]
]);
?>
    </div>
</div>