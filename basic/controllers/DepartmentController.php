<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use app\models\Department;
use app\models\DepartmentSearch;


/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class DepartmentController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['create','view','index','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     
                ],
            ],
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
        $model = new Department();
        return $this->render('index',['model'=>$model]);
    }

    public function actionCreate()
    {
        $model = new Department();
        $department = Department::find()
                          ->asArray()
                          ->orderBy(['id'=>SORT_DESC])
                          ->all();
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()))
        {
            $model->department_name=$_POST['Department']['department_name'];
            $model->comission_percentage=$_POST['Department']['comission_percentage'];
            $model->allevence_payable=$_POST['Department']['allevence_payable'];
            $model->last_month_deduction=$_POST['Department']['last_month_deduction'];
            $model->save();
            return $this->redirect(['create']);
        }
        return $this->render('index',['model'=>$model,'departments'=>$department]);
    }
    //      public function actionIndex()
    // {
    //     $searchModel = new CatagorySearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }
    //   GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],

    //         'catagory_id',
    //         'catagory_name',

    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]); 
    

}
