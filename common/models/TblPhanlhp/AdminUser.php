<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "admin_user".
 *
 * @property int $admin_id
 * @property string $username
 * @property string $password
 * @property int $status_id
 * @property int $funtions_id
 * @property string|null $ten
 * @property bool|null $gioitinh
 * @property string|null $diachi
 * @property string|null $email
 * @property string|null $sdt
 *
 * @property Funtions $funtions
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'status_id', 'funtions_id'], 'required'],
            [['status_id', 'funtions_id'], 'integer'],
            [['gioitinh'], 'boolean'],
            [['username', 'password'], 'string', 'max' => 100],
            [['ten'], 'string', 'max' => 45],
            [['diachi'], 'string', 'max' => 1000],
            [['email'], 'string', 'max' => 400],
            [['sdt'], 'string', 'max' => 12],
            [['funtions_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funtions::className(), 'targetAttribute' => ['funtions_id' => 'funtions_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'username' => 'Username',
            'password' => 'Password',
            'status_id' => 'Status ID',
            'funtions_id' => 'Funtions ID',
            'ten' => 'Ten',
            'gioitinh' => 'Gioitinh',
            'diachi' => 'Diachi',
            'email' => 'Email',
            'sdt' => 'Sdt',
        ];
    }

    /**
     * Gets query for [[Funtions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuntions()
    {
        return $this->hasOne(Funtions::className(), ['funtions_id' => 'funtions_id']);
    }
}
