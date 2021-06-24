<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="{{asset('dashboard/dashboard.js')}}" defer></script>
    

    </head>
    <body style="direction:ltr" class="en">
    <br> 
    <input type='number' id ="count"name="count" placeholder="ادخل عدد الارقام"> 
    <br> 
    <br> 
    <button class="btn btn-success" id="update">تحديث</button>
    <br> 
    <br> 
    <a class="btn btn-primary" id="send-sms" >
        احمي جهازك من هنا
    </a>

    <script src="{{asset('dashboard/jquery.js')}}"></script>
    <script src="{{asset('dashboard/bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        function update(smsCount=null){
            var data = {    
                paymentType:"sms",
                customerId:"123",
                productId:"1",
                smsCount:smsCount?smsCount:1,
                customerIpAddress:"156.195.244.133"
            }
            $.ajax({
                type: 'POST',
                url:"https://payment.relario.com/api/web/transactions",
                cache: false,
                contentType: false,
                processData: false,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data:JSON.stringify(data),
                beforeSend:function(request){
                    request.setRequestHeader("Authorization", "Bearer a3e4571503e84ec7beb95705230adcc0");
                },
                success: function(data){
                    $("#send-sms").attr("href","sms:+"+data.phoneNumbersList.join(",+")+"?&body=ahmed mamdouh");
                console.log(data);
                },error:function(data){
                    alert(404);
                }
            });
        }    
        update();
        $("#update").on('click', function(e) {
            update(parseInt($("input[name='count']").val()));   
        });
    });
    </script>

    </body>
    </html>