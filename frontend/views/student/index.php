<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Students;
use yii\db\Command;
use common\models\rating\Culture;
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
    $students = Students::find()->where(['idFacultet'=>1])->all();
    echo count($students).'<br>';
    for ($i = 0; $i < count($students); $i++){
        $rows[] = [
            'idStudent' => $students[$i]['idStudent'],
            'mark' => 1,
            'status' => 2,
            'r1' => 2,
        ];
        echo $i.' '.$students[$i]['idStudent'].'<br>';
    }
    $sql = Yii::$app->db->createCommand()->batchInsert(Culture::tableName(), ['idStudent', 'mark', 'status', 'r1'], $rows)->execute();

?>
</div>
