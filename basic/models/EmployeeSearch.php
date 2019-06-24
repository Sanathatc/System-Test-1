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
        $query = Employee::find()->innerJoinWith('tblUseraccount', true);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['f_name', 'l_name', 'email_id']]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->user_id,
            'f_name' => $this->f_name,
            'l_name' => $this->l_name,
            'email_id' => $this->email_id,
        ]);

        $query->andFilterWhere(['like', 'f_name', $this->f_name])
                ->andFilterWhere(['like', 'l_name', $this->l_name])
                ->andFilterWhere(['like', 'email_id', $this->email_id]);

        return $dataProvider;
    }
}
