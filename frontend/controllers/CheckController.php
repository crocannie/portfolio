<?php 
namespace frontend\controllers;
 
// use app\modules\user\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use common\models\AchievementsStudy;
use yii\data\ActiveDataProvider;

use common\models\Students;
use common\models\User;

 
class CheckController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
 
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AchievementsStudy::find()
                ->where(['idStudent'=>$id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
?>