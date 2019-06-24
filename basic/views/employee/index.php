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

            'user_id',
            'f_name',
            'l_name', 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	     
	     
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