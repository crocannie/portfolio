<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Sotrudnik;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AchievementsStudy */

$all = urldecode('index.php?r=site/activities'); 
$achievements = urldecode('index.php?r=achievements-study/index&id='.Yii::$app->user->identity->id);

  if (User::isStudent(Yii::$app->user->identity->email)){
    $idStudent = Yii::$app->user->identity->id;
    $this->params['breadcrumbs'][] = ['label' => 'Все направления', 'url' => $all];
    $this->params['breadcrumbs'][] = ['label' => 'Учебная деятельность', 'url' => $achievements];
  }
  if (User::isSotrudnik(Yii::$app->user->identity->email)){
      if($_GET['id']){
            $id = $_GET['id'];
            $idStudent = $id;
        }
    $sotrudnik = Sotrudnik::findOne(Yii::$app->user->identity->id);
    $idFacultet = $sotrudnik->idFacultet0->id;
    $dec = urldecode('index.php?r=student/index&id='.$idFacultet); 
    $this->params['breadcrumbs'][] = ['label' => 'Деканат', 'url' => $dec];
  }

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
           $('input[type="radio"]').click(function() {
               if($(this).attr('id') == 'watch-me') {
                    $('#show-me').show();           
               }

               else {
                    $('#show-me').hide();   
               }
           });
        }); 
    </script>
</head>

<div class="achievements-study-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php   if (User::isStudent(Yii::$app->user->identity->email)){?>
            <?php if (($model->status != 0) and ($model->status != 3)){ ?>
                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'title'=>'Редактировать']) ?>
            <?php }?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger','title'=>'Удалить', 
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'dateEvent',
            'idEventType'=>[                    
                    'label'=>'Вид мероприятия',
                    'value' => $model->idEventType0->name,
            ],
            'idStatus'=>[                    
                    'label'=>'Статус мероприятия',
                    'value' => $model->idStatus0->name,
            ],
            'idLevel'=>[                    
                    'label'=>'Уровень мероприятия',
                    'value' => $model->idLevel0->name,
            ],
            'eventTitle',

            'idDocumentType'=>[                    
                    'label'=>'Вид полученного документа',
                    'value' => $model->idDocumentType0->name,
            ],

            //'idDocument',
            //'idStudent',
        ],
    ]) ?>
    <label>Файл: </label>
    <?php 
    $path = $model->location;
        echo "<a href={$path}><i class='glyphicon glyphicon-file'></i></a><br>";
    ?>

<?php   if (User::isSotrudnik(Yii::$app->user->identity->email)){?>

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'status')->radioList([
        '0' => 'Принято',
        '2' => 'На редактирование',
    ]);?>
    
    <?= $form->field($model, 'message')->textArea(['maxlength' => true, 'style'=>'width:500px']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php }?>

</div>
