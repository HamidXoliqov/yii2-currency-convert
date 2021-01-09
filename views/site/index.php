<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>CURRENCY CONVERT !</h1>

        <p class="lead">Crypto valyuta va Oddiy valyuta convetlash !</p>

        <a class="btn btn-lg btn-success" href="<?=Url::to('convert')?>">
            Convert currency 
        </a>
    </div>
</div>
