<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'],'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'User Name',
            'user_id' => 'User Id',
            'f_name' => 'First Name ',
            'l_name' => 'Last Name  ',
        ];
    }
    
    public function getTblDepartment()
    {
        return $this->hasMany(Department::className(), ['id' => 'dept_id']);
    }

    public function getTblUsertype()
    {
        return $this->hasMany(EmployeeType::className(), ['id' => 'user_type_id']);
    }

    public static function getTaxtosalary($salary)
    {
        return Taxcharges::find()
            ->where(['payable_salary'=>$salary])
            ->all();
    }

}
