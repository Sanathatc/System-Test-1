<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salary_amount'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salary_amount' => 'salary_amount',
        ];
    }
}
