<?php

namespace frontend\controllers;

use Yii;
use common\models\Quotas;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\models\rating\Student;
use common\models\rating\Value;
use kartik\mpdf\Pdf;

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
    public function actionIndex($id)
    {

        $count = Quotas::find()->where(['idFacultet'=>$id])->all();
        $count = Quotas::find()->where(['idFacultet'=>1])->all();
        foreach ($count as $row) {
            $cnt = $row['cnt'];
        }
        $activity = Value::getActivity($id);
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
        $studyCnt   = round(($cnt * $studyValue)      / 100);
        $scienceCnt = round(($cnt * $scienceValue)    / 100);
        $socialCnt  = round(($cnt * $socialValue)     / 100);
        $cultureCnt = round(($cnt * $cultureValue)    / 100);
        $sportCnt   = round(($cnt * $sportValue)      / 100);
        // $studyCnt   = ($cnt * $studyValue)      / 100;
        // $scienceCnt = ($cnt * $scienceValue)    / 100;
        // $socialCnt  = ($cnt * $socialValue)     / 100;
        // $cultureCnt = ($cnt * $cultureValue)    / 100;
        // $sportCnt   = ($cnt * $sportValue)      / 100;
        // $id = 1;
        $sql = Yii::$app->db->createCommand()->update('quotas', 
            ['study' => $studyCnt, 'science' => $scienceCnt, 'social' => $socialCnt, 'culture' => $cultureCnt, 'sport' => $sportCnt,  ], 'idFacultet='.$id)->execute();

        $dataProvider = new ActiveDataProvider([
            'query' => Quotas::find()->where(['idFacultet'=>$id]),
        ]);
        
        $dataProvider2 = new ActiveDataProvider([
            'query' => Student::find()->where(['idFacultet'=>$id]),
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
        
        $dataProvider01 = new SqlDataProvider([
            'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$studyCnt,
            'params' => [':idFacultet' => $id, ':idActivity' => 1,],
            'pagination' => [
                'pageSize' => false,
            ],
        ]);

        $dataProvider02 = new SqlDataProvider([
            'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$scienceCnt,
            'params' => [':idFacultet' => $id, ':idActivity' => 2,],
            'pagination' => [
                'pageSize' => false,
            ],
        ]);

        $dataProvider03 = new SqlDataProvider([
            'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$socialCnt,
            'params' => [':idFacultet' => $id, ':idActivity' => 3,],
            'pagination' => [
                'pageSize' => false,
            ],
        ]);

        $dataProvider04 = new SqlDataProvider([
            'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$cultureCnt,
            'params' => [':idFacultet' => $id, ':idActivity' => 4,],
            'pagination' => [
                'pageSize' => false,
            ],
        ]);

        $dataProvider05 = new SqlDataProvider([
            'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id ORDER BY r1 DESC limit '.$sportCnt,
            'params' => [':idFacultet' => $id, ':idActivity' => 5,],
            'pagination' => [
                'pageSize' => false,
            ],
        ]);
        
        $model = Quotas::find()->where(['idFacultet'=>$id])->one();

        return $this->render('index', array(
            'model'=>$model,
            'dataProvider'=>$dataProvider,
            'model'=>$model,
            'dataProvider2'=>$dataProvider2,
            'dataProvider01'=>$dataProvider01,
            'dataProvider02'=>$dataProvider02,
            'dataProvider03'=>$dataProvider03,
            'dataProvider04'=>$dataProvider04,
            'dataProvider05'=>$dataProvider05,
        ));
    }

    public function actionCalc($id)
    {
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

        $dataProvider = new ActiveDataProvider([
            'query' => Quotas::find()->where(['idFacultet'=>$id]),
        ]);
        
        $model = Quotas::find()->where(['idFacultet'=>$id])->one();

        return $this->render('index', array(
            'dataProvider'=>$dataProvider,
            'model'=>$model,
        ));
    }
    /**
     * Displays a single Quotas model.
     * @param integer $id
     * @return mixed
     */

    public function actionView($id)
    {
        // return $this->render('view', [
        //     'model' => $this->findModel($id),
        // ]);
        $model = Student::findOne($id);

        if ($model->idActivity == 1){
            return $this->render('/rating-student/study', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 2){
            return $this->render('/rating-student/science', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 3){
            return $this->render('/rating-student/society', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 4){
            return $this->render('/rating-student/culture', [
                'model' => $model,
            ]);
        }
        if ($model->idActivity == 5){
            return $this->render('/rating-student/sport', [
                'model' => $model,
            ]);
        }
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
    public function actionMpdf() {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,


            // 'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            // 'content' => 'sfdk',
            'content' => $this->renderPartial('viewpdf'),
            'filename' => date("Y-m-d").'.pdf',
            'options' => [
                // 'title' => 'Privacy Policy - Krajee.com',
                // 'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                // 'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
                // 'SetFooter' => ['| {PAGENO}|'],
            ]
        ]);
        return $pdf->render();

    }

     public function actionViewpdf(){
        // $model = new Quotas();
        $dataProvider = new ActiveDataProvider([
            'query' => Quotas::find(),
        ]);

        return $this->render('viewpdf', [
            'dataProvider' => $dataProvider,
        ]);    }
}
