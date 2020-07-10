<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_media".
 *
 * @property int $media_id
 * @property string $url
 *
 * @property TblSinhvien[] $tblSinhviens
 * @property TblThongbao[] $tblThongbaos
 */
class TblMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['media_id', 'url'], 'required'],
            [['media_id'], 'integer'],
            [['url'], 'string'],
            [['media_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'media_id' => 'Mã ảnh',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[TblSinhviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSinhviens()
    {
        return $this->hasMany(TblSinhvien::className(), ['media_id' => 'media_id']);
    }

    /**
     * Gets query for [[TblThongbaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblThongbaos()
    {
        return $this->hasMany(TblThongbao::className(), ['media_id' => 'media_id']);
    }
}
