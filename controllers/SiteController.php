<?php

namespace app\controllers;

use app\models\Articles;
use app\models\Gallery;
use app\models\Guestbook;
use app\models\Pages;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    const PAGINATION = 5;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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

    public function actionIndex()
    {
        $data = Pages::find()->where(['name' => 'index'])->one();

        return $this->render('index', compact('data'));

    }

    public function actionCompany()
    {
        $data = Pages::find()->where(['name' => 'company'])->one();

        return $this->render('company', compact('data'));
    }

    public function actionGuestbook()
    {
        $data = Pages::find()->where(['name' => 'guestbook'])->one();
        $model = new Guestbook();
        $query = Guestbook::find()->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => self::PAGINATION, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()){
            return $this->refresh();
        } else {
            return $this->render('guestbook', compact('data','model','pages','posts'));
        }
    }

    public function actionArticles()
    {
        if ($id = \Yii::$app->request->get('id')) {
            $post = Articles::findOne($id);

            if(empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет...');

            $data = Pages::find()->where(['id' => $post->page])->one();
            $lastArticles = Articles::find()->where(['page' => $data->id])->Limit(5)->orderBy('id DESC')->all();
            $post->updateCounters(['count' => 1]);
            return $this->render('post', compact('post', 'lastArticles', 'data'));
        } else {
            $data = Pages::find()->where(['name' => 'articles'])->one();
            $query = Articles::find()->where(['page' => $data->id])->orderBy('id DESC');
            $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => self::PAGINATION, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('articles', compact('data', 'pages','posts'));
        }

    }

    public function actionSale()
    {
        if ($id = \Yii::$app->request->get('id')) {
            $post = Articles::findOne($id);

            if(empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет...');

            $data = Pages::find()->where(['id' => $post->page])->one();
            $lastArticles = Articles::find()->where(['page' => $data->id])->Limit(5)->orderBy('id DESC')->all();
            $post->updateCounters(['count' => 1]);
            return $this->render('post', compact('post', 'lastArticles', 'data'));
        } else {
            $data = Pages::find()->where(['name' => 'sale'])->one();
            $query = Articles::find()->where(['page' => $data->id])->orderBy('id DESC');
            $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => self::PAGINATION, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('articles', compact('data', 'pages','posts'));
        }

    }

    public function actionGallery()
    {
        $data = Pages::find()->where(['name' => 'gallery'])->one();
        $query = Gallery::find()->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => 8, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('gallery', compact('data', 'pages','posts'));
    }



    public function actionContacts()
    {
        $data = Pages::find()->where(['name' => 'contacts'])->one();


        return $this->render('contacts', compact('data'));
    }





}

