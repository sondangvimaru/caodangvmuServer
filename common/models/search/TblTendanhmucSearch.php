<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblTendanhmuc;

/**
 * TblTendanhmucSearch represents the model behind the search form of `common\models\TblTendanhmuc`.
 */
class TblTendanhmucSearch extends TblTendanhmuc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['danhmuc_id'], 'integer'],
            [['tendanhmuc'], 'safe'],
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
        $query = TblTendanhmuc::find();

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
            'danhmuc_id' => $this->danhmuc_id,
        ]);

        $query->andFilterWhere(['like', 'tendanhmuc', $this->tendanhmuc]);

        return $dataProvider;
    }
}
