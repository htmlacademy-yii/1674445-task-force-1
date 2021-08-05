<?php
namespace frontend\controllers;
use frontend\models\Categories;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $category = new Categories();
        $category->cat_id = 3;
        $category->cat_publishdate = date('Y-m-d H:i:s');
        $category->cat_name = 'Design';
        $category->save();
        return $this->render('index');
    }
}
