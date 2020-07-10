<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblKhoa;

/**
 * TblKhoaSearch represents the model behind the search form of `common\models\TblKhoa`.
 */
class TblKhoaSearch extends TblKhoa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['makhoa', 'tenkhoa'], 'safe'],
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
        $query = TblKhoa::find();

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
        $query->andFilterWhere(['like', 'makhoa', $this->makhoa])
            ->andFilterWhere(['like', 'tenkhoa', $this->tenkhoa]);

        return $dataProvider;
    }
}
