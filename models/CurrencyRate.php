<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "next_cbu_currency_rate".
 *
 * @property integer $id
 * @property integer $currency_id
 * @property integer $date
 * @property integer $rate
 * @property integer $old_rate
 *
 * @property CbuCurrency $currency
 */
class CurrencyRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate' , 'date' , 'currency_id' , 'old_rate'], 'required'],
            [['rate' , 'date' , 'currency_id', 'old_rate'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rate' => Yii::t('app', 'Rate'),
            'date' => Yii::t('app', 'Date'),
            'currency_id' => Yii::t('app', 'Currency ID'),
            'old_rate' => Yii::t('app', 'Old Rate'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}