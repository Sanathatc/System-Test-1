<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use app\models\Department;
use app\models\Employee;
use app\models\EmployeeSearch;

/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class EmployeeController extends Controller
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
       // $result = Employee::find_by_sql("CALL GetAllDepartments(?, ?, ?, ?, ?)", array(1, 2, 3, 4, 5));
        $model = new Employee();
        $searchModel = new EmployeeSearch();
        $employees = Employee::find()
                          ->asArray()
                          ->orderBy(['user_id'=>SORT_DESC])
                          ->all();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post()))
        {
            $model->department_name=$_POST['Department']['department_name'];
            $model->department_name=$_POST['Department']['comission_percentage'];
            $model->department_name=$_POST['Department']['allevence_payable'];
            $model->department_name=$_POST['Department']['last_month_deduction'];
            $model->save();
            return $this->redirect(['create']);
        }
        return $this->render('index',['model'=>$model,'employees'=>$employees,'searchModel'=>$searchModel,'dataProvider'=>$dataProvider]);
    }

}
