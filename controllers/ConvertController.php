<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CryptoCurrency;
use app\models\CryptoCurrencyRate;
use app\models\Currency;
use app\models\CurrencyRate;


class ConvertController extends Controller
{
    public function actionIndex()
    {
        $cbu_crypto = CryptoCurrency::find()->where(['or',['short_name' => 'BTC'],['short_name' => 'ETH'],['short_name' => 'ZEC'],['short_name' => 'LTC']])->orderBy(['date' => SORT_DESC])->all();
        $cbu_currency = Currency::find()->where(['or',['short_name' => 'CAD'],['short_name' => 'CHF'],['short_name' => 'RUB'],['short_name' => 'USD'],['short_name' => 'GBP']])->orderBy(['date' => SORT_DESC])->all();
        
        return $this->render('index',['cbu_crypto' => $cbu_crypto,'cbu_currency'=>$cbu_currency]);
    }

    public function actionCrypto()
    {
        $boll = true;
        $result = 0;
        if (isset($_GET['id'])) {
            $result = 1;
        }

        $url = 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,ZEC,LTC&tsyms=USD&api_key=d7d314970e28cfce6fc842364c178fb71407b1faafea3121f83006417b350714';
        $str=file_get_contents($url);
        $data1=json_decode($str);
        foreach ($data1 as $key => $value) {                   
            $data[$key] = $value;   
        }

        $time=time();
        foreach ($data as $key=>$cr) {
         if (($model = CryptoCurrency::findOne(['short_name' => $key]))) {
                $old = CryptoCurrencyRate::find()->where(['currency_id' => $model->id])->orderBy(['id'=>SORT_DESC])->one();
                 $rate = new CryptoCurrencyRate();
                 $rate->rate = (float)$cr->USD;
                 $rate->date = $time;   
                 $rate->currency_id = $model->id;
                 if (!$old) {
                     $rate->old_rate = (float)$cr->USD;
                 } else {
                     $rate->old_rate = $old->rate;
                 }
                 if (!$rate->save()) {
                 };
        } else {
             $model = new CryptoCurrency();
             $model->short_name = (string)$key;
             $model->name ='USD';
             $model->date = $time;
             switch ($key) {
                case "BTC": {$model->title = "Bitcoin" ;} break;
                case "ETH": {$model->title = "Ethereum";} break; 
                case "ZEC": {$model->title = "ZCash";} break; 
                case "LTC": {$model->title = "Litecoin";} break;
                 
                 default:
                    $model->title = "No name";
                     break;
             }
            if ($model->save()) {
                     $old = CryptoCurrencyRate::find()->where(['currency_id' => $model->id])->orderBy("id", 'desc')->one();
                     $rate = new CryptoCurrencyRate();
                     $rate->rate = (float)$cr->USD;
                     $rate->date = $time;                           
                     $rate->currency_id = $model->id;
                     if (!$old) {
                         $rate->old_rate = (double)$cr->USD;
                     } else {
                         $rate->old_rate = $old->rate;
                     }
                     if (!$rate->save()) {
                         var_dump($model);
                     };
             } else {
                Yii::$app->session->setFlash('error', "Crrypto currency not data");
                return $result?$result-1:$result; 

             }
         }
     }
     Yii::$app->session->setFlash('success', 'Crypto currency refresh success fully !');
     return $result;
    }

    public function actionCurrency()
    {
        $result = 0;
        if (isset($_GET['id'])) {
            $result = 1;
        }
        $url = 'https://api.exchangeratesapi.io/latest?symbols=USD,GBP,RUB,CAD,CHF';
        $str=file_get_contents($url);
        $data1=json_decode($str);
        foreach ($data1->rates as $key => $value) {                   
            $data[$key] = $value;   
        }
        $time=time();
        foreach ($data as $key=>$cr) {
         if (($model = Currency::findOne(['short_name' => $key]))) {
                $old = CurrencyRate::find()->where(['currency_id' => $model->id])->orderBy(['id'=>SORT_DESC])->one();
                 $rate = new CurrencyRate();
                 $rate->rate = (float)$cr;
                 $rate->date = $time;   
                 $rate->currency_id = $model->id;
                 if (!$old) {
                     $rate->old_rate = (float)$cr->USD;
                 } else {
                     $rate->old_rate = $old->rate;
                 }
                 if (!$rate->save(false)) {
                 };
        } else {
             $model = new Currency();
             $model->short_name = (string)$key;
             $model->name ='EUR';
             $model->date = $time;
             switch ($key) {
                case "CAD": {$model->title = "CAD" ;} break;
                case "CHF": {$model->title = "CHF";} break; 
                case "RUB": {$model->title = "RUB";} break; 
                case "USD": {$model->title = "USD";} break;
                case "GBP": {$model->title = "GBP";} break;
                 
                 default:
                    $model->title = "No name";
                     break;
             }

            if ($model->save()) {
                $old = CurrencyRate::find()->where(['currency_id' => $model->id])->orderBy("id", 'desc')->one();
                $rate = new CurrencyRate();
                $rate->rate = (float)$cr;
                $rate->date = $time;                           
                $rate->currency_id = $model->id;

                if (!$old) {
                    $rate->old_rate = (double)$cr;
                } else {
                    $rate->old_rate = $old->rate;
                }
                if (!$rate->save()) {
                    var_dump($model);
                };
             } else {
                Yii::$app->session->setFlash('error', "Currency not data");
                return $result?$result-1:$result; 
             }
         }
     }
     Yii::$app->session->setFlash('success', 'Currency refresh success fully !');

        return $result; 
    }
}