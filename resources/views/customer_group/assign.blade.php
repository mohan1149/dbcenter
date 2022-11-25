<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="container">
            <h3>{{ __('lang_v1.assign_to_another_group') }}</h3>
            <form action="" method="POST" class="m-5 py-5">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="group">{{ __('lang_v1.group') }}</label>
                            <select name="group" class="form-control" style="width: 50% !important">
                                @foreach ($customer_groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="custom_field1">{{ __('lang_v1.payment_status') }}</label>
                            <select name="payment_status" id="" class="form-control" style="width: 50% !important">
                                <option value="paid">{{ __('lang_v1.paid') }}</option>
                                <option value="partially">{{ __('lang_v1.partially') }}</option>
                                <option value="un_paid">{{ __('lang_v1.un_paid') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="amount_paid">{{ __('lang_v1.amount_paid') }}</label>
                            <input type="text" class="form-control" name="amount_paid" style="width: 50% !important">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="submit" value="{{ __('lang_v1.assign') }}" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->