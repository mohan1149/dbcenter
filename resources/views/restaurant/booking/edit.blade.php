<div class="modal-dialog" role="document">
	<div class="modal-content">
	 {!! Form::open(['url' => '/edit/booking', 'method' => 'POST', 'id' => 'edit_booking_form' ]) !!}
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">@lang( 'lang_v1.edit_booking' )</h4>
	</div>

	<div class="modal-body">
		<div class="row">
		    <input type="hidden" name="bid" value="{{ $booking->id }}">
			<div class="col-sm-6">
			    <div class="form-group">
				    {!! Form::label('status', __('restaurant.start_time') . ':*') !!}
	                <div class='input-group date' >
	            	    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
				    {!! Form::text('booking_start', $booking->booking_start, ['class' => 'form-control','placeholder' => __( 'restaurant.start_time' ), 'required', 'id' => 'start_time', 'readonly']); !!}
				</div>
			   </div>
			</div>
		  <!--  <div class="col-sm-12">-->
				<!--<div class="form-group">-->
    <!--				{!! Form::label('booking_note', __( 'restaurant.customer_note' ) . ':') !!}-->
    <!--				{!! Form::textarea('booking_note', $booking->booking_note, ['class' => 'form-control','placeholder' => __( 'restaurant.customer_note' ), 'rows' => 3 ]); !!}-->
				<!--</div>-->
		  <!--  </div>-->
		</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">@lang( 'messages.save' )</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
		</div>

		{!! Form::close() !!}

	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
