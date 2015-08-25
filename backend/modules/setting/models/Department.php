<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $department
 *
 * @property Personal[] $personals
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department'], 'required'],
            [['department'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'หน่วยงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['department_id' => 'id']);
    }
}
