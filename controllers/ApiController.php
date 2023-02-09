<?php

namespace app\controllers;

use app\models\Images;

class ApiController extends \yii\web\Controller
{
    public function actionFind($id)
    {
        if ($id){
            $model = Images::find()->where(['id'=>$id])->one();
            if ($model){
                return json_encode(array(
                    'id'=>$id,
                    'path'=>$model->name
                ));
            }else{
                return json_encode(array(
                    'error'=>'There is no record with this ID'
                ));
            }
        }else{
            return json_encode(array(
                'error'=>'id not specified'
            ));
        }
    }

    public function actionGetPage($page)
    {
        if ($page){
            $res = Images::find()->limit(10)->offset(($page*10)-10)->all();
            $resp = array(
                'page'=>$page,
                'list'=>[]
            );
            foreach ($res as $item){
                $resp['list'][] = ['id' => $item->id, 'path' => $item->name];
            }
            return json_encode($resp);
        }else{
            return json_encode(array(
                'error'=>'page number not specified'
            ));
        }
    }

    public function actionTotalCount()
    {
        return json_encode(array(
            'total'=>Images::find()->count()
        ));
    }

}
