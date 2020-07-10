<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblSinhvien;
use Exception;

/**
 * TblSinhvienSearch represents the model behind the search form of `common\models\TblSinhvien`.
 */
class TblSinhvienSearch extends TblSinhvien
{
    /**
     * {@inheritdoc}
     */
    public  static  $arr=[];
    public function rules()
    {
        return [
            [['msv', 'id_dantoc'], 'integer'],
            [['ten', 'ngaysinh', 'diachi', 'manganh', 'malophanhchinh', 'sdt', 'trinhdohocvan', 'ngayketnapdoan', 'hotenbo', 'hotenme', 'nghenghiepbo', 'nghenghiepme', 'doituongthuocdienchinhsach', 'nghenghieplamtruockhivaohoc', 'noidangkythuongtru', 'nguyenvongvieclam', 'quequan', 'anh_dai_dien', 'ten_thuong_goi', 'noi_sinh', 'ngay_tham_gia_dcsvn', 'ngay_chinh_thuc_tg_dcsvn', 'ho_va_ten_vo_chong', 'nghe_nghiep_vo_chong'], 'safe'],
            [['gioitinh', 'tongiao'], 'boolean'],
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
        $query = TblSinhvien::find();

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


        try {
            if(count($params)>1 && !isset($params["sort"]))
            {
                TblSinhvienSearch::$arr=  $params["TblSinhvienSearch"];
            }
            if(count(TblSinhvienSearch::$arr)>0)
            {


                $msv=(TblSinhvienSearch::$arr["msv"]!=null&& TblSinhvienSearch::$arr["msv"]!=" ") ?TblSinhvienSearch::$arr["msv"]:"null";
                $name=(TblSinhvienSearch::$arr["ten"]!=null&&TblSinhvienSearch::$arr["ten"]!=" ")?TblSinhvienSearch::$arr["ten"]:"null";
                $ngaysinh=(TblSinhvienSearch::$arr["ngaysinh"]!=null&&TblSinhvienSearch::$arr["ngaysinh"]!=" ")?TblSinhvienSearch::$arr["ngaysinh"]:"null";
                $gioitinh=(TblSinhvienSearch::$arr["gioitinh"]!=null&&TblSinhvienSearch::$arr["gioitinh"]!=" ")?TblSinhvienSearch::$arr["gioitinh"]:"null";
                $diachi=(TblSinhvienSearch::$arr["diachi"]!=null&&TblSinhvienSearch::$arr["diachi"]!=" ")?TblSinhvienSearch::$arr["diachi"]:"null";
                $lhc=(TblSinhvienSearch::$arr["malophanhchinh"]!=null&&TblSinhvienSearch::$arr["malophanhchinh"]!=" ")?TblSinhvienSearch::$arr["malophanhchinh"]:"null";
                if($msv!="null" &&$msv!=" "|| $name!="null"&& $name!=" "|| $ngaysinh!="null"&&$ngaysinh!=" "|| $gioitinh!="null"&&$gioitinh!=" "|| $diachi!="null"&&$diachi!=" "|| $lhc!="null"&&$lhc!=" ")
                {
                    echo "<a   id='btnloc' href=\"http://localhost:8000/caodangvmu/backend/views/tbl-sinhvien/test_export_excel.php?msv=".$msv. "&name=".$name."&ngaysinh=".$ngaysinh."&gioitinh=".$gioitinh
                        ."&diachi=".$diachi."&lhc=".$lhc."\"></a>";
                }
                else{
                    echo "<a  id='btnloc' href=\"http://localhost:8000/caodangvmu/backend/views/tbl-sinhvien/test_export_excel.php\"></a>";
                }


            }
        }catch (Exception $e)
        {

        }
        // grid filtering conditions
        $query->andFilterWhere([
           
            'ngaysinh' => $this->ngaysinh,
            'gioitinh' => $this->gioitinh,
            'tongiao' => $this->tongiao,
            'ngayketnapdoan' => $this->ngayketnapdoan,
            'id_dantoc' => $this->id_dantoc,
            'ngay_tham_gia_dcsvn' => $this->ngay_tham_gia_dcsvn,
            'ngay_chinh_thuc_tg_dcsvn' => $this->ngay_chinh_thuc_tg_dcsvn,
        ]);
          
        $query
        ->andFilterWhere(['like', 'msv', $this->msv])
        ->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
          
            ->andFilterWhere(['like', 'malophanhchinh', $this->malophanhchinh])
            ->andFilterWhere(['like', 'sdt', $this->sdt])
            ->andFilterWhere(['like', 'trinhdohocvan', $this->trinhdohocvan])
            ->andFilterWhere(['like', 'manganh', $this->manganh])
            ->andFilterWhere(['like', 'hotenbo', $this->hotenbo])
            ->andFilterWhere(['like', 'hotenme', $this->hotenme])
            ->andFilterWhere(['like', 'nghenghiepbo', $this->nghenghiepbo])
            ->andFilterWhere(['like', 'nghenghiepme', $this->nghenghiepme])
            ->andFilterWhere(['like', 'doituongthuocdienchinhsach', $this->doituongthuocdienchinhsach])
            ->andFilterWhere(['like', 'nghenghieplamtruockhivaohoc', $this->nghenghieplamtruockhivaohoc])
            ->andFilterWhere(['like', 'noidangkythuongtru', $this->noidangkythuongtru])
            ->andFilterWhere(['like', 'nguyenvongvieclam', $this->nguyenvongvieclam])
            ->andFilterWhere(['like', 'quequan', $this->quequan])
            ->andFilterWhere(['like', 'anh_dai_dien', $this->anh_dai_dien])
            ->andFilterWhere(['like', 'ten_thuong_goi', $this->ten_thuong_goi])
            ->andFilterWhere(['like', 'noi_sinh', $this->noi_sinh])
            ->andFilterWhere(['like', 'ho_va_ten_vo_chong', $this->ho_va_ten_vo_chong])
            ->andFilterWhere(['like', 'nghe_nghiep_vo_chong', $this->nghe_nghiep_vo_chong]);

            
        return $dataProvider;
    }
}
