<?php

namespace app\controllers;

use app\models\Migr;
use app\models\SourceMessage;
use app\models\TranslateTables;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $migr = new TranslateTables();
        try {
            $migr->down();
        }catch (Exception $exception){}

        $migr->up();

        $arr = require_once Yii::$app->basePath . "/message/en-EN/app.php";
        foreach ($arr as $name=>$value){
            $model = new SourceMessage();
            $model->category = 'app';
            $model->message = $name;
            $model->save();
        }
        return $this->render('index');
    }
}
