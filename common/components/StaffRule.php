<?php
namespace common\components;

use yii\rbac\Rule;
use Yii;

class StaffRule extends Rule{
    public $name = 'isStaff';
    
    public function execute($user, $item, $params) { //abstract method implement
        //return isset($params['post']) ? $params['post']->user_id == $user : false;
        if(isset($params['model'])){
            $model = $params['model'];
        }else{
            $id = Yii::$app->request->get('id');
            $model = Yii::$app->controller->findUserModel($id);
        }
        return $model->user_id == $user;
    }

}

