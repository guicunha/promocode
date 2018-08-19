@extends('home')
@section('content')
    <div class="row">
        <div class="col-10 span-title">
            <h1 class="display-4">@lang('labels.welcome_back') José!</h1>
        </div>
        <div class="col-1 icons">
            <a href="/offer" data-toggle="tooltip" data-placement="top" title="@lang('labels.offer_management')">
                <img src="images/startup.png" width="64px">
            </a>
        </div>
        <div class="col-1 icons">
            <a href="/recipient" data-toggle="tooltip" data-placement="top" title="@lang('labels.leads_management')">
                <img src="images/target.png" width="64px">
            </a>
        </div>
    </div>
    <div class="row card-row">
        <div class="col-12">
            <span class="span-subtitle">@lang('labels.choose_offer')</span>
        </div>
        @foreach($offers as $offer)
            <div class="col-4 card-spacing">
                @include('layout.offer_card', $offer)
            </div>
        @endforeach

    </div>
@endsection