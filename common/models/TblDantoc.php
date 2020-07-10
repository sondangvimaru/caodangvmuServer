<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_dantoc".
 *
 * @property int $id_dantoc
 * @property string $name
 *
 * @property TblSinhvien[] $tblSinhviens
 */
class TblDantoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_dantoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dantoc' => 'Dân tộc',
            'name' => 'Tên',
        ];
    }

    /**
     * Gets query for [[TblSinhviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSinhviens()
    {
        return $this->hasMany(TblSinhvien::className(), ['id_dantoc' => 'id_dantoc']);
    }
}
