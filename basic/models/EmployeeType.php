<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 */
class EmployeeType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_name'], 'required'],
            [['user_type_name'],'unique'],
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
}
