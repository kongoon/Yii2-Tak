<?php
$this->title = 'ปฏิทินภารกิจบุคลากร';

use yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <?=
        yii2fullcalendar::widget([
            'options' => [
                'lang' => 'th',
            ],
            'header' => [
                'left' => 'prev,next today',
                'center' => 'title',
                'right' => 'month,agendaWeek,agendaDay'
            ],
            'clientOptions' => [
                'timeFormat' => 'H:mm',
            ],
            'ajaxEvents' => Url::to(['/mission/default/jsoncalendar'])
        ]);
        ?>
    </div>
</div>