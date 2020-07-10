<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_phanlhp".
 *
 * @property int $lophp_id
 * @property string $manganh
 * @property int $phanlop_id
 *
 * @property TblNganh $manganh0
 * @property TblLophocphan $lophp
 */
class TblPhanlhp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_phanlhp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lophp_id', 'manganh'], 'required'],
            [['lophp_id'], 'integer'],
            [['manganh'], 'string', 'max' => 20],
            [['manganh'], 'exist', 'skipOnError' => true, 'targetClass' => TblNganh::className(), 'targetAttribute' => ['manganh' => 'manganh']],
            [['lophp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophocphan::className(), 'targetAttribute' => ['lophp_id' => 'lophp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lophp_id' => 'Lophp ID',
            'manganh' => 'Manganh',
            'phanlop_id' => 'Phanlop ID',
        ];
    }

    /**
     * Gets query for [[Manganh0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManganh0()
    {
        return $this->hasOne(TblNganh::className(), ['manganh' => 'manganh']);
    }

    /**
     * Gets query for [[Lophp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLophp()
    {
        return $this->hasOne(TblLophocphan::className(), ['lophp_id' => 'lophp_id']);
    }
}
