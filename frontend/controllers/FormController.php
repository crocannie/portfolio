<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\user\models\User;

use common\models\Grants;
use common\models\Students;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Universities;
use frontend\controller\UniversitiesController;

class FormController extends Controller
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

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionUd($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Grants::find()
                ->where(['idStudent'=>$id])
        ]);

        return $this->render('ud', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);        
    }

    public function actionNid($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Grants::find()
                ->where(['idStudent'=>$id])
        ]);

        return $this->render('nid', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);        
    }
/*

    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Grants::find()
                ->where(['idStudent'=>$id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
*/
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}