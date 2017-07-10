<?php
namespace app\controllers;

use yii\filters\AccessControl;
use \yii\web\Controller;
use app\models\user\LoginForm;
use Yii;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', /*'logout'*/],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['guest'],
                    ],
                    /*[
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['user', 'manager', 'admin'],
                    ],*/
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('homepage');
    }

    public function actionDocs()
    {
        return $this->render('docindex.md');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) and $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /*
    public function beforeAction($action)
    {
        $parentAllowed = parent::beforeAction($action);
        $meAllowed = !Yii::$app->user->isGuest;
        return $parentAllowed and $meAllowed;

    }
    */
}