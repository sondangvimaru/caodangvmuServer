<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_tendanhmuc".
 *
 * @property int $danhmuc_id
 * @property string $tendanhmuc
 *
 * @property TblBaidang[] $tblBaidangs
 */
class TblTendanhmuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_tendanhmuc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tendanhmuc'], 'required'],
            [['tendanhmuc'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'danhmuc_id' => 'Danhmuc ID',
            'tendanhmuc' => 'Tendanhmuc',
        ];
    }

    /**
     * Gets query for [[TblBaidangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblBaidangs()
    {
        return $this->hasMany(TblBaidang::className(), ['danhmuc_id' => 'danhmuc_id']);
    }
}
