<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblLichthi;

/**
 * TblLichthiSearch represents the model behind the search form of `common\models\TblLichthi`.
 */
class TblLichthiSearch extends TblLichthi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lichthi_id', 'lophp_id', 'sbd'], 'integer'],
            [['thoigian', 'diadiem', 'hinhthuc'], 'safe'],
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
        $query = TblLichthi::find();

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
            'lichthi_id' => $this->lichthi_id,
            'lophp_id' => $this->lophp_id,
            'thoigian' => $this->thoigian,
            'sbd' => $this->sbd,
        ]);

        $query->andFilterWhere(['like', 'diadiem', $this->diadiem])
            ->andFilterWhere(['like', 'hinhthuc', $this->hinhthuc]);

        return $dataProvider;
    }
}
