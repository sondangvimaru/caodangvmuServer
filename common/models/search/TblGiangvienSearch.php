<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblGiangvien;

/**
 * TblGiangvienSearch represents the model behind the search form of `common\models\TblGiangvien`.
 */
class TblGiangvienSearch extends TblGiangvien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_giangvien'], 'integer'],
            [['tengiangvien', 'manganh'], 'safe'],
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
        $query = TblGiangvien::find();

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
            'id_giangvien' => $this->id_giangvien,
        ]);

        $query->andFilterWhere(['like', 'tengiangvien', $this->tengiangvien])
            ->andFilterWhere(['like', 'manganh', $this->manganh]);

        return $dataProvider;
    }
}
