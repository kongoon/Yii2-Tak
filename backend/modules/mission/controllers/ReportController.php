<?php

namespace backend\modules\mission\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use backend\modules\personal\models\Personal;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport1()
    {
        $sql = "SELECT COUNT(m.id) AS mid,p.firstname,p.lastname 
                FROM mission m
                LEFT JOIN personal p ON p.user_id = m.personal_user_id
                GROUP BY m.personal_user_id
                ";
        $con = Yii::$app->db;
        $data = $con->createCommand($sql)->queryAll();
        $graph = [];
        foreach($data as $d)
        {
            $graph[] = [
                'type'=>'column',
                'name'=>$d['firstname'].' '.$d['lastname'],
                'data'=>[intval($d['mid'])]
            ];
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'sort' => [ 
                'attributes' => ['mid', 'firstname', 'lastname'],
            ],
        ]);
        return $this->render('report1',[
            'data' => $graph,
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionReport2()
    {   
        $persons = Personal::find()->all();

        $d = date('Y');
        $data = [];
        foreach ($persons as $p) {
            $sql = "SELECT p.firstname,p.lastname,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=01 AND YEAR(m.date_start)='" . $d . "') AS m1,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=02 AND YEAR(m.date_start)='" . $d . "') AS m2,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=03 AND YEAR(m.date_start)='" . $d . "') AS m3,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=04 AND YEAR(m.date_start)='" . $d . "') AS m4,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=05 AND YEAR(m.date_start)='" . $d . "') AS m5,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=06 AND YEAR(m.date_start)='" . $d . "') AS m6,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=07 AND YEAR(m.date_start)='" . $d . "') AS m7,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=08 AND YEAR(m.date_start)='" . $d . "') AS m8,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=09 AND YEAR(m.date_start)='" . $d . "') AS m9,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=10 AND YEAR(m.date_start)='" . $d . "') AS m10,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=11 AND YEAR(m.date_start)='" . $d . "') AS m11,
                        (SELECT COUNT(m.id) FROM mission m WHERE m.personal_user_id='" . $p->user_id . "' AND MONTH(m.date_start)=12 AND YEAR(m.date_start)='" . $d . "') AS m12
                        FROM mission m
                        LEFT JOIN personal p ON p.user_id = m.personal_user_id
                        WHERE m.personal_user_id='" . $p->user_id . "'
                        ";
            $command = Yii::$app->db->createCommand($sql);
            $rs = $command->queryAll();

            $data[]=['name'=>$p['firstname'].' '.$p['lastname'],'data'=>[intval($rs[0]['m1']),intval($rs[0]['m2']),intval($rs[0]['m3']),intval($rs[0]['m4']),intval($rs[0]['m5']),intval($rs[0]['m6']),intval($rs[0]['m7']),intval($rs[0]['m8']),intval($rs[0]['m9']),intval($rs[0]['m10']),intval($rs[0]['m11']),intval($rs[0]['m12'])]];

        } // end foreach personal
        return $this->render('report2',['data'=>$data]);
    }

    public function actionReport3()
    {
        return $this->render('report3');
    }

    public function actionReport4()
    {
        return $this->render('report4');
    }

}
