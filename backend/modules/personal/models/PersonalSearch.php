<?php

namespace backend\modules\personal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\personal\models\Personal;

/**
 * PersonalSearch represents the model behind the search form about `backend\modules\personal\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'department_id'], 'integer'],
            [['firstname', 'lastname', 'address', 'tel', 'color'], 'safe'],
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
        $query = Personal::find();

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
            'user_id' => $this->user_id,
            'department_id' => $this->department_id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
