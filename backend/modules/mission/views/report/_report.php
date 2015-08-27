<?php
use backend\modules\personal\models\Personal;
?>
<table class="table table-bordered table-striped table-condensed">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=1;
        foreach(Personal::find()->all() as $p){?>
        <tr>
            <td><?= $i++;?></td>
            <td><?= $p->firstname?></td>
            <td><?= $p->lastname?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
