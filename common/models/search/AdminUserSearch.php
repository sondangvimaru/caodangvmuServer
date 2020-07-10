<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AdminUser;

/**
 * AdminUserSearch represents the model behind the search form of `common\models\AdminUser`.
 */
class AdminUserSearch extends AdminUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'status_id', 'funtions_id'], 'integer'],
            [['username', 'password', 'ten', 'diachi', 'email', 'sdt'], 'safe'],
            [['gioitinh'], 'boolean'],
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
        $query = AdminUser::find();

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
            'admin_id' => $this->admin_id,
            'status_id' => $this->status_id,
            'funtions_id' => $this->funtions_id,
            'gioitinh' => $this->gioitinh,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
