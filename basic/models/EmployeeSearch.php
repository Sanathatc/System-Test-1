<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * CatagorySearch represents the model behind the search form about `app\models\Catagory`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['email_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
      //  $query  = \Yii::$app->db->createCommand("CALL GetAllDepartments1") 
                      
                     // ->execute();

        $query = Employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'f_name' => $this->f_name,
            'l_name' => $this->l_name,
            'l_name' => $this->l_name,
        ]);

// exit;
        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
