<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sv_user".
 *
 * @property int $id
 * @property int $msv
 * @property string $password
 * @property int $status
 *
 * @property TblSinhvien $msv0
 */
class SvUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sv_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msv', 'password', 'status'], 'required'],
            [['msv', 'status'], 'integer'],
            [['password'], 'string', 'max' => 200],
            [['msv'], 'exist', 'skipOnError' => true, 'targetClass' => TblSinhvien::className(), 'targetAttribute' => ['msv' => 'msv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msv' => 'Mã sinh viên',
            'password' => 'Mật khẩu',
            'status' => 'Trạng thái',
        ];
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
