$(document).ready(function () {

  // start crypto kanvertatsiyani hisoblash jarayoni 
  var valOne = 0;
  var sum=1;

  $('#myselect_one').change(function(){
        var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);
  });

  $('#myselect_two').change(function(){
        var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);

  });

function select(top_one){
    var btc = $('#btc').data('rate');
    var eth = $('#eth').data('rate');
    var zec = $('#zec').data('rate');
    var ltc = $('#ltc').data('rate');
    switch(top_one){
    case "BTC": sum=parseFloat(btc); break;
    case "ETH": sum=parseFloat(eth); break; 
    case "ZEC": sum=parseFloat(zec); break; 
    case "LTC": sum=parseFloat(ltc); break;
    default: "bu yuq";
  }
  console.log(sum);

  return sum;

}

  $("#val1").keyup(function(){
        var valOne  = $("#val1").val()*1;
        var top_one =select($('#myselect_one').val());
        var top_two =select($('#myselect_two').val());
        var valTwo=valOne*top_one/top_two;
        var n=(Math.round(valTwo*1000)/1000);
        $('#val2').val(n);
        
    });
// end crypto kanvertatsiyani hisoblash jarayoni 


});

$(document).ready(function () {

// start currency kanvertatsiyani hisoblash jarayoni 
var valOne_currency = 0;
var sum_currency=1;

$('#myselect_one_currency').change(function(){
      var valOne_currency  = $("#val1_currency").val()*1;
      var top_one_currency =select($('#myselect_one_currency').val());
      var top_two_currency =select($('#myselect_two_currency').val());
      var valTwo_currency=valOne_currency*top_one_currency/top_two_currency;
      var n_currency=(Math.round(valTwo_currency*1000)/1000);
      $('#val2_currency').val(n_currency);
});

$('#myselect_two_currency').change(function(){
      var valOne_currency  = $("#val1_currency").val()*1;
      var top_one_currency =select($('#myselect_one_currency').val());
      var top_two_currency =select($('#myselect_two_currency').val());
      var valTwo_currency=valOne_currency*top_one_currency/top_two_currency;
      var n_currency=(Math.round(valTwo_currency*1000)/1000);
      $('#val2_currency').val(n_currency);

});

function select(top_one_currency){
  var cad = $('#cad').data('rate');
  var chf = $('#chf').data('rate');
  var rub = $('#rub').data('rate');
  var usd = $('#usd').data('rate');
  var gbp = $('#gbp').data('rate');

  switch(top_one_currency){
  case "CAD": sum_currency=parseFloat(cad); break;
  case "CHF": sum_currency=parseFloat(chf); break; 
  case "RUB": sum_currency=parseFloat(rub); break; 
  case "USD": sum_currency=parseFloat(usd); break;
  case "GBP": sum_currency=parseFloat(gbp); break;
  default: "bu yuq";
}

return sum_currency;

}

$("#val1_currency").keyup(function(){
      var valOne_currency  = $("#val1_currency").val()*1;
      var top_one_currency =select($('#myselect_one_currency').val());
      var top_two_currency =select($('#myselect_two_currency').val());
      var valTwo_currency=valOne_currency*top_one_currency/top_two_currency;
      var n_currency=(Math.round(valTwo_currency*1000)/1000);
      $('#val2_currency').val(n_currency);
      
  });
// end currency kanvertatsiyani hisoblash jarayoni 
});

