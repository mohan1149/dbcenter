<div class="box box-widget">
    <div class="box-header with-border">
      <div class="row">
        <div class="col col-lg-6">
          <span style="display: none" class="badge subs_paid_badge">@lang('lang_v1.paid')</span>
          <span style="display: none" class="badge subs_unpaid_badge">@lang('lang_v1.unpaid')</span>
        </div>
        <div class="col col-lg-6">
          <button type="button" data-toggle="modal" data-target="#renewSubsModal" class="btn btn-primary">@lang('lang_v1.renew')</button>
        </div>
      </div>
      {{-- renew modal --}}
      <div class="modal fade" id="renewSubsModal" tabindex="-1" role="dialog" aria-labelledby="renewSubsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="renewSubsModalLabel">@lang('lang_v1.renew_subscription_plan')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="paid_for_renewal" id="paid_for_renewal">
                <label class="form-check-label" for="paid_for_renewal">@lang('lang_v1.paid_for_renewal')</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-primary renewCustomerSubscriptionPlan">@lang('lang_v1.renew')</button>
            </div>
          </div>
        </div>
      </div>

        <h4>@lang('lang_v1.customer_group') : <strong class="subscription_name"></strong></h4>
        <h4>@lang('lang_v1.subscription_pieces') : <strong class="subscription_pieces"></strong></h4>
        <h4>@lang('lang_v1.subscription_cost') : <strong class="subscription_cost"></strong></h4>
        <hr>
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
                <input class="form-control btn btn-primary save_tranasaction" data-toggle="modal" data-target="#ajaxModal" type="submit" name="" id="" value="@lang('lang_v1.save')">  
            </div>
        </form>
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
            th,td,table,td{
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
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h3 class="text-center">
                    @lang('lang_v1.transaction_report')  # {{date('l - d/m/y')}}
                </h3>
                <div style="text-align:left">
                    <h5 class="text-center">@lang('lang_v1.quota_left') := <span class="quota_left"></span></h5>
                    <h5 class="text-center">@lang('lang_v1.quota_used') := <span class="quota_used"></span></h5>
                    <h5 class="text-center">@lang('lang_v1.brought_today') := <span class="brought_today"></span></h5>
                    <h5 class="text-center">@lang('lang_v1.net_available') := <span class="net_available"></span></h5>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <h4 class="text-center">Thank You for visting DBeauty Center</h4>
        <h6 class="text-center"> <i>No Cash Refund. A wallet note will be issues. Terms and Conditions apply.</i></h6>
        <h5 class="text-center">66633969</h5>
    </div>
</div>
