@extends('layouts.app')
@section('title', __('lang_v1.birthdays'))

@section('content')
    <section class="content-header">
        <h1> @lang('lang_v1.birthdays')</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.wish_birthday')])
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="birthday_table">
                    <thead>
                        <tr>
                            <th>@lang('contact.name')</th>
                            <th>@lang('contact.mobile')</th>
                            <th>{{ __('lang_v1.dob') }}</th>
                            <th>@lang('messages.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->mobile}}</td>
                                <td>{{ $item->dob}}</td>
                                <td>
                                    <a target="_blank"
                                        href="https://wa.me/{{ $item->mobile }}?text=DBeauty Center Wish you a Happy Birthday"
                                    >{{ __("lang_v1.wish")}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endcomponent
    </section>
@endsection
