$(document).ready(function(){
    $("#ad-type").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){

                $(".listing-type .list-type").not("." + optionValue).hide();
                $("." + optionValue).show();
                $(".listing-type").show();

            } else{

                $(".listing-type").hide();
                $(".listing-type .list-type").hide();
               
            }
        });
    }).change();
});

$(document).on('submit', '#delete-form', function(e) {
    e.preventDefault();
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        location.reload();
                        swal("Poof! Data has been deleted!", {
                            icon: "success",
                        });
                    }
                });
            }
        });
});

$(document).ready(() => {
    $("#img_uploaded").hide();
      $("#browse-file").change(function () {
          const file = this.files[0];
         
          if (file) {
              let reader = new FileReader();
              reader.onload = function (event) {
                  $("#img_uploaded").attr("src", event.target.result);
                  $("#img_uploaded").show();
              };
              reader.readAsDataURL(file);
  
              
  
          }
      });
  });
  $.datetimepicker.setLocale('en');
  $("#checkout_time").datetimepicker({
    datepicker:false,
    format:'H:i',
    step:60,
  //   allowTimes:['12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00'],
    });
  $('#checkin_time').datetimepicker({
      datepicker:false,
      format:'H:i',
      step:60,
  });
  $("#checkout_time").change(function(){
    var price = $(".service-price").data('price');
    var diff = hourCalc($('#checkin_time').val(),$("#checkout_time").val());
    if(diff <= 0){
        diff = 1;
    }
    var total = parseInt(price) * parseInt(diff);
    $(".total").text('$'+total)
  })
    var disablepast = new Date();
    var disbaleddate = new Date(disablepast.getFullYear(), disablepast.getMonth(), disablepast.getDate());
  $('#date').datetimepicker({
    lang:'ch',
    timepicker:true,
 
    minDate:disbaleddate
  });
    var arrayss = [];
  
  $("#checkout_date").change(function(){
    calc()
  })
  $("#checkout_date").datetimepicker({
    lang:'ch',
    timepicker:false,
    format:'m/d/Y',
    formatDate:'Y/m/d',
    minDate:disbaleddate
  });
  $("#date").change(function(){
    addonCalc() 
    calcNoOf()
    weekend_count = weekendsBetween();

    // var dateddd = new Date($(this).val());
    // for(var i = 0; i <= 5;i++){
    //     var arrdata = dateddd.setDate(dateddd.getDate() + 2);
    //     if(dateddd.getMonth() <= 9){
    //         arrayss.push("0"+dateddd.getMonth()+"/"+dateddd.getDate()+"/"+dateddd.getFullYear())
    //     }
    //     else{
    //         arrayss.push(dateddd.getMonth()+"/"+dateddd.getDate()+"/"+dateddd.getFullYear())

    //     }
  
    // }
    // setInterval(function(){
    //     $("#checkout_date").datetimepicker({
    //         lang:'ch',
    //         timepicker:false,
    //         format:'m/d/Y',
    //         formatDate:'Y/m/d',
    //         minDate:disbaleddate
    //       });
    // },1000)
    // calc()
  })
  var no_of = 1;
  var no_of_day = 1;
  var form_type = $(".no_of").data('form_type');
  var addon_total = 0;
  var addon_parent = '';
  var addon_price = 0;
  var addon_qty = 0;
  var addon_result = 0;
  var weekend_count = 0;
  $(".bedroom").click(function(){
    addon_parent = $(this).parent().parent();
    var status = false;
    if($(this).prop("checked") == true){
      status = true;
    }
    $(".bedroom").prop('checked',false)
    if(status == true){
    $(this).prop('checked',true)
    }
    // addonCalc() 
    // calcNoOf()
  })
  $(".add-addon").click(function(){
    addonCalc() 
    calcNoOf()
  })
  $(".addon_qty").keypress(function(){
    addonCalc() 
    calcNoOf()
  })
  $(".addon_qty").change(function(){
    addonCalc() 
    calcNoOf()
  })
  function addonCalc(){
    addon_total = 0;
    $($(".add-addon")).each(function () {
      addon_parent = $(this).parent().parent();
      if($(this).prop("checked") == true){
        addon_price = addon_parent.find(".addon_price").data('addon_price');
        addon_parent.find(".toggle-qty").show();
        addon_parent.find(".addon_qty").attr('name','addon_qty[]');
        addon_parent.find(".addon-input-price").attr('name','addon_price[]');
        addon_qty = addon_parent.find(".addon_qty").val();
        addon_result = addon_price * addon_qty;
        addon_total+=addon_result;
      }
      if($(this).prop("checked") == false){
        addon_parent.find(".toggle-qty").hide();
        addon_parent.find(".addon_qty").attr('name','xyz');
        addon_parent.find(".addon-input-price").attr('name','xyz');
      }

  });
  }
  addonCalc()
  
  $(".my-cart-qty").change(function(){
    var max = $(this).attr('max');
    var min = $(this).attr('min');
    max = parseInt(max);
    min = parseInt(min);
    if($(this).val() <= min){
      $(this).val(min)
      $(this).parent().find(".cart-addon-error-message").text("min "+min+" required")
    }
    else if($(this).val() >= max){
        $(this).val(max)
        $(this).parent().find(".cart-addon-error-message").text("max "+max+" required")
    }
    addonCalc()
    calcNoOf()
  })

  $(".addon_qty").change(function(){
    var max = $(this).attr('max');
    var min = $(this).attr('min');
    max = parseInt(max);
    min = parseInt(min);
    if($(this).val() <= min){
      $(this).val(min)
      $(this).parent().find(".addon-error-message").text("min "+min+" required")
    }
    else if($(this).val() >= max){
        $(this).val(max)
        $(this).parent().find(".addon-error-message").text("max "+max+" required")
    }
    addonCalc()
    calcNoOf()
  })
  
  $(".no_of_guest").change(function(){
    var max = $(this).attr('max');
    var min = $(this).attr('min');
    max = parseInt(max);
    min = parseInt(min);
    if($(".no_of_guest").val() <= min){
      $(".no_of_guest").val(min)
      $(".guest-error-message").text("min "+min+" required")
    }
    else if($(".no_of_guest").val() >= max){
        $(".no_of_guest").val(max)
        $(".guest-error-message").text("max "+max+" required")
    }
  })
  

  function calcWorkingDays(fromDate, days) {
    startDate = new Date(fromDate);
    var endDate = "", noOfDaysToAdd = days, count = 0;
    while(count < noOfDaysToAdd){
        endDate = new Date(startDate.setDate(startDate.getDate() + 1));
        if(endDate.getDay() != 0 && endDate.getDay() != 6){
           //Date.getDay() gives weekday starting from 0(Sunday) to 6(Saturday)
           count++;
        }
    }
    return count;
}

