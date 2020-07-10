<?php

namespace common\models\TblPhanlhp;

use Yii;

/**
 * This is the model class for table "tbl_lichthi".
 *
 * @property int $lichthi_id
 * @property int $lophp_id
 * @property string $thoigian
 * @property string $diadiem
 * @property int|null $sbd
 * @property string|null $hinhthuc
 *
 * @property TblLophocphan $lophp
 */
class TblLichthi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lichthi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lophp_id', 'thoigian', 'diadiem'], 'required'],
            [['lophp_id', 'sbd'], 'integer'],
            [['thoigian'], 'safe'],
            [['diadiem'], 'string', 'max' => 200],
            [['hinhthuc'], 'string', 'max' => 45],
            [['lophp_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblLophocphan::className(), 'targetAttribute' => ['lophp_id' => 'lophp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lichthi_id' => 'Lichthi ID',
            'lophp_id' => 'Lophp ID',
            'thoigian' => 'Thoigian',
            'diadiem' => 'Diadiem',
            'sbd' => 'Sbd',
            'hinhthuc' => 'Hinhthuc',
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
