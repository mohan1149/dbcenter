<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('CustomerGroupController@update', [$customer_group->id]), 'method' => 'PUT', 'id' => 'customer_group_edit_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'lang_v1.edit_customer_group' )</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        {!! Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*') !!}
        {!! Form::text('name', $customer_group->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' )]); !!}
      </div>

      
      <div class="form-group">
        {!! Form::label('subscription_amout', __( 'lang_v1.subscription_cost' ) . ':*') !!}
          {!! Form::text('subscription_amout', $customer_group->subscription_cost, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.subscription_cost' ) ]); !!}
      </div>    
      <div class="form-group">
        {!! Form::label('subscription_pieces', __( 'lang_v1.subscription_pieces' ) . ':*') !!}
          {!! Form::text('subscription_pieces', $customer_group->subscription_pieces, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.subscription_pieces' ) ]); !!}
      </div>  
      <div class="form-group">
        {!! Form::label('expire_in', __( 'lang_v1.expire_in' ) . ':*') !!}
          {!! Form::text('expire_in', $customer_group->expire_in, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.expire_in' ) ]); !!}
      </div>  
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.update' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->