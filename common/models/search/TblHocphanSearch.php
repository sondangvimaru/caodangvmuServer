<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblHocphan;

/**
 * TblHocphanSearch represents the model behind the search form of `common\models\TblHocphan`.
 */
class TblHocphanSearch extends TblHocphan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahocphan', 'tenhocphan', 'manganh', 'mamontienquyet'], 'safe'],
            [['sotinchi','ky'], 'integer'],
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
        $query = TblHocphan::find();

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
            'sotinchi' => $this->sotinchi,
        ]);

        $query->andFilterWhere(['like', 'mahocphan', $this->mahocphan])
            ->andFilterWhere(['like', 'tenhocphan', $this->tenhocphan])
            ->andFilterWhere(['like', 'manganh', $this->manganh])
            ->andFilterWhere(['like', 'mamontienquyet', $this->mamontienquyet])
            ->andFilterWhere(['like', 'ky', $this->ky]);

        return $dataProvider;
    }
}
