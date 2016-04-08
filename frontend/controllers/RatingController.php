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
error_reporting( E_STRICT);
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

    /**
     * Updates an existing Rating model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $idFac)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->idTable == 1){
                $status = $this->getStatus($idFac);
                return $this->redirect(['status', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 2){
                $contest = $this->getContest($idFac);
                return $this->redirect(['contest', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 3){
                $document = $this->getDocument($idFac);
                return $this->redirect(['document', 'id' => $model->idFacultet]);
            }
            if ($model->idTable == 4){
                $document = $this->getArticle($idFac);
                return $this->redirect(['article', 'id' => $model->idFacultet]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rating model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rating model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rating the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rating::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionStatus($id)
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Rating::find(),
        // ]);
        $dataProvider = new ActiveDataProvider([
            'query' => Rating::find()
                        ->select('statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet')
                        ->from('statusEvent, valuesRating')
                        ->where(array('and', 'valuesRating.idFacultet'=>$id, 'statusEvent.id = valuesRating.idItem'))
                        ->andwhere(['valuesRating.idTable'=>1])
        ]);
        $model = $this->getStatus($id);

        // return $this->render('status', [
        //     'dataProvider' => $dataProvider,
        // ]);
        return $this->render('status', [
            'model' => $model,
        ]);
    }

    public function actionContest($id)
    {
        $model = $this->getContest($id);
        return $this->render('contest', [
            'model' => $model,
        ]);
    }

    public function actionDocument($id)
    {
        $model = $this->getDocument($id);
        return $this->render('document', [
            'model' => $model,
        ]);
    }    

    public function actionArticle($id)
    {
        $model = $this->getArticle($id);
        return $this->render('article', [
            'model' => $model,
        ]);
    }
    public function getStatus($id){
        $sql = 'select valuesRating.id as idValue, statusEvent.name, statusEvent.id, valuesRating.idTable, valuesRating.idItem, statusEvent.name, valuesRating.value, valuesRating.idFacultet from statusEvent, valuesRating where valuesRating.idFacultet = :id and statusEvent.id = valuesRating.idItem and valuesRating.idTable = 1';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getContest($id){
        $sql = 'select valuesRating.id as idValue, eventType.name, eventType.id, valuesRating.idTable, valuesRating.idItem, eventType.name, valuesRating.value, valuesRating.idFacultet from eventType, valuesRating where valuesRating.idFacultet = :id and eventType.id = valuesRating.idItem and valuesRating.idTable = 2';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getDocument($id){
        $sql = 'select valuesRating.id as idValue, typeDocument.name, typeDocument.id, valuesRating.idTable, valuesRating.idItem, typeDocument.name, valuesRating.value, valuesRating.idFacultet from typeDocument, valuesRating where valuesRating.idFacultet = :id and typeDocument.id = valuesRating.idItem and valuesRating.idTable = 3';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }

    public function getArticle($id){
        $sql = 'select valuesRating.id as idValue, typeArticle.name, typeArticle.id, valuesRating.idTable, valuesRating.idItem, typeArticle.name, valuesRating.value, valuesRating.idFacultet from typeArticle, valuesRating where valuesRating.idFacultet = :id and typeArticle.id = valuesRating.idItem and valuesRating.idTable = 4';
        $status = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        return $status;                             
    }
}
