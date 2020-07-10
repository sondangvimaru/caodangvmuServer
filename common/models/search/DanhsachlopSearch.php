<?php


namespace common\models\search;

use common\models\TblSinhvien;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DanhsachlopSearch extends TblSinhvien{

    public function rules()
    {
        return [
            [['msv',], 'integer'],
            [['malophanhchinh', 'manganh', 'ten'], 'safe'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TblSinhvien::find();

        // add conditions that should always apply here
        echo '<pre>';
        print_r($params);
        echo'</pre>';

        return ;
    }
}
?>

