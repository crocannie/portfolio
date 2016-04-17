<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Students;
use yii\db\Command;
use common\models\rating\Culture;
use common\models\StatusEvent;
use common\models\rating\Rating;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idStudent',
            'secondName',
            'firstName',
            'midleName',
            'idCity',
            // 'idUniversity',
            // 'idFacultet',
            // 'idNapravlenie',
            // 'idGroup',
            // 'email:email',
            // 'password',
            // 'registrationCode',
            // 'login',
            // 'status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php
    // $students = Students::find()->where(['idFacultet'=>1])->all();
    // echo count($students).'<br>';
    // for ($i = 0; $i < count($students); $i++){
    //     $rows[] = [
    //         'idStudent' => $students[$i]['idStudent'],
    //         'mark' => 1,
    //         'status' => 2,
    //         'r1' => 2,
    //     ];
    //     echo $i.' '.$students[$i]['idStudent'].'<br>';
    // }
    // $sql = Yii::$app->db->createCommand()->batchInsert(Culture::tableName(), ['idStudent', 'mark', 'status', 'r1'], $rows)->execute();
    $name = 'statusEvent';
    // $status = StatusEvent::find()->all();
    $sql = 'select * from '.$name;
    $status = Yii::$app->db->createCommand($sql)->queryAll();

    $table = Yii::$app->db->createCommand('SELECT * FROM `table`')->queryAll();
    for ($i = 0; $i < count($table); $i++) {
        $sql = Yii::$app->db->createCommand('select * from '.$table[$i]['name'])->queryAll();
        echo '<br>'.$table[$i]['name'].': '.count($sql);
        // $idT = $table[$i]['id'];
        for ($j = 0; $j < count($sql); $j++){
            $rows[] = [
                'idFacultet' => 1,
                'idTable' => $table[$i]['id'],
                'idItem' => $sql[$j]['id'],
                'value' => $j + 2,
            ];        
        }
    }   
    $insert = Yii::$app->db->createCommand()->batchInsert(Rating::tableName(), ['idFacultet', 'idTable', 'idItem', 'value'], $rows)->execute();

    // for ($i = 0; $i < count($status); $i++){
    //     $rows[] = [
    //         'idFacultet' => 1,
    //         'idTable' => 1,
    //         'idItem' => $status[$i]['id'],
    //         'value' => $i + 1,
    //     ];
    //     // echo $i.' '.$status[$i]['idStudent'].'<br>';
    // }
    // $sql = Yii::$app->db->createCommand()->batchInsert(Rating::tableName(), ['idFacultet', 'idTable', 'idItem', 'value'], $rows)->execute();
?>
</div>
