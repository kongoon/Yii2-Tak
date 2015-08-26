<?php

namespace backend\modules\mission\controllers;

use yii\web\Controller;
use Yii;
use backend\modules\mission\models\Mission;
use yii\helpers\Url;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $times = Mission::find()->all();

        $events = array();

        foreach ($times AS $time){
          //Testing
          $Event = new \yii2fullcalendar\models\Event();
          $Event->id = $time->id;
          $Event->title = $time->title.'-'.$time->personal->firstname.' '.$time->personal->lastname;
          $Event->start = $time->date_start;
          $Event->end = $time->date_end;
          $Event->color = $time->personal->color;
          $Event->url = Url::to(['/mission/mission/view','id'=>$time->id]);
          $events[] = $Event;
        }

        return $events;
      }
}
