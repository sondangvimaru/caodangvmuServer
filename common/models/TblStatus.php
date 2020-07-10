<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_status".
 *
 * @property int $status_id
 * @property string $name
 *
 * @property AdminUser[] $adminUsers
 * @property SvUser[] $svUsers
 */
class TblStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'name'], 'required'],
            [['status_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[AdminUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminUsers()
    {
        return $this->hasMany(AdminUser::className(), ['status_id' => 'status_id']);
    }

    /**
     * Gets query for [[SvUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSvUsers()
    {
        return $this->hasMany(SvUser::className(), ['status_id' => 'status_id']);
    }
}
