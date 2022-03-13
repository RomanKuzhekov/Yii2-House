<?php

namespace app\controllers;

use app\models\Articles;
use app\models\Gallery;
use app\models\Guestbook;
use app\models\LoginForm;
use app\models\Pages;
use app\models\Site;
use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    const PAGINATION = 4;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $data = $this->preparePage('index');

        return $this->render('index', compact('data'));
    }

    public function actionCompany()
    {
        $data = $this->preparePage('company');

        return $this->render('company', compact('data'));
    }

    public function actionArticles()
    {
        if ($id = \Yii::$app->request->get('id')) {
            $post = Articles::findOne($id);
            $data = $this->preparePost($post);
            $lastArticles = $this->lastArticles($data->id);

            return $this->render('post', compact('post', 'lastArticles', 'data'));
        } else {
            $data = $this->preparePage('articles');

            $query = Articles::find()->where(['page' => $data->id])->orderBy('id DESC');
            $res = $this->preparePosts($query);

            return $this->render('articles', [
                'data' => $data,
                'pages' => $res['pages'],
                'posts' => $res['posts'],
            ]);
        }
    }

    public function actionSale()
    {
        if ($id = \Yii::$app->request->get('id')) {
            $post = Articles::findOne($id);
            $data = $this->preparePost($post);
            $lastArticles = $this->lastArticles($data->id);

            return $this->render('post', compact('post', 'lastArticles', 'data'));
        } else {
            $data = $this->preparePage('sale');
            $query = Articles::find()->where(['page' => $data->id])->orderBy('id DESC');
            $res = $this->preparePosts($query);

            return $this->render('articles', [
                'data' => $data,
                'pages' => $res['pages'],
                'posts' => $res['posts'],
            ]);
        }
    }

    public function actionGallery()
    {
        $data = $this->preparePage('gallery');
        $query = Gallery::find()->orderBy('id DESC');
        $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => 8, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('gallery', compact('data', 'pages','posts'));
    }

    public function actionGuestbook()
    {
        $data = $this->preparePage('guestbook');
        $model = new Guestbook();
        $query = Guestbook::find()->orderBy('id DESC');
        $res = $this->preparePosts($query);

        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()){
            return $this->refresh();
        } else {
            return $this->render('guestbook', [
                'data' => $data,
                'model' => $model,
                'pages' => $res['pages'],
                'posts' => $res['posts'],
            ]);
        }
    }

    public function actionContacts()
    {
        $data = $this->preparePage('contacts');
        $site = Site::find()->where(['id' => 1])->one();
        return $this->render('contacts', compact('data', 'site'));
    }

    private function preparePage($page)
    {
        $data = Pages::find()->where(['name' => $page])->one();
        return $data;
    }

    private function preparePosts($query)
    {
        $pages = new \yii\data\Pagination(['totalCount'=>$query->count(), 'pageSize' => self::PAGINATION, 'pageSizeParam'=>false, 'forcePageParam'=>false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $res = [
            'pages' => $pages,
            'posts' => $posts,
        ];
        return $res;
    }

    private function preparePost($post)
    {
        /** @var Articles $post */
        if(empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет!');

        $data = Pages::find()->where(['id' => $post->page])->one();
        $post->updateCounters(['count' => 1]);
        return $data;
    }

    private function lastArticles($id)
    {
        $data = Articles::find()->where(['page' => $id])->Limit(5)->orderBy('id DESC')->all();
        return $data;
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->response->redirect(['admin/site/']);
        }

        Yii::$app->layout = false;
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}