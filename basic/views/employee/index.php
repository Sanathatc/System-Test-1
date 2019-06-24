<?php
$this->title = 'Department';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\BalancingMethod;
use app\models\Group;
use yii\jui\DatePicker;
use app\models\Ledger;
use app\models\SaleType;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\grid\GridView;
?>

<div class="container-fluid" id="vue">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Departments</h4>
      <ul class="nav nav-pills nav-stacked">
        <?php 
          foreach($employees as $employee){
            echo'<li><a href="#section2" @click="opendept('.$employee['user_id'].')">'.$employee['f_name'].'</a></li>';
          }
      ?>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
       <div class="row">
	      <h4><small>Add Employee</small></h4>
	      <hr>
	     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'f_name',
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'l_name',
            ],
          
            [
                'label' => 'Salary Amount',
                'format' => 'ntext',
                'attribute'=>'tblUseraccount',
                'value' => function($model) {
                  $salaryAmount=[];
                    foreach ($model->tblUseraccount as $group) {
                        $salaryAmount[] = 'Month'.$group->month.'-'.number_format($group->salary_amount,2);
                    }
                    return implode("\n", $salaryAmount);
                },
            ],
              [
                'label' => 'Basic Salary',
                'format' => 'ntext',
                'attribute'=>'tblUseraccount',
                'value' => function($model) {
                  $basicSalary=[];
                    foreach ($model->tblUseraccount as $group) {
                        $basicSalary[] = number_format($group->basic_salary,2);
                    }
                    return implode("\n", $basicSalary);
                },
            ],

            [
                'label' => 'Tax Value',
                'format' => 'ntext',
                'attribute'=>'tblUseraccount',
                'value' => function($model) {
                  $tax_value=[];
                    foreach ($model->tblUseraccount as $group) {
                        $tax_value[] = number_format($group->tax_value,2);
                    }
                    return implode("\n", $tax_value);
                },
            ],

            [
                'label' => 'Primary Email',
                'attribute' => 'email_id',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
	     
	     
      <br><br>
      </div>
     
    </div>
  </div>
</div>
<script type="text/javascript">
function validate(){
	return true;
} 
</script>