<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblThongbao;

/**
 * TblThongbaoSearch represents the model behind the search form of `common\models\TblThongbao`.
 */
class TblThongbaoSearch extends TblThongbao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'msv'], 'integer'],
            [['tieude', 'noidung'], 'safe'],
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
        $query = TblThongbao::find();

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
            'msv' => $this->msv,
        ]);

        $query->andFilterWhere(['like', 'tieude', $this->tieude])
            ->andFilterWhere(['like', 'noidung', $this->noidung]);

        return $dataProvider;
    }
}
