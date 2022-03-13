<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\Pages;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $data = $this->preparePage('index');
        return $this->render('index', compact('data'));
//
   //     return "data";

    }





    private function preparePage($page)
    {
        $data = Pages::find()->where(['name' => $page])->one();
        return $data;
    }




}
