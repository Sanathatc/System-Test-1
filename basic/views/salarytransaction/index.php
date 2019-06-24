<?php
$this->title = 'Salary';
?>

<div class="container-fluid" id="vue">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Select Department</h4>
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
<hr>
      <h4>Using Vue.Js, ajax, get, post method, create/update</h4>

    <div class="col-sm-9" v-if="department">
        <div class="row">
      <h4><small>{{dept_name}}</small></h4>
      
      <div class="col-sm-3">
          <div class="form-group">
            <label for="email">Enter secret key</label>
            <input type="password" class="form-control" v-model="password">
          </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group">
            <label for="email">Select Month</label>
            <select class="form-control" v-model="month"><option v-for="(month, index) in selectMonth" v-bind:value="month.id">{{month.name}}</option></select>
         
          </div>

      </div>
       <div class="col-sm-4" style="
    padding-top: 25px;">
          <div class="form-group"> <div class="pull-right">  <button type="submit" class="btn btn-danger" @click="generatesalary" style="padding-right:2px;">Proceed Salary</button><button type="submit" class="btn btn-success" @click="fetchLastransactions">Last Payment</button>
          </div>
          </div>
      </div>

      <br><br>
      </div>
      
       <template v-if="Object.keys(alltransaction).length > 0">
       <h4><small>Last Transactions</small></h4>
      
      <!-- 
    
      <hr> -->
      <table class="table"><tr><td>Basic Salary</td><td>Salary Amount</td><td>Tax Value</td></tr>
        <tr v-for="(salary, index) in alltransaction">
        <td>{{salary.basic_salary}}</td>
        <td>{{salary.salary_amount}}</td>
         <td>{{salary.tax_value}}</td>
    </tr></table>
</template>
    </div>
  </div>
</div>


<script type="text/javascript" src="vuejs/vue-select.js"></script>
<script type="text/javascript" src="vuejs/vue.dev.js"></script>
<script type="text/javascript" src="vuejs/vuetify/vuetify.js"></script>
<script type="text/javascript" src="vuejs/alertify.js/alertify.js"></script>
<script type="text/javascript" src="vuejs/vue-components/checkbox-multiselect.js"></script>
<script type="text/javascript" src="vuejs/test.js"></script>