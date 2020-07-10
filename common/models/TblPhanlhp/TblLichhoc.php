<?php

namespace common\models\TblPhanlhp;

use common\models\TblLophocphan;
use Yii;

/**
 * This is the model class for table "tbl_lichhoc".
 *
 * @property int $id
 * @property int $lophp_id
 * @property int $tiet
 * @property int $thu
 * @property bool $buoi
 *
 * @property TblLophocphan $lophp
 */
class TblLichhoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lichhoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lophp_id', 'tiet', 'thu'], 'required'],
            [['lophp_id', 'tiet', 'thu'], 'integer'],
            [['buoi'], 'boolean'],
            [['lophp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophocphan::className(), 'targetAttribute' => ['lophp_id' => 'lophp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lophp_id' => 'Lophp ID',
            'tiet' => 'Tiet',
            'thu' => 'Thu',
            'buoi' => 'Buoi',
        ];
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
