<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPhanlhp;

/**
 * TblPhanlhpSearch represents the model behind the search form of `common\models\TblPhanlhp`.
 */
class TblPhanlhpSearch extends TblPhanlhp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lophp_id', 'phanlop_id'], 'integer'],
            [['manganh'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TblPhanlhp::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'lophp_id' => $this->lophp_id,
            'phanlop_id' => $this->phanlop_id,
        ]);

        $query->andFilterWhere(['like', 'manganh', $this->manganh]);

        return $dataProvider;
    }
}
