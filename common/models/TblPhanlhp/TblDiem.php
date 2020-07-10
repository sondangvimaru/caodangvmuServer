<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_diem".
 *
 * @property int $diem_id
 * @property float|null $diemX
 * @property float|null $diemY
 * @property float|null $diemZ
 * @property string|null $ghichu
 * @property string $mahocphan
 * @property int $msv
 *
 * @property TblHocphan $mahocphan0
 * @property TblSinhvien $msv0
 */
class TblDiem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_diem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diemX', 'diemY', 'diemZ'], 'number'],
            [['ghichu'], 'string'],
            [['mahocphan', 'msv'], 'required'],
            [['msv'], 'integer'],
            [['mahocphan'], 'string', 'max' => 40],
            [['mahocphan'], 'exist', 'skipOnError' => true, 'targetClass' => TblHocphan::className(), 'targetAttribute' => ['mahocphan' => 'mahocphan']],
            [['msv'], 'exist', 'skipOnError' => true, 'targetClass' => TblSinhvien::className(), 'targetAttribute' => ['msv' => 'msv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'diem_id' => 'Diem ID',
            'diemX' => 'Điểm X',
            'diemY' => 'Diem Y',
            'diemZ' => 'Diem Z',
            'ghichu' => 'Ghichu',
            'mahocphan' => 'Mahocphan',
            'msv' => 'Msv',
        ];
    }

    /**
     * Gets query for [[Mahocphan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahocphan0()
    {
        return $this->hasOne(TblHocphan::className(), ['mahocphan' => 'mahocphan']);
    }

    /**
     * Gets query for [[Msv0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMsv0()
    {
        return $this->hasOne(TblSinhvien::className(), ['msv' => 'msv']);
    }
}
