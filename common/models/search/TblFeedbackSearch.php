<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPhanlhp\TblFeedback;

/**
 * TblFeedbackSearch represents the model behind the search form of `common\models\TblPhanlhp\TblFeedback`.
 */
class TblFeedbackSearch extends TblFeedback
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'msv', 'stt'], 'integer'],
            [['content', 'type', 'time'], 'safe'],
            [['from_user'], 'boolean'],
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
        $query = TblFeedback::find();

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
            'from_user' => $this->from_user,
            'stt' => $this->stt,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
