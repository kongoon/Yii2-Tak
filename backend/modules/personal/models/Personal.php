<?php

namespace backend\modules\personal\models;

use Yii;
use backend\modules\setting\models\Department;
use common\models\User;
/**
 * This is the model class for table "personal".
 *
 * @property integer $user_id
 * @property integer $department_id
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property string $tel
 * @property string $color
 *
 * @property Mission[] $missions
 * @property Department $department
 * @property User $user
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'department_id', 'firstname', 'lastname', 'color'], 'required'],
            [['user_id', 'department_id'], 'integer'],
            [['address'], 'string'],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 45],
            [['color'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'department_id' => 'สังกัด',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'address' => 'ที่อยู่',
            'tel' => 'เบอร์โทร',
            'color' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissions()
    {
        return $this->hasMany(Mission::className(), ['personal_user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
