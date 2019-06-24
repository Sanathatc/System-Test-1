<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_brand".
 *
 * @property integer $brand_id
 * @property string $brand_name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_name'], 'required'],
            [['department_name'], 'string'],
            [['comission_percentage', 'allevence_payable','allevence_payable','last_month_deduction'], 'number'],
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

    public function search($params)
    {
        $query = Department::find()->where(['company_id'=>Yii::$app->user->identity->tbl_company_company_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'catagory_id' => $this->catagory_id,
        ]);

        $query->andFilterWhere(['like', 'catagory_name', $this->catagory_name]);

        return $dataProvider;
    }
}
