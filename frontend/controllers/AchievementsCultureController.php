<?php

namespace frontend\controllers;

use Yii;
use common\models\AchievementsCulture;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\models\Upload;

/**
 * AchievementsCultureController implements the CRUD actions for AchievementsCulture model.
 */
class AchievementsCultureController extends Controller
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
     * Lists all AchievementsCulture models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AchievementsCulture::find()
                ->where(['idStudent'=>$id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single AchievementsCulture model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new AchievementsCulture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AchievementsCulture();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Yii::$app->user->identity->id;
            $path = Upload::upload($model, $user);  
            return $this->redirect(['index', 'id' => $user]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AchievementsCulture model.
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
     * Deletes an existing AchievementsCulture model.
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
     * Finds the AchievementsCulture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AchievementsCulture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AchievementsCulture::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
