<?php
//Bmi.php
namespace frontend\models;
use yii\base\Model;
class Bmi extends Model
{
    public $weight;
    public $hight;
    
    public function rules() {
        return [
            [['weight','hight'],'required'],
            [['weight','hight'],'integer'],
        ];
    }
    public function attributeLabels() {
        return [
            'weight' => 'น้ำหนัก',
            'hight' => 'ส่วนสูง',
        ];
    }
}