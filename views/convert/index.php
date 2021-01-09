<?php

use yii\helpers\Url;


$this->title = Yii::t('app',"Currency  convert");

?>
<aside class="sidebar">
    <div class="row">
        <div class="currency col-lg-6">            
            <div class="currensy-row">
                <h4 style="color: #fff; margin-left: 30%;">
                    Crrypto currency convert !
                </h4>
            <? foreach($cbu_crypto as $item): ?>
            <? 
              $rate = $item->nextCryptoCurrencyRates['rate']; 
              $farq = ($item->nextCryptoCurrencyRates['rate']-$item->nextCryptoCurrencyRates['old_rate'])*100/$item->nextCryptoCurrencyRates['old_rate'];
            ?>
            <div class="currensy-col">
                <div class="currensy">
                  <p class="currensy-name"
                    <?
                    
                    switch($item->short_name){
                        case "BTC": {echo 'id="btc" data-rate="'.$rate.'"' ;} break;
                        case "ETH": {echo 'id="eth" data-rate="'.$rate.'"' ;} break; 
                        case "ZEC": {echo 'id="zec" data-rate="'.$rate.'"' ;} break; 
                        case "LTC": {echo 'id="ltc"; data-rate="'.$rate.'"' ;} break;
                    }

                    ?>
                  >
                  <?= $item->title?>
                    </p>
                    <span class="currency-number"><?="$ ".number_format($rate,2,"."," ") ?></span>
                    <?if($farq < 0){?>
                      <i class="fa fa-caret-down"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                    <?if($farq > 0){?>
                      <i class="fa fa-caret-up"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                    <?if($farq == 0){?>
                      <i class="fa fa-caret-up"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                </div>
            </div>
            <? endforeach; ?>
            </div>
            <div class="converter-row" style="margin-top: 50px;">
                <div class="converter-col">
                    <input id="val1" type="text" class="form-control" placeholder="0">
                    <div class="form-group">
                    <select id="myselect_one">
                        <? foreach($cbu_crypto as $item):?>                      
                            <option value="<?=$item->short_name?>"><?=$item->title?></option>
                        <?endforeach?>                      
                    </select>
                    </div>
                </div>
                <div class="converter-col">
                    <input id="val2" type="text" class="form-control" placeholder="0" disabled="disabled">
                    <div class="form-group">
                    <select id="myselect_two">
                        <? foreach($cbu_crypto as $item): ?>
                            <option value="<?=$item->short_name?>"><?=$item->title?></option>  
                        <?endforeach?>  
                    </select>
                    </div>
                </div>
            </div>
                <button type="button" class="send-btn" id="crypto_currency" data-id="crypto">
                <i class="fa fa-repeat" aria-hidden="true"></i>
                    Crrypto currency refresh
                </button>
        </div>
        <div class="currency col-lg-6">
            <div class="currensy-row ">
                <h4 style="color: #fff; margin-left: 30%;">
                    Currency convert !
                </h4>
            <? foreach($cbu_currency as $item): ?>
            <? 
              $rate = $item->nextCryptoCurrencyRates['rate']; 
              $farq = ($item->nextCryptoCurrencyRates['rate']-$item->nextCryptoCurrencyRates['old_rate'])*100/$item->nextCryptoCurrencyRates['old_rate'];
            ?>
            <div class="currensy-col">
                <div class="currensy">
                  <p class="currensy-name"
                    <?
                    
                    switch($item->short_name){
                        case "CAD": {echo 'id="cad" data-rate="'.$rate.'"' ;} break;
                        case "CHF": {echo 'id="chf" data-rate="'.$rate.'"' ;} break; 
                        case "RUB": {echo 'id="rub" data-rate="'.$rate.'"' ;} break; 
                        case "USD": {echo 'id="usd"; data-rate="'.$rate.'"' ;} break;
                        case "GBP": {echo 'id="gbp"; data-rate="'.$rate.'"' ;} break;
                    }

                    ?>
                  >
                  <?= $item->title?>
                    </p>
                    <span class="currency-number"><?="$ ".number_format($rate,2,"."," ") ?></span>
                    <?if($farq < 0){?>
                      <i class="fa fa-caret-down"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                    <?if($farq > 0){?>
                      <i class="fa fa-caret-up"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                    <?if($farq == 0){?>
                      <i class="fa fa-caret-up"><span><?=abs(round($farq,2))."%";?></span></i>
                    <?}?>
                </div>
            </div>
            <? endforeach; ?>
            </div>

            <div class="converter-row">
                <div class="converter-col">
                    <input id="val1_currency" type="text" class="form-control" placeholder="0">
                    <div class="form-group">
                    <select id="myselect_one_currency">
                        <? foreach($cbu_currency as $item):?>                      
                            <option value="<?=$item->short_name?>"><?=$item->title?></option>
                        <?endforeach?>                      
                    </select>
                    </div>
                </div>
                <div class="converter-col">
                    <input id="val2_currency" type="text" class="form-control" placeholder="0" disabled="disabled">
                    <div class="form-group">
                    <select id="myselect_two_currency">
                        <? foreach($cbu_currency as $item): ?>
                            <option value="<?=$item->short_name?>"><?=$item->title?></option>  
                        <?endforeach?>  
                    </select>
                    </div>
                </div>
            </div>
            <button type="button"  class="send-btn" id="currency" data-id="currency">
            <i class="fa fa-repeat" aria-hidden="true"></i>
                Currency refresh
            </button>
        </div>
    </div>
</aside>
<?php
    $this->registerJs('
    $("#currency").click(function(e) {   
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "convert/currency",
            data: {
                id: id
            }, 
            success: function(result) {
                if(result == 1) {
                    location.reload();
                } else {
                }
            }, 
            error: function(result) {
                console.log("server error");
            }
        });
     });

     $("#crypto_currency").click(function(e) {   
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "convert/crypto",
            data: {
                id: id
            }, 
            success: function(result) {
                if(result == 1) {
                    location.reload();
                } else {
                }
            }, 
            error: function(result) {
                console.log("server error");
            }
        });
     });

    //  $(".close").click(function(e) {
    //     $(".alert-dismissable").css("display", "none");
    //  });

    ')
?>
