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
                return $this->redirect(['getLevel', 'id' => $model->idFacultet]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

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
        // $model = $this->getStatus($id);
        $model = Value::getStatus($id);
        // return $this->render('status', [
        //     'dataProvider' => $dataProvider,
        // ]);
        return $this->render('status', [
            'model' => $model,
        ]);
    }

    // Виды мероприятияй
    public function actionContest($id)
    {
        $model = Value::getContest($id);
        return $this->render('contest', [
            'model' => $model,
        ]);
    }

    // Виды нарград
    public function actionDocument($id)
    {
        $model = Value::getDocument($id);
        return $this->render('document', [
            'model' => $model,
        ]);
    }    

    // Виды публикаций
    public function actionArticle($id)
    {
        $model = Value::getArticle($id);
        return $this->render('article', [
            'model' => $model,
        ]);
    }
        
    // Направления науки
    public function actionScience($id)
    {
        $model = Value::getScience($id);
        return $this->render('science', [
            'model' => $model,
        ]);
    }

    public function actionPatent($id)
    {
        $model = Value::getPatent($id);
        return $this->render('patent', [
            'model' => $model,
        ]);
    }

    public function actionTypecontest($id)
    {
        $model = Value::getTypeContest($id);
        return $this->render('typeContest', [
            'model' => $model,
        ]);
    }

    public function actionEducation($id)
    {
        $model = Value::getEducationLevel($id);
        return $this->render('education', [
            'model' => $model,
        ]);
    }

    public function actionAuthorship($id)
    {
        $model = Value::getAuthorship($id);
        return $this->render('authorship', [
            'model' => $model,
        ]);
    }
    //statuspatent
    public function actionStatuspatent($id)
    {
        $model = Value::getStatuspatent($id);
        return $this->render('statuspatent', [
            'model' => $model,
        ]);
    }

    public function actionActivity($id)
    {
        $model = Value::getActivity($id);
        return $this->render('activity', [
            'model' => $model,
        ]);
    }

    public function actionLevel($id)
    {
        $model = Value::getLevel($id);
        return $this->render('level', [
            'model' => $model,
        ]);
    }
    
    public function actionGrant($id)
    {
        $model = Value::getLevel($id);
        return $this->render('grant', [
            'model' => $model,
        ]);
    }
    
    public function actionTypeParticipant($id)
    {
        $model = Value::getLevel($id);
        return $this->render('typeParticipant', [
            'model' => $model,
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
