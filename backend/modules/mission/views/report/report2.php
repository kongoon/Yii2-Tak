<?php
use miloschuman\highcharts\Highcharts;
$this->title = 'สรุปข้อมูลตามเดือน';
?>
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