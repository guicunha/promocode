@extends('home')
@section('content')
    <div class="row">
        <div class="col-10 span-title">
            <h1 class="display-4">@lang('labels.offer') {{ $offer['name'] }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                <p class="lead">
                    {{ $offer['description'] }}
                </p>
                <hr class="my-4">
                <div class="pull-right">
                    <a class="btn btn-danger btn-lg" href="#" role="button">@lang('labels.disable_offer')</a>
                    <a class="btn btn-primary btn-lg" href="#" role="button">@lang('labels.generate_coupons')</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>@lang('labels.promo_code')</th>
                            <th>@lang('labels.surname_name')</th>
                            <th>E-mail</th>
                            <th>@lang('labels.expiration')</th>
                            <th>@lang('labels.used_at')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offer['vouchers'] as $voucher)
                            <tr>
                                <td>{{ $voucher->promo_code }}</td>
                                <td>{{ $voucher->recipient_name }}</td>
                                <td>{{ $voucher->email }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimestamp( $voucher->expiration)->toDateTimeString() }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimestamp( $voucher->used_date)->toDateTimeString() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection