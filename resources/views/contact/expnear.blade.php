@extends('layouts.app')
@section('title', __('lang_v1.customer_groups'))

@section('content')
    <section class="content-header">
        <h1>@lang('lang_v1.customer_groups')</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.customer_expring_subscriptions')])

            @can('customer.view')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive" id="customer_sub_table">
                        <thead>
                            <tr>
                                <th>@lang('lang_v1.name')</th>
                                <th>@lang('lang_v1.mobile')</th>
                                <th>@lang('lang_v1.customer_group_name')</th>
                                <th>@lang('lang_v1.amount_paid')</th>
                                <th>@lang('lang_v1.amount_balance')</th>
                                <th>@lang('lang_v1.renewed_on')</th>
                                <th>@lang('lang_v1.expiration_date')</th>
                                <th>@lang('lang_v1.expire_in')</th>
                                <th>@lang('lang_v1.edit')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer_subscriptions as $cust)
                                <tr>
                                    <td>{{ $cust->cust }}</td>
                                    <td>{{ $cust->mobile }}</td>
                                    <td>{{ $cust->name }}</td>
                                    <td>{{ 'KWD '.number_format($cust->amount_paid,3) }}</td>
                                    <td>{{ 'KWD '.number_format($cust->subscription_cost - $cust->amount_paid,3) }}</td>
                                    <td>{{ $cust->renewed_on }}</td>
                                    <td>{{ date('Y-m-d', strtotime($cust->renewed_on . ' + ' . $cust->expire_in . ' days')) }}</td>
                                    <td>{{ (strtotime(date('Y-m-d', strtotime($cust->renewed_on . ' + ' . $cust->expire_in . ' days'))) - strtotime(date('Y-m-d'))) / 86400 }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-primary btn-modal"
                                            data-href="/editCustSub/{{ $cust->id }}" data-container=".customer_subs_modal">
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
