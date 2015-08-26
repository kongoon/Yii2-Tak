<?php
$this->title = 'ภารกิจ';

use yii2fullcalendar\yii2fullcalendar;
use yii\helpers\Url;
?>
<?= yii2fullcalendar::widget([
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