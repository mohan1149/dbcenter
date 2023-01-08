@extends('layouts.app')
@section('title', __('lang_v1.customer_groups'))

@section('content')
    <section class="content-header">
        <h1>@lang('lang_v1.customer_groups')</h1>
    </section>

    <section class="content">
        @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.customer_expring_subscriptions')])
            <div class="form-group">
                {!! Form::label('sell_list_filter_date_range', __('report.date_range') . ':') !!}
                {!! Form::text('subs_date_range', null, [
                    'placeholder' => __('lang_v1.select_a_date_range'),
                    'class' => 'form-control subs_date_range',
                    'readonly',
                ]) !!}
            </div>
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
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="6">
                                    <span class="display_currency total_paid" data-currency_symbol="true"></span>
                                </td>
                            </tr>
                        </tfoot>
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
        $(document).ready(function() {
            $('.subs_date_range').daterangepicker(
                dateRangeSettings,
                function(start, end) {
                    $('.subs_date_range').val(start.format(moment_date_format) + ' ~ ' + end
                        .format(moment_date_format));
                    subsTable.ajax.reload();
                }
            )


            var outside_orders_table_colums = [

                {
                    data: 'cust',
                    name: 'cust'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'amount_paid',
                    name: 'amount_paid'
                },
                {
                    data: 'amount_balance',
                    name: 'amount_balance'
                },
                {
                    data: 'renewed_on',
                    name: 'renewed_on'
                },
                {
                    data: 'expiration_date',
                    name: 'expiration_date'
                },
                {
                    data: 'expire_in',
                    name: 'expire_in'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ];
            var subsTable = $('#customer_sub_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/customer-expring-subscriptions',
                    data: function(d) {
                        var start = $('.subs_date_range').data('daterangepicker')
                            .startDate
                            .format('YYYY-MM-DD');
                        var end = $('.subs_date_range').data('daterangepicker')
                            .endDate.format(
                                'YYYY-MM-DD');
                        d.start_date = start;
                        d.end_date = end;
                        return d;
                    }
                },
                columns: outside_orders_table_colums,
                fnDrawCallback: function(oSettings) {
                    var order_total = sum_table_col($('#customer_sub_table'), 'amount_paid');
                    $('#customer_sub_table td .total_paid').text(order_total);
                    __currency_convert_recursively($('#customer_sub_table'));
                },

            });
        });





        // $("#").DataTable({
        //     buttons: [],
        // });
    </script>
@endsection
