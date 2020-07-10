<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblDiem;

/**
 * TblDiemSearch represents the model behind the search form of `common\models\TblDiem`.
 */
class TblDiemSearch extends TblDiem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diem_id', 'msv'], 'integer'],
            [['diemX', 'diemY', 'diemZ'], 'number'],
            [['ghichu', 'mahocphan'], 'safe'],
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
        $query = TblDiem::find();

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
            'diem_id' => $this->diem_id,
            'diemX' => $this->diemX,
            'diemY' => $this->diemY,
            'diemZ' => $this->diemZ,
            'msv' => $this->msv,
        ]);

        $query->andFilterWhere(['like', 'ghichu', $this->ghichu])
            ->andFilterWhere(['like', 'mahocphan', $this->mahocphan]);

        return $dataProvider;
    }
}
