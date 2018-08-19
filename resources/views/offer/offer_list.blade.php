@extends('home')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="col-10 span-title">
                <h1 class="display-4">@lang('labels.all_your_offers')</h1>
            </div>
            <div class="row card">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@lang('labels.offer_name')</th>
                        <th>@lang('labels.description')</th>
                        <th>@lang('labels.expiration')</th>
                        <th>@lang('labels.created_at')</th>
                    </tr>
                    </thead>
                    @foreach($offers as $offer)
                        <tr>
                            <td width="20%">
                                <a href="/offer/{{$offer['id']}}">{{ $offer['name'] }}</a>
                            </td>
                            <td width="40%">{{ $offer['description'] }}</td>
                            <td width="14%">{{ \Carbon\Carbon::createFromTimestamp($offer['expiration'])->toDateTimeString() }}</td>
                            <td width="14%">{{ $offer['created_at'] }}</td>
                        </tr>
                    @endforeach
                    {!! $offers->render() !!}
                </table>
            </div>
        </div>
    </div>
@endsection