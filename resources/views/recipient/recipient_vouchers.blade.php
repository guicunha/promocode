@extends('home')
@section('content')
    <div class="row">
        <div class="col-12 span-title">
            <h1> All Vouchers from {{ $recipient->first_name }} {{ $recipient->last_name }}</h1>
            <h2> {{ $recipient->email }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('labels.promo_code')</th>
                    <th>@lang('labels.offer_name')</th>
                    <th>@lang('labels.created_at')</th>
                    <th>@lang('labels.expiration')</th>
                    <th>@lang('labels.used_at')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipient->vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->promo_code }}</td>
                        <td>{{ $voucher->offer_name }}</td>
                        <td>{{ $voucher->created_at }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($voucher->expiration)->toDateTimeString() }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimestamp($voucher->used_date)->toDateTimeString() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection