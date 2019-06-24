<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 */
class Taxcharges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_payable_tax_charge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payable_salary'], 'required'],
            [['payable_salary'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_name' => 'department_name',
        ];
    }

}
