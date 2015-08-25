<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'user_id'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'integer'],
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
            'title' => 'เรื่อง',
            'description' => 'รายละเอียด',
            'created_at' => 'บันทึกเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'user_id' => 'ผู้โพส',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
