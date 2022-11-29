{{-- mohan_customer_add_modal --}}
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        @php
            $form_id = 'contact_add_form';
            if (isset($quick_add)) {
                $form_id = 'quick_add_contact';
            }
        @endphp
        {!! Form::open(['url' => action('ContactController@store'), 'method' => 'post', 'id' => $form_id]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('contact.add_contact') </h4>
        </div>

        <div class="modal-body">
            <div class="row">

                <div class="col-md-6 contact_type_div">
                    <div class="form-group">
                        {!! Form::label('type', __('contact.contact_type') . ':*') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            {!! Form::select('type', $types, null, [
                                'class' => 'form-control',
                                'id' => 'contact_type',
                                'placeholder' => __('messages.please_select'),
                                'required',
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', __('contact.name') . ':*') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('contact.name'), 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 supplier_fields">
                    <div class="form-group">
                        {!! Form::label('supplier_business_name', __('business.business_name') . ':*') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-briefcase"></i>
                            </span>
                            {!! Form::text('supplier_business_name', null, [
                                'class' => 'form-control',
                                'required',
                                'placeholder' => __('business.business_name'),
                            ]) !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('contact_id', __('lang_v1.contact_id') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-badge"></i>
                </span>
                {!! Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]); !!}
            </div>
        </div>
      </div> --}}
                <div class="col-md-6 customer_fields">
                    <div class="form-group">
                        {!! Form::label('customer_group_id', __('lang_v1.customer_group') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-users"></i>
                            </span>
                            {!! Form::select('customer_group_id', $customer_groups, 1, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name', __('lang_v1.dob') . ':*') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                            {!! Form::date('dob', null, ['class' => 'form-control', 'placeholder' => __('lang_v1.dob'), 'required']) !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
          <div class="form-group">
              {!! Form::label('tax_number', __('contact.tax_no') . ':') !!}
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-info"></i>
                  </span>
                  {!! Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]); !!}
              </div>
          </div>
        </div> --}}
                <div class="clearfix"></div>

                {{-- <div class="col-md-4">
          <div class="form-group">
              {!! Form::label('opening_balance', __('lang_v1.opening_balance') . ':') !!}
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-money"></i>
                  </span>
                  {!! Form::text('opening_balance', 0, ['class' => 'form-control input_number']); !!}
              </div>
          </div>
        </div> --}}
                {{-- <div class="col-md-4">
          <div class="form-group">
            <div class="multi-input">
              {!! Form::label('pay_term_number', __('contact.pay_term') . ':') !!} @show_tooltip(__('tooltip.pay_term'))
              <br/>
              {!! Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]); !!}

              {!! Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], '', ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]); !!}
            </div>
          </div>
        </div> --}}


                {{-- <div class="col-md-4 customer_fields">
          <div class="form-group">
              {!! Form::label('credit_limit', __('lang_v1.credit_limit') . ':') !!}
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-money"></i>
                  </span>
                  {!! Form::text('credit_limit', null, ['class' => 'form-control input_number']); !!}
              </div>
              <p class="help-block">@lang('lang_v1.credit_limit_help')</p>
          </div>
        </div> --}}
                <div class="col-md-12">
                    <hr />
                </div>
                {{-- <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('email', __('business.email') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                {!! Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]); !!}
            </div>
        </div>
      </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('mobile', __('contact.mobile') . ':*') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-mobile"></i>
                            </span>
                            {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]) !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('alternate_number', __('contact.alternate_contact_number') . ':') !!}
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                {!! Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]); !!}
            </div>
        </div>
      </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('landline', __('contact.landline') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </span>
                            {!! Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]) !!}
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('city', __('business.block_num') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.block_num')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('state', __('business.street') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.street')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('country', __('business.house_num') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </span>
                            {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.house_num')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('landmark', __('business.landmark') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            {!! Form::text('landmark', null, ['class' => 'form-control', 'placeholder' => __('business.landmark')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('customer_area', __('business.area') . ':') !!}
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <select class="form-control" name="customer_area" id="customer_area">
                                @foreach ($customer_areas as $item)
                                    <option>{{ app()->getLocale() == 'en' ? $item->AREA_NAME_EN : $item->AREA_NAME_AR }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <hr />
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="custom_field1">{{ __('lang_v1.payment_status') }}</label>
                            <select name="payment_status" id="" class="form-control">
                                <option value="Paid/مؤمن للدفع">{{ __('lang_v1.paid') }}</option>
                                <option value="Partially Paid/المدفوعة جزئيا">{{ __('lang_v1.partially') }}</option>
                                <option value="Not Paid/غير مدفوع">{{ __('lang_v1.un_paid') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="amount_paid">{{ __('lang_v1.amount_paid') }}</label>
                          <input type="text" class="form-control" name="amount_paid">
                      </div>
                  </div>
                    {{-- <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('custom_field2', __('lang_v1.contact_custom_field2') . ':') !!}
            {!! Form::text('custom_field2', null, ['class' => 'form-control', 
                'placeholder' =>__('lang_v1.contact_custom_field2')]); !!}
        </div>
      </div> --}}
                    {{-- <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('custom_field3', __('lang_v1.contact_custom_field3') . ':') !!}
            {!! Form::text('custom_field3', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.contact_custom_field3')]); !!}
        </div>
      </div> --}}
                    {{-- <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('custom_field4', __('lang_v1.contact_custom_field4') . ':') !!}
            {!! Form::text('custom_field4', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.contact_custom_field4')]); !!}
        </div>
      </div> --}}
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
