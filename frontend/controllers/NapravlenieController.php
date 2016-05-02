<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Napravlenie;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Sotrudnik;
use yii\helpers\Json;

/**
 * NapravlenieController implements the CRUD actions for Napravlenie model.
 */
class NapravlenieController extends Controller
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
     * Lists all Napravlenie models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Napravlenie::find()
                ->where(['idFacultet'=>$id])
        ]);

        if(Yii::$app->request->post('hasEditable')){
            $naprId = Yii::$app->request->post('editableKey');
            $napravlenie = Napravlenie::findOne($naprId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Napravlenie']);
            $post['Napravlenie'] = $posted;
            if ($napravlenie->load($post)){
                $napravlenie->save();    
                // print_r($sgroup->getErrors());
                $output = '';
                $out = Json::encode(['output' => $output]);
            }
            echo $out;
            return;
        }
        //renderAjax
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Napravlenie model.
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
     * Creates a new Napravlenie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Napravlenie();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->idFacultet]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Napravlenie model.
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
     * Deletes an existing Napravlenie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $ids = Yii::$app->user->identity->id;
        $sotrudnik = Sotrudnik::findOne($ids);
        $idFacultet = $sotrudnik->idFacultet0->id;

        $this->findModel($id)->delete();
        return $this->redirect(['index', 'id' => $idFacultet]);
    }

    /**
     * Finds the Napravlenie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Napravlenie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Napravlenie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLists($id)
    {
        $countNapravlenie = Napravlenie::find()
            ->where(['idFacultet'=>$id])
            ->count();

        $napravlenie = Napravlenie::find()
            ->where(['idFacultet'=>$id])
            ->all();

        if($countNapravlenie > 0)
        {
            foreach ($napravlenie as $row){
                echo "<option value='".$row->id."'>".$row->shifr." ".$row->name."</option>";
            }
        }
        else {
            echo "<option>-</option>";
        }
    }
}
