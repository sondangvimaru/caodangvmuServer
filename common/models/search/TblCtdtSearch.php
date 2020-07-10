<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPhanlhp\TblCtdt;

/**
 * TblCtdtSearch represents the model behind the search form of `common\models\TblPhanlhp\TblCtdt`.
 */
class TblCtdtSearch extends TblCtdt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sonam', 'khoa_id'], 'integer'],
            [['nganh'], 'safe'],
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
        $query = TblCtdt::find();

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
            'id' => $this->id,
            'sonam' => $this->sonam,
            'khoa_id' => $this->khoa_id,
        ]);

        $query->andFilterWhere(['like', 'nganh', $this->nganh]);

        return $dataProvider;
    }
}
