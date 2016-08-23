<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\Sotrudnik;
use yii\data\SqlDataProvider;

$this->title = 'Подтверждение достижений';

$sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
$idFacultet = $sotrudnik->idFacultet0->id;
$dec = urldecode('index.php?r=student/index&id='.$idFacultet); 
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => $dec];

$this->params['breadcrumbs'][] = $this->title;


// $sql = 'SELECT * FROM achievements WHERE idStudent in(SELECT idStudent from students where idFacultet = :idFacultet);';
//         $status = Yii::$app->db->createCommand($sql)
//                                 ->bindValue(':idFacultet', 1)
//                                 ->queryAll();
// echo 'count: '.count($status);
// echo $dataProvider->getTotalCount();
echo $dataProvider->getCount();
// echo $dataProvider1->getCount();

?>
<div class="achievements-study-index">
    <div class="row">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" style="width: 200px;">
                <li class="active"><a data-toggle="tab" href="#panel0">Достижения в учебной деятельности <span class="badge pull-right"><?=$dataProvider->getCount()
?></span></a></li>
                <li><a data-toggle="tab" href="#panel20">Гранты <span class="badge pull-right"><?=$dataProvider->getCount()
?></span></a></li>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <div id="panel0" class="tab-pane fade in active">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,       
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                // 'name',
                                'id',
                                'idStudent',
                            ],
                        ]); ?>
                </div>
            </div>  
        </div>
    </div>
</div>