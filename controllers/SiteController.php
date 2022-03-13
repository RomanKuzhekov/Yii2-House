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

    private function preparePage($page)
    {
        $data = Pages::find()->where(['name' => $page])->one();
        return $data;
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
