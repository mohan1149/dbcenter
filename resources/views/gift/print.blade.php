<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container-fluid">
        <div style="text-align:center;">
            <img src="/pos/public/img/default.png" alt="" srcset="" width="40%">
        </div>
        <h3 class="text-center">@lang('lang_v1.vallet')</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="text-center">{{ __('lang_v1.customer').' # '.$print_data['name'] }}</h4>
                <h4 class="text-center">{{ __('lang_v1.vallet_credit').'  ' }} <span class="display_currency" data-currency_symbol ="true" >{{ $print_data['amount'] }}</span></h4>
                <h4 class="text-center">{{ __('lang_v1.notes').' # '.$print_data['notes'] }}</h4>
                <br>
                <br>
                <br>
                <h4 class="text-center">Thank You for visting Rituals Salon</h4>
                <h6 class="text-center"> <i>No Cash Refund. A wallet note will be issues. Terms and Conditions apply.</i></h6>
                <h5 class="text-center"><i class="fa fa-phone"></i> 965 99199835 || <i class="fa fa-whatsapp"></i> 965 99199835 || <i class="fa fa-instagram"></i>rituals_salon</h5>
            </div>
        </div>
    </div>
</body>
</html>