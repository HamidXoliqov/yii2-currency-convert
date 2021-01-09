<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "next_cbu_currency".
 *
 * @property integer $id
 * @property string $name_uz
 * @property string $name_en
 * @property string $name_ru
 * @property string $short_name
 * @property string $img
 *
 * @property CbuCurrencyRate $nextCbuCurrencyRates
 */
class CryptoCurrency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crypto_currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_name'], 'required'],
            [['short_name','name','title'], 'string', 'max' => 255],
            [['date'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),          
            'short_name' => Yii::t('app', 'Short Name'),
            'title' => Yii::t('app', 'Title'),
            'date' => Yii::t('app', 'Date'),
            
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNextCryptoCurrencyRates()
    {
        return $this->hasOne(CryptoCurrencyRate::className(), ['currency_id' => 'id'])->orderBy(['id'=>SORT_DESC]);
    }
    public static function convert($first,$second,$value){
        if($first=="summ"&&$second!="summ"){
                $secondValue=CryptoCurrencyRate::find()->where(['currency_id'=>$second])->orderBy(['id'=>SORT_DESC])->one();
                $res=$value/$secondValue->rate;
                return round($res,2);
        }elseif($second=="summ"&&$first!="summ"){
            $firstValue=CryptoCurrencyRate::find()->where(['currency_id'=>$first])->orderBy(['id'=>SORT_DESC])->one();
             $res=$value*$firstValue->rate;
                return round($res,2);
        }elseif($second=="summ"&&$first=="summ"){
            return $value;
        }else{
             $firstValue=CryptoCurrencyRate::find()->where(['currency_id'=>$first])->orderBy(['id'=>SORT_DESC])->one();
              $secondValue=CryptoCurrencyRate::find()->where(['currency_id'=>$second])->orderBy(['id'=>SORT_DESC])->one();
              $koef=$firstValue->rate/$secondValue->rate;

            return round($value*$koef,2);
        } 
    }
    public static function getList(){
        $all=CryptoCurrency::find()->asArray()->all();
        $res=[];
        $res['summ']="UZS СУМ";
        foreach ($all as $key => $value) {
            $res[$value['id']]=$value['short_name']." ".$value['name'];
        }
        return $res;

    }
}