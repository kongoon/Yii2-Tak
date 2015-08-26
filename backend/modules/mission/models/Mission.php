<?php

namespace backend\modules\mission\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use backend\modules\personal\models\Personal;
/**
 * This is the model class for table "mission".
 *
 * @property integer $id
 * @property integer $personal_user_id
 * @property string $title
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Personal $personalUser
 */
class Mission extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            [
               'class' =>  TimestampBehavior::className(),
               'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'personal_user_id', 'title', 'date_start', 'date_end'], 'required'],
            [['personal_user_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'personal_user_id' => 'ผู้ทำภารกิจ',
            'title' => 'เรื่อง',
            'description' => 'รายละเอียด',
            'date_start' => 'เริ่ม',
            'date_end' => 'สิ้นสุด',
            'created_at' => 'เพิ่มเมื่อ',
            'updated_at' => 'ปรับปรุงเมื่อ',
            'user_id' => 'ผู้บันทึก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalUser()//ผู้บันทึก
    {
        return $this->hasOne(Personal::className(), ['user_id' => 'personal_user_id']);
    }
    
    public function getPersonal()//ผู้ไป
    {
        return $this->hasOne(Personal::className(), ['user_id' => 'personal_user_id']);
    }
}
