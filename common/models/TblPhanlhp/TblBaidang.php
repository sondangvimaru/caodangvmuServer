<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_baidang".
 *
 * @property int $baidang_id
 * @property string $tieude
 * @property string $anh_dai_dien
 * @property string $noidung
 * @property string $thoigiandang
 * @property int $danhmuc_id
 *
 * @property TblTendanhmuc $danhmuc
 */
class TblBaidang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_baidang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tieude', 'anh_dai_dien', 'noidung', 'thoigiandang', 'danhmuc_id'], 'required'],
            [['tieude', 'noidung'], 'string'],
            [['thoigiandang'], 'safe'],
            [['danhmuc_id'], 'integer'],
            [['anh_dai_dien'], 'string', 'max' => 100],
            [['danhmuc_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblTendanhmuc::className(), 'targetAttribute' => ['danhmuc_id' => 'danhmuc_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'baidang_id' => 'Baidang ID',
            'tieude' => 'Tieude',
            'anh_dai_dien' => 'Anh Dai Dien',
            'noidung' => 'Noidung',
            'thoigiandang' => 'Thoigiandang',
            'danhmuc_id' => 'Danhmuc ID',
        ];
    }

    /**
     * Gets query for [[Danhmuc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDanhmuc()
    {
        return $this->hasOne(TblTendanhmuc::className(), ['danhmuc_id' => 'danhmuc_id']);
    }
}
