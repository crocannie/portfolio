<?php

namespace frontend\controllers;

use Yii;
use common\models\Quotas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\models\rating\Student;
use common\models\rating\Value;

/**
 * QuotasController implements the CRUD actions for Quotas model.
 */
class QuotasController extends Controller
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
     * Lists all Quotas models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $sql = Yii::$app->db->createCommand()->batchInsert(Quotas::tableName(), ['idStudent', 'mark', 'status', 'r1'], $rows)->execute();
        // $rows[] = [
        //     'idStudent' => $students[$i]['idStudent'],
        //     'mark' => 1,
        //     'status' => 2,
        //     'r1' => 2,
        // ];        
        // $cnt = Quotas::findOne(1);
        // $cnt = 20;
        $count = Quotas::find()->where(['idFacultet'=>1])->all();
        foreach ($count as $row) {
            $cnt = $row['cnt'];
        }
        $activity = Value::getActivity(1);
        foreach ($activity as $row ) {
            if ($row['id'] == 1) {
                $studyValue = $row['value']*10;
            }
            if ($row['id'] == 2) {
                $scienceValue = $row['value']*10;
            }
            if ($row['id'] == 3) {
                $socialValue = $row['value']*10;
            }
           if ($row['id'] == 4) {
               $cultureValue = $row['value']*10;
           }
            if ($row['id'] == 5) {
                $sportValue = $row['value']*10;
            }
        }
        $studyCnt   = ($cnt * $studyValue)      / 100;
        $scienceCnt = ($cnt * $scienceValue)    / 100;
        $socialCnt  = ($cnt * $socialValue)     / 100;
        $cultureCnt = ($cnt * $cultureValue)    / 100;
        $sportCnt   = ($cnt * $sportValue)      / 100;

        $id = 1;
        $sql = Yii::$app->db->createCommand()->update('quotas', 
            ['study' => $studyCnt, 'science' => $scienceCnt, 'social' => $socialCnt, 'culture' => $cultureCnt, 'sport' => $sportCnt,  ], 'idFacultet='.$id)->execute();

        $dataProvider = new ActiveDataProvider([
            'query' => Quotas::find(),
        ]);
        
        $dataProvider2 = new ActiveDataProvider([
            'query' => Student::find()->where(['idFacultet'=>1]),
        ]);

        if(Yii::$app->request->post('hasEditable')){
            $quotas = Yii::$app->request->post('editableKey');
            $quotas = Quotas::findOne($quotas);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Quotas']);
            $post['Quotas'] = $posted;
            if ($quotas->load($post)){
                $quotas->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;

        }

        return $this->render('index', array(
            'dataProvider'=>$dataProvider,
                        'dataProvider2'=>$dataProvider2,
        ));
    }

    /**
     * Displays a single Quotas model.
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
     * Creates a new Quotas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Quotas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // $model = $this->findModel($id);
        $model = Quotas::find()->where(['idFacultet'=>$id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->idFacultet]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Quotas model.
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
     * Finds the Quotas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
