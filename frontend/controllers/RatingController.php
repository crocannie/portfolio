<?php

namespace frontend\controllers;
use common\models\StatusEvent;
use common\models\EventType;
use common\models\rating\Value;
use Yii;
use common\models\rating\Rating;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Date;
// use yii\web\NotFoundHttpException;
// 

error_reporting(E_ALL ^ E_STRICT);
error_reporting(E_ERROR);
/**
 * RatingController implements the CRUD actions for Rating model.
 */
class RatingController extends Controller
{
    
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rating models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Rating::find(),
        // ]);
        $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('statusEvent, valuesRating')
                        ->where(array('and', 'valuesRating.idFaculte'=>$id, 'statusEvent.id = valuesRating.idItem'))
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rating model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Rating model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rating();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

  public function actionUpdate($id, $idFac)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->idTable == 1){
                $status = Value::getStatus($idFac);
                return $this->redirect(['status', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 2){
                $contest = Value::getContest($idFac);
                return $this->redirect(['contest', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 3){
                $document = Value::getDocument($idFac);
                return $this->redirect(['document', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 4){
                $document = Value::getArticle($idFac);
                return $this->redirect(['article', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 5){
                $document = Value::getScience($idFac);
                return $this->redirect(['science', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 6){
                $document = Value::getPatent($idFac);
                return $this->redirect(['science', 'id' => $model->idFacultet]);
            }           
            if ($model->idTable == 7){
                $document = Value::getPatent($idFac);
                return $this->redirect(['typecontest', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 8){
                $document = Value::getEducationLevel($idFac);
                return $this->redirect(['education', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 9){
                $document = Value::getAuthorship($idFac);
                return $this->redirect(['authorship', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 10){
                $document = Value::getStatuspatent($idFac);
                return $this->redirect(['statuspatent', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 11){
                $document = Value::getActivity($idFac);
                return $this->redirect(['activity', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 12){
                $document = Value::getLevel($idFac);
                return $this->redirect(['level', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 13){
                $document = Value::getGrant($idFac);
                return $this->redirect(['grant', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 14){
                $document = Value::getTypeParticipant($idFac);
                return $this->redirect(['typeparticipant', 'id' => $model->idFacultet]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
        // $model = Rating::find()->where(['idTable'=>$idTable])->andwhere(['idFacultet'=>$idFacultet])->all();
      //     for ($i = 0; $i < count($values); $i++){
        //         $sql = 'UPDATE valuesRating SET value='.$values[$i]['value'].' WHERE idTable='.$idTable.' and idFacultet='.$idFacultet;
        //     }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Rating::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // Статус мероприятий
    public function actionStatus($id)
    {
        // $dataProvider = new ActiveDataProvider(['query' => Rating::find(),]);
        $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('statusEvent, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'statusEvent.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>1])
        ]);
        //
        $today = date('Y-m-d');
        $from = Date::find()->where(['idFacultet'=>$id])->one()->from;
        $to = Date::find()->where(['idFacultet'=>$id])->one()->to;

        if ($today > $from && $today < $to){
            Yii::$app->session->setFlash('error', 'Сроки установлены c '.$from.' по '.$to.'. Вы не можете вносить изменения.');
        } else {
            if(Yii::$app->request->post('hasEditable')){
                $sgroupId = Yii::$app->request->post('editableKey');
                $sgroup = Rating::findOne($sgroupId);
                $out = Json::encode(['output'=>'', 'message'=>'']);
                $post = [];
                $posted = current($_POST['Rating']);
                $post['Rating'] = $posted;
                if ($sgroup->load($post)){
                    $sgroup->save();    
                    $output = '';
                    $out = Json::encode(['output' => $output]);
                }
                echo $out;
                return;
            }
        }
        return $this->render('status', [
            'dataProvider' => $dataProvider,
        ]);
        //             throw new NotFoundHttpException('The requested page does not exist.');

    }

    // Виды мероприятияй
    public function actionContest($id)
    {
    $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('eventType.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, eventType.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('eventType, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'eventType.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>2])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            // $sgroup = Rating::find()->where(['idItem'=>$sgroupId])->andwhere(['idTable'=>2])->andwhere(['idFacultet'=>$id])->all();
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('contest', [
            'dataProvider' => $dataProvider,
        ]);
        // $model = Value::getContest($id);
        // return $this->render('contest', [
        //     'model' => $model,
        // ]);
    }

    // Виды нарград
    public function actionDocument($id)
    {
    $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('typeDocument.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, typeDocument.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('typeDocument, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'typeDocument.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>3])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('document', [
            'dataProvider' => $dataProvider,
        ]);
    }    

    // Виды публикаций
    public function actionArticle($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('typeArticle.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, typeArticle.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('typeArticle, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'typeArticle.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>4])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('article', [
            'dataProvider' => $dataProvider,
        ]);
    }
        
    // Направления науки
    public function actionScience($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('scienceDirection.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, scienceDirection.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('scienceDirection, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'scienceDirection.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>5])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('science', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPatent($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('typePatent.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, typePatent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('typePatent, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'typePatent.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>6])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('patent', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTypecontest($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('typeContest.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, typeContest.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('typeContest, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'typeContest.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>7])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('typecontest', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEducation($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('educationLevel.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, educationLevel.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('educationLevel, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'educationLevel.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>8])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('education', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAuthorship($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('authorship.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, authorship.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('authorship, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'authorship.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>9])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('authorship', [
            'dataProvider' => $dataProvider,
        ]);
    }
    //statuspatent
    public function actionStatuspatent($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('statusPatent.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, statusPatent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('statusPatent, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'statusPatent.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>10])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('statuspatent', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionActivity($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('activity.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, activity.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('activity, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'activity.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>11])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('activity', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLevel($id)
    {
    $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('level.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, level.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('level, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'level.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>12])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('level', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionGrant($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('grantType.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, grantType.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('grantType, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'grantType.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>13])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('grant', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionTypeparticipant($id)
    {
     $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('typeParticipant.name, valuesRating.id, valuesRating.idTable, valuesRating.idItem, typeParticipant.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('typeParticipant, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'typeParticipant.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>14])
        ]);
        if(Yii::$app->request->post('hasEditable')){
            $sgroupId = Yii::$app->request->post('editableKey');
            $sgroup = Rating::findOne($sgroupId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rating']);
            $post['Rating'] = $posted;
            if ($sgroup->load($post)){
                $sgroup->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        return $this->render('typeparticipant', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionStudents($id)
    {
        $model = Value::getStudent($id);

        return $this->render('students', [
            'model' => $model,
        ]);
    }
}
