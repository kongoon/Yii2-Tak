<?php

namespace backend\modules\mission\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use backend\modules\personal\models\Personal;
use kartik\mpdf\Pdf;

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
            $rs = $command->queryOne();

            $data[]=['name'=>$p['firstname'].' '.$p['lastname'],'data'=>[intval($rs['m1']),intval($rs['m2']),intval($rs['m3']),intval($rs['m4']),intval($rs['m5']),intval($rs['m6']),intval($rs['m7']),intval($rs['m8']),intval($rs['m9']),intval($rs['m10']),intval($rs['m11']),intval($rs['m12'])]];

        } // end foreach personal
        return $this->render('report2',['data'=>$data]);
    }

    public function actionReport3()
    {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_report');

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@backend/web/css/kv-mpdf-bootstrap.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:30px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['ทดสอบการใช้งานภาษาไทยใน PDF'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
        //return $this->render('report3');
    }

    public function actionReport4()
    {
        return $this->render('report4');
    }

}
