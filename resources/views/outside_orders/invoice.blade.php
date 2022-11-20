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
        <h3>@lang('lang_v1.outside_order_invoice')</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th>@lang('lang_v1.product_name')</th>
                <!--<th>@lang('lang_v1.unit_price')</th>-->
                <th>@lang('lang_v1.quntity')</th>
                <th>@lang('lang_v1.price')</th>
            </tr>
            <tbody>
                @foreach ($data['transaction'] as $record)
                    <tr>
                        <td>{{ $record->name }}</td>
                        <!--<td><span class="display_currency" data-currency_symbol ="true">{{ $record->unit_price }}</span></td>-->
                        <td>{{ $record->quantity }}</td>
                        <td><span class="display_currency" data-currency_symbol ="true">{{ $record->quantity * $record->unit_price }}</span></td>
                    </tr>
                @endforeach
                <tr>
                    <td><h4>@lang('lang_v1.grand_total')</h4></td>
                    <td></td>
                    <td><span class="display_currency" data-currency_symbol ="true">{{ $data['transaction'][0]->final_total }}</span></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6 colxs-12">
                <div style="text-align: left">
                    <h4>@lang('lang_v1.billing_information')</h4>
                    <h5>@lang('lang_v1.invoice_no') : {{ $data['transaction'][0]->invoice_no }}</h5>
                    <h5>@lang('lang_v1.customer_name')       : {{ $data['customer_data']->customer_name }}</h5>
                    <h5>@lang('lang_v1.customer_phone')      : {{ $data['customer_data']->customer_phone }}</h5>
                    <h5>@lang('lang_v1.customer_email')      : {{ $data['customer_data']->customer_email }}</h5>
                    <h5>@lang('lang_v1.order_date')  : {{ $data['transaction'][0]->transaction_date }}</h5>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <div style="text-align: left">
                    <h4>@lang('lang_v1.shipping_address')</h4>
                    <h5>@lang('lang_v1.governorate') : {{ $data['customer_data']->PROVINCE_NAME_EN.' / '.$data['customer_data']->PROVINCE_NAME_AR  }}</h5>
                    <h5>@lang('lang_v1.area')        : {{ $data['customer_data']->AREA_NAME_EN.' / '.$data['customer_data']->AREA_NAME_AR  }}</h5>
                    <h5>@lang('lang_v1.street')      : {{ $data['customer_data']->street }}</h5>
                    <h5>@lang('lang_v1.building')    : {{ $data['customer_data']->building }}</h5>
                    <h5>@lang('lang_v1.floor')       : {{ $data['customer_data']->floor }}</h5>
                    <h5>@lang('lang_v1.apartment')   : {{ $data['customer_data']->apartment }}</h5>
                    <h5>@lang('lang_v1.landmark')    : {{ $data['customer_data']->landmark }}</h5>
                </div>
            </div>
            
        </div>
        <br>
        <br>
        <h4 class="text-center">Thank You for visting Rituals Salon</h4>
        <h6 class="text-center"> <i>No Cash Refund. A wallet note will be issues. Terms and Conditions apply.</i></h6>
        <h5 class="text-center"><i class="fa fa-phone"></i> 965 99199835 || <i class="fa fa-whatsapp"></i> 965 99199835 || <i class="fa fa-instagram"></i>rituals_salon</h5>
    </div>
</body>
</html>
