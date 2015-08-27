<?php
use yii\bootstrap\Nav;
use common\widgets\Menu;
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?= Menu::widget([
            'options' => [
                'class' => 'sidebar-menu',
                'activateParents' => true
            ],
            'items' => [
                [
                    'label' => 'หน้าหลัก',
                    'url' => Yii::$app->homeUrl,
                    'icon' => 'fa-home',
                    'active' => Yii::$app->request->url === Yii::$app->homeUrl,
                ],
                [
                    'label' => 'ภารกิจ',
                    'url' => '#',
                    'icon' => 'fa-calendar-check-o',
                    'options' => [
                        'class' => 'treeview'
                    ],
                    'items' => [
                        [ 
                            'label' => 'ปฏิทินภารกิจ',
                            'url' => ['/mission/default/index'],
                            'icon' => 'fa-calendar-check-o',
                            'active' => Yii::$app->request->url===Url::toRoute('/mission/default/index'),
                        ],
                        [
                            'label' => 'เพิ่มภารกิจ',
                            'url' => ['/mission/mission/create'],
                            'icon' => 'fa-user',
                            'active' => Yii::$app->request->url===Url::toRoute('/mission/mission/create'),
                        ],
                        [
                            'label' => 'จัดการภารกิจ',
                            'url' => ['/mission/mission/index'],
                            'icon' => 'fa-calendar-check-o',
                            'active' => Yii::$app->request->url===Url::toRoute('/mission/mission/index'),
                        ],
                        [
                            'label' => 'รายงาน',
                            'url' => ['#'],
                            'icon' => 'fa-calendar-check-o',
                            //'active' => Yii::$app->request->url===Url::toRoute('/mission/mission/index'),
                            'items' => [
                                [
                                    'label' => 'สรุปบุคคลากร',
                                    'url' => ['/mission/report/report1'],
                                    'icon' => 'fa-user',
                                    'active' => Yii::$app->request->url===Url::toRoute('/mission/report/report1'),
                                ],
                                [
                                    'label' => 'สรุปรายเดือน',
                                    'url' => ['/mission/report/report2'],
                                    'icon' => 'fa-user',
                                    'active' => Yii::$app->request->url===Url::toRoute('/mission/report/report2'),
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'label' => 'บุคลากร',
                    'url' => '#',
                    'icon' => 'fa-users',
                    'options' => [
                        'class' => 'treeview'
                    ],
                    'items' => [
                        
                        [
                            'label' => 'เพิ่มบุคลากร',
                            'url' => ['/personal/personal/create'],
                            'icon' => 'fa-user',
                            'active' => Yii::$app->request->url===Url::toRoute('/personal/personal/create'),
                        ],
                        [
                            'label' => 'จัดการบุคลากร',
                            'url' => ['/personal/personal/index'],
                            'icon' => 'fa-users',
                            'active' => Yii::$app->request->url===Url::toRoute('/personal/personal/index'),
                        ]
                    ]
                ],
                [
                    'label' => 'การตั้งค่า',
                    'url' => '#',
                    'icon' => 'fa-cogs',
                    'options' => [
                        'class' => 'treeview'
                    ],
                    'items' => [
                        [ 
                            'label' => 'จัดการฝ่าย',
                            'url' => ['/setting/department/index'],
                            'icon' => 'fa-calendar-check-o',
                            'active' => Yii::$app->request->url===Url::toRoute('/setting/department/index'),
                        ],
                        
                    ]
                ]
            ]
        ])?>
        
    </section>

</aside>
