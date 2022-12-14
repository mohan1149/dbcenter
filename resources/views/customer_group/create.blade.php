<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('CustomerGroupController@store'), 'method' => 'post', 'id' => 'customer_group_add_form' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'lang_v1.add_customer_group' )</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        {!! Form::label('name', __( 'lang_v1.customer_group_name' ) . ':*') !!}
          {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'lang_v1.customer_group_name' ) ]); !!}
      </div>  

      <div class="form-group">
        {!! Form::label('subscription_amout', __( 'lang_v1.subscription_cost' ) . ':*') !!}
          {!! Form::text('subscription_amout', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.subscription_cost' ) ]); !!}
      </div>    
      <div class="form-group">
        {!! Form::label('subscription_pieces', __( 'lang_v1.subscription_pieces' ) . ':*') !!}
          {!! Form::text('subscription_pieces', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.subscription_pieces' ) ]); !!}
      </div>    
      <div class="form-group">
        {!! Form::label('expire_in', __( 'lang_v1.expire_in' ) . ':*') !!}
          {!! Form::text('expire_in', null, ['class' => 'form-control input_number', 'required', 'placeholder' => __( 'lang_v1.expire_in' ) ]); !!}
      </div>  
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->