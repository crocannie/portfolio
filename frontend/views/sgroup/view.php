<?php
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Sotrudnik;
use common\models\Students;
use yii\web\NotFoundHttpException;
use common\models\User;
// use common\models\Sotrudnik;

  if ((Yii::$app->user->isGuest) or (User::isStudent(Yii::$app->user->identity->email))){
    throw new NotFoundHttpException('Страница не найдена.');
}
/* @var $this yii\web\View */
/* @var $model common\models\Sgroup */
$id = Yii::$app->user->identity->id;
$sotrudnik = Sotrudnik::findOne($id);
$idFacultet = $sotrudnik->idFacultet0->id;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => urldecode('index.php?r=site/dekanat')  ];
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => urldecode('index.php?r=sgroup/index&id='.$idFacultet)];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sgroup-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'idNapravlenie'=>[                    
                    'label'=>'Направление подготовки',
                    'value' => $model->idNapravlenie0->shifr.' '.$model->idNapravlenie0->name,
            ],
        ],
    ]) ?>

<?php
        $dataProvider = new ActiveDataProvider([
            'query' => Students::find()->where(['idGroup'=>$model->id])
        ]);
    $students = Students::find()->where(['idGroup'=>$model->id])->all();
    // foreach ($students as $row) {
    //     echo $row['secondName'].' '.$row['firstName'].'<br>';
    // }?>
    <br>
    <h3><?= Html::encode('Список студентов') ?></h3>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'secondName'=>[
                    'class' => \yii\grid\DataColumn::className(),
                    'format' => 'html',
                        'label'=>'ФИО',
                    'value' => function ($students, $index, $widget) {
                        return $students->secondName.' '.$students->firstName.' '.$students->midleName ;},
            ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
?>
</div>
