<?php

namespace frontend\controllers;

use Yii;
use common\models\Sgroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Sotrudnik;

/**
 * SgroupController implements the CRUD actions for Sgroup model.
 */
class SgroupController extends Controller
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
     * Lists all Sgroup models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        // $sql = Yii::$app->db->createCommand('select distinct g.name as name, g.idNapravlenie as idNapravlenie, g.id as id  from sgroup g, napravlenie n where g.idNapravlenie=n.id and n.idFacultet = :id')
        //                     ->bindValue(':id', $id)
        //                     ->queryAll();
        // $dataProvider = new ActiveDataProvider([
        //     'query'=> $sql,
        //     ]);
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Sgroup::find(),
        // ]);

        $dataProvider = new ActiveDataProvider([
            'query' => Sgroup::find()
                    ->select('sgroup.id, sgroup.idNapravlenie, sgroup.name')
                    ->distinct()
                    ->from('sgroup, napravlenie')
                    ->where(['napravlenie.idFacultet'=>$id])
        ]);
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Sgroup::find(),
        // ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sgroup model.
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
     * Creates a new Sgroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sgroup();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sgroup model.
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
     * Deletes an existing Sgroup model.
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
     * Finds the Sgroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sgroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sgroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
