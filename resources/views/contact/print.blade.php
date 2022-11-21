<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         @media print {
            .content{
                display:none;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container-fluid">
        <div style="text-align:center;">
            <img src="/img/default.png" alt="" srcset="" width="40%">
        </div>
        <div class="justifify-content-center text-center">
	<h3>@lang("contact.name")  ::{{ $data->customer }}</h3>
	<h3>@lang("contact.mobile")  ::{{ $data->mobile }}</h3>

	<h5>@lang("lang_v1.customer_group")</h5>
	<h3> {{ $data->name }}</h3>
	<h3>@lang("lang_v1.subscription_cost")  :: <span class="display_currency" data-currency_symbol ="true">{{ $data->subscription_cost }}<span></h3>
        <h3>@lang("lang_v1.subscription_pieces")  :: {{ $data->subscription_pieces }}<span></h3>
	</div>
        <br>
        <br>
        <h4 class="text-center">Thank You for visting DBeauty Center</h4>
        <h6 class="text-center"> <i>No Cash Refund. A wallet note will be issues. Terms and Conditions apply.</i></h6>
        <h5 class="text-center">66633969</h5>
    </div>
</body>
</html>
