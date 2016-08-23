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
use common\models\AchievementsStudy;
use common\models\rating\Fix;
use common\models\Grants;
use common\models\Patents;
use common\models\Articles;
use common\models\AchievementsCulture;
use common\models\PerformanceCulture;
use common\models\ParticipationCulture;
use yii\web\User;
use yii\web\Session;
        error_reporting(E_ALL);
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
        // $count = Quotas::find()->where(['idFacultet'=>1])->all();
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
            'query' => Student::find()->where(['idFacultet'=>$id])->orderBy('idStudent ASC')
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
    
        //
        $sql = 'SELECT tt.* FROM studentrating tt INNER JOIN (SELECT idStudent, MAX(r1) AS maxr FROM studentrating where idFacultet=:id GROUP BY idStudent) groupedtt ON tt.idStudent = groupedtt.idStudent AND tt.r1 = groupedtt.maxr';
        $st = Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
        foreach ($st as $row) {
            $a[] = $row['id'];
        }
        if (count($st) != 0){
            $comma_separated = implode(",", $a);
            
            $dataProvider01 = new SqlDataProvider([
                'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.')ORDER BY r1 DESC limit '.$studyCnt,
                'params' => [':idFacultet' => $id, ':idActivity' => 1,],
                'pagination' => [
                    'pageSize' => false,
                ],
            ]);

            $dataProvider02 = new SqlDataProvider([
                'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.') ORDER BY r1 DESC limit '.$scienceCnt,
                'params' => [':idFacultet' => $id, ':idActivity' => 2,],
                'pagination' => [
                    'pageSize' => false,
                ],
            ]);

            $dataProvider03 = new SqlDataProvider([
                'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.') ORDER BY r1 DESC limit '.$socialCnt,
                'params' => [':idFacultet' => $id, ':idActivity' => 3,],
                'pagination' => [
                    'pageSize' => false,
                ],
            ]);

            $dataProvider04 = new SqlDataProvider([
                'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.') ORDER BY r1 DESC limit '.$cultureCnt,
                'params' => [':idFacultet' => $id, ':idActivity' => 4,],
                'pagination' => [
                    'pageSize' => false,
                ],
            ]);

            $dataProvider05 = new SqlDataProvider([
                'sql' => 'SELECT r.*, concat(s.secondName, " ", s.firstName) as Fio, concat(e.name, ", ", g.name) as study, concat(n.shifr, " ", n.name) as napravlenie FROM studentRating r, students s, sgroup g, educationLevel e, napravlenie n  WHERE r.idFacultet = :idFacultet and r.idActivity = :idActivity and r.idStudent = s.idStudent and s.idGroup = g.id and s.idLevel = e.id and s.idNapravlenie = n.id and r.id in('.$comma_separated.') ORDER BY r1 DESC limit '.$sportCnt,
                'params' => [':idFacultet' => $id, ':idActivity' => 5,],
                'pagination' => [
                    'pageSize' => false,
                ],
            ]);
        } else {
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
        }
        
        $model = Quotas::find()->where(['idFacultet'=>$id])->one();

        return $this->render('index', array(
            'model'=>$model,
            'model'=>$model2,
            'dataProvider'=>$dataProvider,
            'st'=>$st,
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
        ]);    
    }
    public function actionCheck($id)
    {
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM achievements a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);
        
        $dataProvider1 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM grants a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);
        
        $dataProvider2 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM patents a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.istatus = 1',
            'params' => [':idFacultet' => $id],
        ]);

        $dataProvider3 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM articles a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);

        $dataProvider4 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM socialParticipation a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);

       $dataProvider5 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM achievementsKTD a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);
       
       $dataProvider6 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM publicPerformance a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);

       $dataProvider7 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM ktdParticipation a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);
        
        $dataProvider8 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM achievementsSport a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);
        
        $dataProvider9 = new SqlDataProvider([
            'sql' => 'SELECT a.*, concat(s.firstName, " ", s.secondName) as fio FROM sportParticipation a INNER JOIN students s on a.idStudent = s.idStudent WHERE s.idFacultet = :idFacultet and a.status = 1',
            'params' => [':idFacultet' => $id],
        ]);

        $model = Quotas::find()->where(['idFacultet'=>$id])->one();

        return $this->render('check', [
           'model'=>$model,
            'dataProvider' => $dataProvider,
            'dataProvider1' => $dataProvider1,
            'dataProvider2' => $dataProvider2,
            'dataProvider3' => $dataProvider3,
            'dataProvider4' => $dataProvider4,
            'dataProvider5' => $dataProvider5,
            'dataProvider6' => $dataProvider6,
            'dataProvider7' => $dataProvider7,
            'dataProvider8' => $dataProvider8,
            'dataProvider9' => $dataProvider9,
        ]);
    }

    public function actionViewStudy($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionFix($idFacultet)
    {
        $count = Quotas::find()->where(['idFacultet'=>$idFacultet])->all();
        // $count = Quotas::find()->where(['idFacultet'=>1])->all();
        foreach ($count as $row) {
            $cnt = $row['cnt'];
        }
        $activity = Value::getActivity($idFacultet);
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

        //Учебная
        $array_study = Fix::all($idFacultet, 1, $studyCnt);
        $student_study = Fix::updateRating($array_study, 1);
        //Учебные достижения
        for ($i = 0; $i < count($array_study); $i++){
             $array_study[$i];
            $ret = AchievementsStudy::getAll($array_study[$i]);
            for ($j = 0; $j < count($ret); $j++){
              $update_study_a = "update achievements a set a.status = 3 where a.idStudent = ".$array_study[$i]."  and a.status = 0 and  a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_study_a)->execute();
            }
        }

        // Научная
        $array_science = Fix::all($idFacultet, 2, $scienceCnt);
        $student_science = Fix::updateRating($array_science, 2);
        $date = strtotime('-2 years');
        //Гранты
        for ($i = 0; $i < count($array_science); $i++){
            $grants = Grants::find()
                            ->where(['idStudent'=>$array_science[$i],'status'=>0])
                            ->andWhere(['between', 'dateBegin',  date('Y-m-d', $date), date('Y-m-d')])
                            ->all();
                            // echo count($grants);
            for ($j = 0; $j < count($grants); $j++){
               $update_science_g = "update grants a set a.status = 3 where a.idStudent = ".$array_science[$i]."  and a.status = 0 and  a.dateBegin BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
                $students = Yii::$app->db->createCommand($update_science_g)->execute();
            }
        }
        //Патенты
        for ($i = 0; $i < count($array_science); $i++){
            $patents = Patents::find()
                            ->where(['idStudent'=>$array_science[$i],'istatus'=>0])
                            ->andWhere(['between', 'dateApp',  date('Y-m-d', $date), date('Y-m-d')])
                            ->all();
                            // echo count($patents);
            for ($j = 0; $j < count($patents); $j++){
                 $update_science_p = "update patents a set a.istatus = 3 where a.idStudent = ".$array_science[$i]."  and a.istatus = 0 and  a.dateApp BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
                $students = Yii::$app->db->createCommand($update_science_p)->execute();
            }
        }
        //Публикации
        for ($i = 0; $i < count($array_science); $i++){
            $articles = Articles::getType($array_science[$i]);
            for ($j = 0; $j < count($articles); $j++){
                $update_science_a = "update articles a set a.status = 3 where a.idStudent = ".$array_science[$i]."  and a.status = 0 and  a.year between (year(curdate())-2) and (year(curdate()))";
                $students = Yii::$app->db->createCommand($update_science_a)->execute();
            }
        }

        for ($i = 0; $i < count($array_science); $i++){
             $array_science[$i];
            $ret = AchievementsStudy::getAll($array_science[$i]);
            for ($j = 0; $j < count($ret); $j++){
              $update_science_a = "update achievements a set a.status = 3 where a.idStudent = ".$array_science[$i]."  and a.status = 0 and  a.dateEvent BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_science_a)->execute();
            }
        }

        //Общественная
        $array_social = Fix::all($idFacultet, 3, $socialCnt);
        $student_social = Fix::updateRating($array_social, 3);
        for ($i = 0; $i < count($array_social); $i++){
              $sql = 'SELECT *  FROM socialParticipation  WHERE idStudent = :id and status = 0';
              $ret = Yii::$app->db->createCommand($sql)
                            ->bindValue(':id', $array_social[$i])
                            ->queryAll();            
            for ($j = 0; $j < count($ret); $j++){
              $update_social_a = "update socialParticipation a set a.status = 3 where a.idStudent = ".$array_social[$i]."  and a.status = 0 and  a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_social_a)->execute();
            }
        }

        //Творческая
        $array_culture = Fix::all($idFacultet, 4, $cultureCnt);
        $student_culture = Fix::updateRating($array_culture, 4);
        //Достижения
        for ($i = 0; $i < count($array_culture); $i++){
            $ret = AchievementsCulture::getAll($array_culture[$i]);        
            for ($j = 0; $j < count($ret); $j++){
              $update_culture_a = "update achievementsKTD a set a.status = 3 where a.idStudent = ".$array_culture[$i]."  and a.status = 0 and  a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_culture_a)->execute();
            }
        }
        //Публичные представления
        for ($i = 0; $i < count($array_culture); $i++){
            $ret = PerformanceCulture::getAll($array_culture[$i]);  
            for ($j = 0; $j < count($ret); $j++){
               $update_culture_p = "update publicPerformance a set a.status = 3 where a.idStudent = ".$array_culture[$i]."  and a.status = 0 and  a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_culture_p)->execute();
            }
        }
        //Участия
        for ($i = 0; $i < count($array_culture); $i++){
            $ret = ParticipationCulture::getAll($array_culture[$i]);  
            for ($j = 0; $j < count($ret); $j++){
               $update_culture_pp = "update ktdParticipation a set a.status = 3 where a.idStudent = ".$array_culture[$i]."  and a.status = 0 and  a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_culture_pp)->execute();
            }
        }

        //Спортивная
        $array_sport = Fix::all($idFacultet, 5, $sportCnt);
        $student_sport = Fix::updateRating($array_sport, 5);
        //Спортивный достижения
        for ($i = 0; $i < count($array_sport); $i++){
          $sql = 'SELECT asp.*, se.name as status, tc.name as typeContest, td.name as typeDocument FROM achievementsSport asp, statusEvent se, eventType tc, typeDocument td WHERE idStudent = :id and asp.status = 0 and asp.idStatus = se.id and asp.idTypeContest = tc.id and asp.idDocumentTYpe = td.id AND asp.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', $array_sport[$i])
                        ->queryAll();
        for ($j = 0; $j < count($ret); $j++){
              $update_sport_a = "update achievementsSport a set a.status = 3 where a.idStudent = ".$array_sport[$i]."  and a.status = 0 and  a.year BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_sport_a)->execute();
            }
        }
        //Участие
        for ($i = 0; $i < count($array_sport); $i++){
            $sql = 'SELECT * FROM `sportParticipation` WHERE idStudent = :id and sportParticipation.status = 0 AND sportParticipation.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )AND (curdate( ))';
          $ret = Yii::$app->db->createCommand($sql)
                        ->bindValue(':id', $array_sport[$i])
                        ->queryAll();
        for ($j = 0; $j < count($ret); $j++){
            $update_sport_p = "update sportParticipation a set a.status = 3 where a.idStudent = ".$array_sport[$i]."  and a.status = 0 and  a.date BETWEEN DATE_SUB( NOW( ) , INTERVAL 2 YEAR )  and (curdate())";
            $students = Yii::$app->db->createCommand($update_sport_p)->execute();
            }
        }
        $q_update = "UPDATE quotas set cnt=0 where idFacultet = ".$idFacultet;
        $q = Yii::$app->db->createCommand($q_update)->execute();

        $from = "UPDATE date set `from`=null where `idFacultet`=".$idFacultet;
        $to = "UPDATE date set`to`=null where `idFacultet`=".$idFacultet;
        $q_from=Yii::$app->db->createCommand($from)->execute();
        $q_to=Yii::$app->db->createCommand($to)->execute();

        // $del = "DELETE from studentRating where idFacultet = ".$idFacultet;
        // $q_del=Yii::$app->db->createCommand($del)->execute();

        Yii::$app->session->setFlash('success', "Достижения зафиксированы, квоты сброшены, даты не установлены");

        return $this->redirect(urldecode('index.php?r=quotas/index&id='.$idFacultet));

    }
}
