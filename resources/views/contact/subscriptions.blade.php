@extends('layouts.app')
@section('title', __('lang_v1.customer_groups'))

@section('content')
    <section class="content-header">
        <h1>@lang('lang_v1.customer_groups')</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.all_your_customer_groups')])
            @can('customer.create')
                @slot('tool')
                    <div class="box-tools">
                        <button type="button" class="btn btn-block btn-primary btn-modal" data-href="/customer-subscription-assign/{{request('id')}}"
                            data-container=".customer_subs_modal">
                            <i class="fa fa-plus"></i> @lang('lang_v1.add_to_another_group')</button>
                    </div>
                @endslot
            @endcan
            @can('customer.view')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive" id="customer_sub_table">
                        <thead>
                            <tr>
                                <th>@lang('lang_v1.customer_group_name')</th>
                                <th>@lang('lang_v1.subscription_cost')</th>
                                <th>@lang('lang_v1.amount_paid')</th>
                                <th>@lang('lang_v1.amount_balance')</th>
                                <th>@lang('lang_v1.total')</th>
                                <th>@lang('lang_v1.used')</th>
                                <th>@lang('lang_v1.available')</th>
                                <th>@lang('lang_v1.payment_status')</th>
                                <th>@lang('lang_v1.sub_status')</th>
                                <th>@lang('lang_v1.renewed_on')</th>
                                <th>@lang('lang_v1.expiration_date')</th>
                                <th>@lang('lang_v1.edit')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($customer_subscriptions as $cust)
                                <tr>
                                    <td>{{ $cust->name }}</td>
                                    <td>{{ 'KWD ' . number_format($cust->subscription_cost, 3) }}</td>
                                    <td>{{ 'KWD ' . number_format($cust->amount_paid, 3) }}</td>
                                    <td>{{ 'KWD ' . number_format($cust->subscription_cost - $cust->amount_paid, 3) }}</td>
                                    <td>{{ $cust->total }}</td>
                                    <td>{{ $cust->used }}</td>
                                    <td>{{ $cust->available }}</td>
                                    <td>{{ $cust->payment_status }}</td>
                                    <td>
                                        @if ($cust->expired == 0)
                                            <span class="badge" style="background-color: green">{{ __('lang_v1.no') }}</span>
                                        @else
                                            <span class="badge" style="background-color: red">{{ __('lang_v1.yes') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $cust->renewed_on }}</td>
                                    <td>{{ date('Y-m-d', strtotime($cust->renewed_on . ' + ' . $cust->expire_in . ' days')) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                            data-href="/editCustSub/{{ $cust->id}}" data-container=".customer_subs_modal">
                                            <i class="fa fa-edit"></i> @lang('lang_v1.edit')</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            @endcan
        @endcomponent

        <div class="modal fade customer_subs_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        </div>
        <div class="modal fade customer_edit_subs_modal" tabindex="-1" role="dialog"
            aria-labelledby="gridSystemModalLabel">
        </div>

    </section>
    <!-- /.content -->

@endsection
@section('javascript')
    <script>
        $("#customer_sub_table").DataTable({
            buttons: [],
        });
    </script>
@endsection
