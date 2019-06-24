<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use app\models\Salary;
use app\models\Employee;
use app\models\Department;



/**
 * WarehouseController implements the CRUD actions for Warehouse model.
 */
class SalarytransactionController extends Controller
{
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['create','view','index','update','fetchtransaction','generatesalary'],
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
        // print_r(
        $department = Department::find()
                          ->asArray()
                          ->orderBy(['id'=>SORT_DESC])
                          ->all();
        return $this->render('index',['departments'=>$department]);
    }

    public function basicsalary(){
        try {
            $department = Employee::find()
                              ->asArray()->where(['user_id'=>2])->with('tblDepartment')->with('tblUsertype')
                              ->One();
                              
            $data['basic_salary']=$department['tblUsertype'][0]['basic_salary'];
            $data['commission']=$department['tblDepartment'][0]['comission_percentage'];
            $data['allevence']=$department['tblDepartment'][0]['allevence_payable'];
            $data['deduction']=$department['tblDepartment'][0]['last_month_deduction'];
            $basic = $data['basic_salary'];
            $basicPercentage = ($data['basic_salary']*$data['commission'])/100;
            $data['salary_payable'] = $data['basic_salary']+$basicPercentage+$data['allevence']-$data['deduction'];
            $taxP = Employee::getTaxtosalary($data['salary_payable']);
            $taxValue = $taxP[0]['tax_percentage'];
            $data['tax_value'] = ($data['salary_payable']*$taxValue)/100;
        }catch(\Exception $e) {
            $data['basic_salary']=0;
            $data['commission']=0;
            $data['allevence']=0;
            $data['deduction']=0;
            $basic = 0;
            $basicPercentage = 0;
            $data['salary_payable'] =0;
            $taxP = 0;
            $taxValue = 0;
            $data['tax_value'] = 0;
        }
        //$tax_value = $data['salary_payable'] * Percentage of Tax percentage Value 
        return $data;
    }



    public function actionGeneratesalary()
    {
            $sucess=0;
        if (Yii::$app->request->isAjax) {
            $sucess=1;
            $model = Employee::find()->all();
            $userIds=[];
            $data = Yii::$app->request->isAjax;
            foreach($model as $userValue){
               $checkRec = Salary::find()->where(['user_id' =>  $userValue['user_id']])->where(['month' =>  $data])->one();
               $basicRec = $this->basicsalary($userValue['user_id']);
               if($checkRec){
                    $checkRec->salary_amount=$basicRec['salary_payable'];
                    $checkRec->save();
               }else{
                    $newRec = new Salary();
                    $newRec->user_id = $userValue['user_id'];
                    $newRec->salary_amount=$basicRec['salary_payable'];;
                    $newRec->month=1;
                    $newRec->basic_salary=$basicRec['salary_payable'];;
                    $newRec->tax_value=$basicRec['tax_value'];;
                    $newRec->save();
               }
            }

        }
        return $sucess;
    }
    public function actionFetchtransaction($id)
    {
       $salaryTransaction = Salary::find()
                          ->asArray()
                          ->orderBy(['user_id'=>SORT_DESC])
                          ->all();
        return json_encode($salaryTransaction);
    }

}
