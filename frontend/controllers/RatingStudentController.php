<?php

namespace frontend\controllers;

use Yii;
use common\models\rating\Science;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\Students;
use common\models\Universities;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsStudy;
use common\models\rating\Student;
use common\models\rating\Value;


/**
 * RatingStudentController implements the CRUD actions for Student model.
 */

class RatingStudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        // $model = Student::findOne($id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find()->where(['idFacultet'=>$id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Student::findOne($id);

        if ($model->idActivity == 1){
            return $this->render('study', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 2){
            return $this->render('science', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 3){
            return $this->render('society', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 4){
            return $this->render('culture', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 5){
            return $this->render('sport', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionStudy()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['study', 'id' => $model->idStudent]);
        } else {
            return $this->render('study', [
                'model' => $model,
            ]);
        }
    }

    public function actionScience()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['science', 'id' => $model->id]);
        } else {
            return $this->render('science', [
                'model' => $model,
            ]);
        }
    }

    public function actionSociety()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['society', 'id' => $model->id]);
        } else {
            return $this->render('society', [
                'model' => $model,
            ]);
        }
    }

    public function actionCulture()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['culture', 'id' => $model->id]);
        } else {
            return $this->render('culture', [
                'model' => $model,
            ]);
        }
    }

    public function actionSport()
    {
        $model = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['sport', 'id' => $model->id]);
        } else {
            return $this->render('sport', [
                'model' => $model,
            ]);
        }
    }

    public function actionCalc($cnt, $idFacultet)
    {
        $activity = Value::getActivity($idFacultet);
        foreach ($activity as $row ) {
        // echo $row['idValue'].' '.$row['id'].' '.$row['value'].'<br>';
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

        // return $studyCnt;
        // return $this->render('calc',[
        //     'model'=>$model,
        //     // $studyCnt,
        // ]);

    }
}
