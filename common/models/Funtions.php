<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "funtions".
 *
 * @property int $funtions_id
 * @property string $name
 *
 * @property AdminUser[] $adminUsers
 */
class Funtions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funtions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['funtions_id', 'name'], 'required'],
            [['funtions_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['funtions_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'funtions_id' => 'Funtions ID',
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
        return $this->hasMany(AdminUser::className(), ['funtions_id' => 'funtions_id']);
    }
}
