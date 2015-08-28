<?php
#RbacController.php
//yii rbac/hello
namespace console\controllers;

use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public function actionHello()
    {
        echo 'Hello';
    }
    public function actionCreatePermission()
    {
        //yii rbac/create-permission
        $auth = Yii::$app->authManager;
        
        // mission
        $mission_index = $auth->createPermission('mission/mission/index');
        $mission_index->description = 'รายการภารกิจ';
        $auth->add($mission_index);
        
        $mission_create = $auth->createPermission('mission/mission/create');
        $mission_create->description = 'เพิ่มภารกิจ';
        $auth->add($mission_create);
        
        $mission_update = $auth->createPermission('mission/mission/update');
        $mission_update->description = 'แก้ไขภารกิจ';
        $auth->add($mission_update);
        
        $mission_delete = $auth->createPermission('mission/mission/delete');
        $mission_delete->description = 'ลบภารกิจ';
        $auth->add($mission_delete);
        
        $mission_view = $auth->createPermission('mission/mission/view');
        $mission_view->description = 'ดูภารกิจ';
        $auth->add($mission_view);
        
        // personal
        $personal_index = $auth->createPermission('personal/personal/index');
        $personal_index->description = 'รายการบุคลากร';
        $auth->add($personal_index);
        
        $personal_create = $auth->createPermission('personal/personal/create');
        $personal_create->description = 'เพิ่มบุคลากร';
        $auth->add($personal_create);
        
        $personal_update = $auth->createPermission('personal/personal/update');
        $personal_update->description = 'แก้ไขบุคลากร';
        $auth->add($personal_update);
        
        $personal_delete = $auth->createPermission('personal/personal/delete');
        $personal_delete->description = 'ลบบุคลากร';
        $auth->add($personal_delete);
        
        $personal_view = $auth->createPermission('personal/personal/view');
        $personal_view->description = 'ดูบุคลากร';
        $auth->add($personal_view);
        
        // department
        $department_index = $auth->createPermission('setting/department/index');
        $department_index->description = 'รายการฝ่าย';
        $auth->add($department_index);
        
        $department_create = $auth->createPermission('setting/department/create');
        $department_create->description = 'เพิ่มฝ่าย';
        $auth->add($department_create);
        
        $department_update = $auth->createPermission('setting/department/update');
        $department_update->description = 'แก้ไขฝ่าย';
        $auth->add($department_update);
        
        $department_delete = $auth->createPermission('setting/department/delete');
        $department_delete->description = 'ลบฝ่าย';
        $auth->add($department_delete);
        
        $department_view = $auth->createPermission('setting/department/view');
        $department_view->description = 'ดูฝ่าย';
        $auth->add($department_view);
        
        echo 'Create Permission success!';
    }   
    public function actionCreateRole()
    {
        //yii rbac/create-role
        $auth = Yii::$app->authManager;
        
        // mission
        $mission_index = $auth->createPermission('mission/mission/index');
        $mission_create = $auth->createPermission('mission/mission/create');
        $mission_update = $auth->createPermission('mission/mission/update');
        $mission_delete = $auth->createPermission('mission/mission/delete');
        $mission_view = $auth->createPermission('mission/mission/view');

        // personal
        $personal_index = $auth->createPermission('personal/personal/index');
        $personal_create = $auth->createPermission('personal/personal/create');
        $personal_update = $auth->createPermission('personal/personal/update');
        $personal_delete = $auth->createPermission('personal/personal/delete');
        $personal_view = $auth->createPermission('personal/personal/view');
  
        // department
        $department_index = $auth->createPermission('setting/department/index');
        $department_create = $auth->createPermission('setting/department/create');
        $department_update = $auth->createPermission('setting/department/update');
        $department_delete = $auth->createPermission('setting/department/delete');
        $department_view = $auth->createPermission('setting/department/view');

        
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $mission_index);
        $auth->addChild($user, $mission_view);
        $auth->addChild($user, $personal_index);
        $auth->addChild($user, $personal_view);
        $auth->addChild($user, $department_index);
        $auth->addChild($user, $department_view);
        
        $staff = $auth->createRole('staff');
        $auth->add($staff);
        $auth->addChild($staff, $mission_create);
        $auth->addChild($staff, $mission_update);
        $auth->addChild($staff, $personal_create);
        $auth->addChild($staff, $personal_update);
        $auth->addChild($staff, $department_create);
        $auth->addChild($staff, $department_update);
        $auth->addChild($staff, $user);
        
        
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $mission_delete);
        $auth->addChild($admin, $personal_delete);
        $auth->addChild($admin, $department_delete);
        $auth->addChild($admin, $staff);
        echo 'Create Role success!';
    }
    
    public function actionCreateAssignment()
    {
        $auth = Yii::$app->authManager;
        $user = $auth->createRole('user');
        $staff = $auth->createRole('staff');
        $admin = $auth->createRole('admin');
        
        $auth->assign($user, 6);
        $auth->assign($staff, 4);
        $auth->assign($admin, 1);
        echo 'Create Assignment success!';
    }
}
