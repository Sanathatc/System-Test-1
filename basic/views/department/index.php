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
?>

<div class="container-fluid" id="vue">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Departments</h4>
      <ul class="nav nav-pills nav-stacked">
        <?php 
          foreach($departments as $department){
            echo'<li><a href="#section2" @click="opendept('.$department['id'].')">'.$department['department_name'].'</a></li>';
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
	      <h4>Add Department (Active form)</h4>
	      <hr>
	     <?php $form = ActiveForm::begin(['action' => 'index.php?r=department/create']); ?>
	     	<div class="col-sm-12">
	          <div class="form-group">
	            <label for="email">Deparment Name</label>
	           <?php echo Html::activeTextInput($model, 'department_name', ['class'=>'form-control col-md-12 invoiceset',
                                                                 'placeholder'=>"Enter Department",'onkeyup'=>''
                                                          ]);?>
	          </div>
      		</div>

      		<div class="col-sm-4">
	          <div class="form-group">
	            <label for="email">Commission Percentage</label>
	           <?php echo Html::activeTextInput($model, 'comission_percentage', ['class'=>'form-control col-md-12 invoiceset',
                                                                 'placeholder'=>"Enter Commission Percentage",'onkeyup'=>''
                                                          ]);?>
	          </div>
      		</div>

      		<div class="col-sm-4">
	          <div class="form-group">
	            <label for="email">Allevence Payable</label>
	           <?php echo Html::activeTextInput($model, 'allevence_payable', ['class'=>'form-control col-md-12 invoiceset',
                                                                 'placeholder'=>"Enter Allevence Payable",'onkeyup'=>''
                                                          ]);?>
	          </div>
      		</div>

      		<div class="col-sm-4">
	          <div class="form-group">
	            <label for="email">Last Month Deduction</label>
	           <?php echo Html::activeTextInput($model, 'last_month_deduction', ['class'=>'form-control col-md-12 invoiceset',
                                                                 'placeholder'=>"Enter Last Month Deduction",'onkeyup'=>''
                                                          ]);?>
	          </div>
      		</div>

<div class="col-sm-12"><div class="pull-right">
<br>
      		<?= Html::submitButton('Save', ['name' => 'Print','class'=>'btn btn-block btn-danger', 'onclick'=>"return validate()"]); ?></div>
</div>
	     <?php ActiveForm::end(); ?>
	     
	     
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