<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\rating\Rating;
use common\models\Sotrudnik;
use common\models\StatusEvent;
use common\models\Sgroup;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rating', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idFacultet',
            'idTable',
            'idItem',
            'value',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php
    echo "Test".'<br>';
    $id = Yii::$app->user->identity->id;
    $sotrudnik = Sotrudnik::findOne($id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $sql = 'select s.id, v.idItem, s.name, v.value, v.idFacultet from statusEvent s, valuesRating v where v.idFacultet = :id and s.id = v.idItem';
    $statusEvent = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $idFacultet)
                            ->queryAll();

    foreach($statusEvent as $row){
        echo '<br>'.$row['id'].' '.$row['name'].' '.$row['value'].'<br>';
    }



   $test = StatusEvent::find()
                        ->select('statusEvent.id, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('statusEvent, valuesRating')
                        ->where(['valuesRating.idFacultet'=>$idFacultet])
                        ->andwhere('statusEvent.id = valuesRating.idItem');
    echo count($test);
    foreach($test as $row){
        // echo '<br>'.$row['id'].' '.$row['name'].' '.$row['value'].'<br>';
    }
?>
</div>
