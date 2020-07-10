<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblLophocphan;

/**
 * TblLophocphanSearch represents the model behind the search form of `common\models\TblLophocphan`.
 */
class TblLophocphanSearch extends TblLophocphan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lophp_id', 'nhom', 'dotdk_id'], 'integer'],
            [['mahocphan', 'thoigianbatdau', 'thoigianketthuc', 'giangvien', 'diadiem'], 'safe'],
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
        $query = TblLophocphan::find();

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
            'nhom' => $this->nhom,
            'thoigianbatdau' => $this->thoigianbatdau,
            'thoigianketthuc' => $this->thoigianketthuc,
          
            'dotdk_id' => $this->dotdk_id,
        ]);

        $query->andFilterWhere(['like', 'mahocphan', $this->mahocphan])
            ->andFilterWhere(['like', 'giangvien', $this->giangvien])
            ->andFilterWhere(['like', 'diadiem', $this->diadiem]);
           

        return $dataProvider;
    }
}
