<div class="box box-widget">
    <div class="box-header with-border">
        <div class="row">
            <div class="col col-lg-6">
                <span style="display: none" class="badge subs_paid_badge">@lang('lang_v1.paid')</span>
                <span style="display: none" class="badge subs_unpaid_badge">@lang('lang_v1.unpaid')</span>
            </div>
        </div>
        <div class="m-3">
            <label for="custGrp">{{ __('lang_v1.choose_group') }}</label>
            <select class="form-control" id="custGrp">
            </select>
        </div>
        <h4>{{ __('lang_v1.sub_payment_status') }} : <strong class="sub_payment_status"
                style="text-transform: capitalize"></strong></h4>
        <h4>@lang('lang_v1.customer_group') : <strong class="subscription_name"></strong></h4>
        <h4>@lang('lang_v1.subscription_pieces') : <strong class="subscription_pieces"></strong></h4>
        <h4>@lang('lang_v1.subscription_cost') : <strong class="subscription_cost"></strong></h4>
        <hr>
        <h4>@lang('lang_v1.amount_paid') : <strong class="amount_paid"></strong></h4>
        <h4>@lang('lang_v1.amount_balance') : <strong class="amount_balance"></strong></h4>

        <h4>@lang('lang_v1.quota_used') : <strong class="quota_used"></strong></h4>
        <h4>@lang('lang_v1.quota_left') : <strong class="quota_left"></strong></h4>

    </div>
    <div class="box-body">
        <div class="update_subscription">
            <div class="form-group">
                <label for="">@lang('lang_v1.brought_today')</label>
                <input class="form-control brought_today_count" type="number">
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary save_tranasaction" data-toggle="modal"
                    data-target="#ajaxModal" type="submit" name="" id="" value="@lang('lang_v1.save')">
            </div>
        </div>
        <div id="ajaxModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">
                        <p>@lang('lang_v1.wait_while_processing')</p>
                    </div>

                </div>

            </div>
        </div>
        <div id="print_transaction_content" style="display: none">
            <style>
                th,
                td,
                table,
                td {
                    text-align: center;
                }
            </style>
            <div style="display:flex;justify-content: center">
                <img src="/img/default.png" alt="Logo" width="50%">
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4 class="text-center">@lang('contact.name') := <span class="customer_name"></span></h4>
                    <h4 class="text-center">@lang('contact.mobile') := <span class="customer_phone"></span></h4>
                    <h3 class="text-center">
                        @lang('lang_v1.subscription_report')
                    </h3>
                    <div style="text-align:left">
                        <h5 class="text-center">@lang('lang_v1.customer_group') := <span class="p_subscription_name"></span></h5>
                        <h5 class="text-center">@lang('lang_v1.subscription_pieces') := <span class="p_subscription_pieces"></span></h5>
                        <h5 class="text-center">@lang('lang_v1.subscription_cost') := <span class="p_subscription_cost"></span></h5>

                        <h4 class="text-center">@lang('lang_v1.amount_paid') : <strong class="amount_paid"></strong></h4>
                        <h4 class="text-center">@lang('lang_v1.amount_balance') : <strong class="amount_balance"></strong></h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h3 class="text-center">
                        @lang('lang_v1.transaction_report') # {{ date('l - d/m/y') }}
                    </h3>
                    <div style="text-align:left">
                        <p class="text-center">*****{{ __('lang_v1.before') }}****</p>
                        <h5 class="text-center">@lang('lang_v1.quota_left') := <span class="quota_left"></span></h5>
                        <h5 class="text-center">@lang('lang_v1.quota_used') := <span class="quota_used"></span></h5>
                        <hr>
                        <p class="text-center">*****{{ __('lang_v1.after') }}****</p>
                        <h5 class="text-center">@lang('lang_v1.brought_today') := <span class="brought_today"></span></h5>
                        <h5 class="text-center">@lang('lang_v1.net_available') := <span class="net_available"></span></h5>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <h4 class="text-center">Thank You for visting DBeauty Center</h4>
            <h6 class="text-center"> <i>No Cash Refund. A wallet note will be issues. Terms and Conditions apply.</i>
            </h6>
            <h5 class="text-center">66633969</h5>
        </div>
    </div>