// function getBusinessDateCount (startDate, endDate) {
//   var elapsed, daysBeforeFirstSaturday, daysAfterLastSunday;
//   var ifThen = function (a, b, c) {
//       return a == b ? c : a;
//   };

//   elapsed = endDate - startDate;
//   elapsed /= 86400000;

//   daysBeforeFirstSunday = (7 - startDate.getDay()) % 7;
//   daysAfterLastSunday = endDate.getDay();

//   elapsed -= (daysBeforeFirstSunday + daysAfterLastSunday);
//   elapsed = (elapsed / 7) * 5;
//   elapsed += ifThen(daysBeforeFirstSunday - 1, -1, 0) + ifThen(daysAfterLastSunday, 6, 5);

//   return Math.ceil(elapsed);
// }
// function weekendsBetween() {
//   var second =addDays($("#date").val(),parseInt(no_of_day));
//     var first = $("#date").val();
//     var start = new Date(first);
//     var end = new Date(second);
//     console.log('start',start,'end')
//   "use strict";
//   var startDay = start.getDay(),
//       diff = (end.getTime() - start.getTime() - startDay) / (60000 * 60 * 24),
//       diffWeaks = (diff / 7) | 0,
//       remWeaks = Math.ceil(diff % 7), extra = 0;
//   if (startDay + remWeaks > 7) extra = 2;
//   else if (startDay + remWeaks == 7 ||
//            remWeaks > startDay) extra = 1;
//            console.log('weekend',diffWeaks * 2 + extra ,'no_of_day',parseInt(no_of_day))
//   return diffWeaks * 2 + extra;
// }
function weekendsBetween(){
  var second =addDays($("#date").val(),parseInt(no_of_day)-1);
    var first = $("#date").val();
    var startDate = new Date(first);
    var endDate = new Date(second);
  var totalWeekends = 0;
  for (var i = startDate; i <= endDate; i.setDate(i.getDate()+1)){
     if (i.getDay() == 0 || i.getDay() == 6) totalWeekends++;
  }
  return totalWeekends;
}

function addDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}
function minusDays(date, days) {
  var result = new Date(date);
  result.setDate(result.getDate() - days);
  return result;
}

  $(".no_of").change(function(){
 


    var max = $(this).attr('max');
    var min = $(this).attr('min');
    max = parseInt(max);
    min = parseInt(min);
    if($(".no_of").val() <= min){
      $(".no_of").val(min)
      $(".error-message").text("min "+min+" required")
    }
    else if($(".no_of").val() >= max){
        $(".no_of").val(max)
        $(".error-message").text("max "+max+" required")
    }
    addonCalc()
    calcNoOf()
    weekend_count = weekendsBetween();
  })
  $(".no_of").keyup(function(){
    addonCalc()
    calcNoOf()
  })
  function calcNoOf(){
    var weekend_price = 0;
      if(form_type == 0){
          no_of_day = 1;
          no_of = $(".no_of").val();
      }
      else if(form_type == 1){
        no_of_day = $(".no_of").val();
        no_of = $(".no_of").val();
      }
      else if(form_type == 2){
        no_of = $(".no_of").val() * 30;
        no_of_day = $(".no_of").val() * 30;
      }
      else if(form_type == 3){
        no_of = $(".no_of").val() * 360;
        no_of_day = $(".no_of").val() * 360;

      }
      var price = $(".service-price").data('price');
      if(form_type == 0){
        $(".per_night").val(1)
      }
      else{
        $(".per_night").val(no_of)
      }
      weekend_count = weekendsBetween()
      weekend_price = parseInt($(".service-price").data('weekend_amount')) * parseInt(weekend_count) 
      var total = parseInt(price) * parseInt($(".no_of").val());
      var result = parseInt(total)+parseInt(addon_total);
      if($(".service-price").data('weekend_type') == 0){
        result +=  weekend_price;
      }
      else if($(".service-price").data('weekend_type') == 1){
        result -= weekend_price;
      }
      console.log(weekend_price)
      $(".total").text('$'+result)
  }
  calcNoOf()
  function calc(){
    var date1 = $("#date").val();
    var date2 = $("#checkout_date").val();
    
    var diff = datediff(parseDate(date1), parseDate(date2));
   
    var price = $(".service-price").data('price');
    if(diff <= 0){
        diff = 1;
    }
    var total = parseInt(price) * parseInt(diff);
    $(".total").text('$'+total)
  }
    function parseDate(str) {
        var mdy = str.split('/');
        return new Date(mdy[2], mdy[0]-1, mdy[1]);
    }

    function datediff(first, second) {
        // Take the difference between the dates and divide by milliseconds per day.
        // Round to nearest whole number to deal with DST.
        return Math.round((second-first)/(1000*60*60*24));
    }

    function hourCalc(first,second){
        var difference;
        var date = $("#date").val();
        dt1 = new Date(date+" "+first);
        dt2 = new Date(date+" "+second);

        if (dt2 > dt1) {
            difference = dt2 - dt1;             
        }
        else{
            difference = dt1 - dt2;             
        }
        difference = difference / 60 / 60 / 1000;
        return difference;
    }
    function order(amount,info,order_id)
    {
      var token = '';
      $.ajax({
          url: 'https://api.nowpayments.io/v1/invoice',
          headers: {
          'x-api-key': "ZN23H70-ASDMV1N-NSFVF4E-407SJYW",
          'Content-Type': 'application/json'
          },
          method: 'post',
          data: JSON.stringify({
          "price_amount": amount,
          "price_currency": "usd",
          "order_id":order_id,
          "ipn_callback_url": $(".checkout_url").text(),
          "success_url": $(".checkout_url").text(),
          "cancel_url": "https://new.affordabledesign.website/"
           }),
          success: function(data) {
              window.open("https://nowpayments.io/payment/?iid="+data.id, "_blank");
              // window.location.replace("https://merchant.net-cents.com/widget/payment?data="+data.token);
          },
          error: function(error) {
              console.log(error)
          }
      });
    }
    $("#order_form").on('submit', function(e) {
      e.preventDefault();
      $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: new FormData(this),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend:function(){
              $(document).find('span.text-danger').text('');
          },
          success:function(data){
              if(data.status == 0){
                  $.each(data.error,function(prefix,val){
                      $('span.'+prefix+'_error').text(val[0]);
                    });
                    window.scrollTo({top:0,behavior:"smooth"})
              }
              else{
                  // $("#order_form")[0].reset();
                  order(data.amount,data.delivery_info,data.order_id)
              }
          }

      });
  });

  function donation()
  {
    var token = '';
    // $.ajax({
    //     url: 'https://api.net-cents.com/merchant/v2/widget_payments',
    //     headers: {
    //     'Authorization': "Basic OHRRSS0xV2tUSTFGelhXcTdiZDZ3azhlUHdRLVJGalQ6R0R1QnUtYkhnZElGbDM0dF9SNUVLX2dqelV2UFl1aVQ1ODBkcElxNFdrc2JpSHRQQXlpb0ZNMUc=",
    //     'Accept': 'application/json'
    //     },
    //     method: 'post',
    //     data: {
    //     hosted_payment_id: 5117,
    //     external_id: "123",
    //     amount: $(".donation-amount").val(),
    //     email: $(".donation-email").val(),
    //     first_name: $(".donation-firstname").val(),
    //     last_name: $(".donation-lastname").val(),
    //     phone:$(".donation-phone").val(),
    //     callback_url:$(".donation-url").text()
    //     },
    //     success: function(data) {
    //         window.open("https://merchant.net-cents.com/widget/payment?data="+data.token, "_blank");
    //         // window.location.replace("https://merchant.net-cents.com/widget/payment?data="+data.token);
    //     },
    //     error: function(error) {
    //         console.log(error)
    //     }
    // });
    
         $.ajax({
          url: 'https://api.nowpayments.io/v1/invoice',
          headers: {
          'x-api-key': "ZN23H70-ASDMV1N-NSFVF4E-407SJYW",
          'Content-Type': 'application/json'
          },
          method: 'post',
          data: JSON.stringify({
          "price_amount": $(".donation-amount").val(),
          "price_currency": "usd",
          "ipn_callback_url": $(".donation-url").text(),
          "success_url": $(".donation-url").text(),
          "cancel_url": "https://new.affordabledesign.website/"
           }),
          success: function(data) {
              window.open("https://nowpayments.io/payment/?iid="+data.id, "_blank");
              // window.location.replace("https://merchant.net-cents.com/widget/payment?data="+data.token);
          },
          error: function(error) {
              console.log(error)
          }
      });
  }
  $(".donation-form").on('submit', function(e) {
    e.preventDefault();
    donation()
  })
