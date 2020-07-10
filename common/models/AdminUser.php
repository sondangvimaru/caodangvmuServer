<?php

namespace common\models;

use Symfony\Component\String\Inflector\InflectorInterface;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

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
 * @property TblStatus $status
 * @property TblBaidang[] $tblBaidangs
 */
class AdminUser extends \yii\db\ActiveRecord implements IdentityInterface
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
            [[ 'username', 'password', 'status_id', 'funtions_id'], 'required'],
            [['admin_id', 'status_id', 'funtions_id'], 'integer'],
            [['gioitinh'], 'boolean'],
            [['username', 'password'], 'string', 'max' => 100],
            [['ten'], 'string', 'max' => 45],
            [['diachi'], 'string', 'max' => 1000],
            [['email'], 'string', 'max' => 400],
            [['sdt'], 'string', 'max' => 12],
            [['admin_id'], 'unique'],
            [['funtions_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funtions::className(), 'targetAttribute' => ['funtions_id' => 'funtions_id']],
            [['status_id'],'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'admin_id' => 'Mã admin',
            'username' => 'Username',
            'password' => 'Password',
            'status_id' => 'Status ID',
            'funtions_id' => 'Funtions ID',
            'ten' => 'Họ và tên',
            'gioitinh' => 'Giới tính',
            'diachi' => 'Địa chỉ',
            'email' => 'Email',
            'sdt' => 'Số điện thoại',
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

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[TblBaidangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblBaidangs()
    {
        return $this->hasMany(TblBaidang::className(), ['admin_id' => 'admin_id']);
    }

    /**
     * @inheritDoc
     */

    public  function  beforeSave($insert)
    {
        $tk=self::findOne(["username"=>$this->username]);

        if($tk!=null)
        {
            ?>
            <script>alert("User này đã tồn tại ")</script>
            <?php
        }else
        {
            return parent::beforeSave($insert); // TODO: Change the autogenerated stub

        }

    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->admin_id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey)
    {
        $this.$this->email=$authKey;
    }
    public  function  findByUsername($username)
    {
        return self::findOne(["username"=>$username]);
    }
    public  function validatePassword($password)
    {
        return $this->password===$password;
    }
}
