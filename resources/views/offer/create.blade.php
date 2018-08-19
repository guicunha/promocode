@extends('home')
@section('content')
    <div class="row">
        <div class="col-12 span-title">
            <h1 class="display-4">@lang('labels.create_offer')</h1>
        </div>
        <div class="col-12 card">
            <form method="POST" action="{{ route('offer.store') }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('labels.offer_name')</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('labels.offer_name')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.description')</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="@lang('labels.description')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.discount')</label>
                    <input type="number" class="form-control" name="discount" placeholder="@lang('labels.discount')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.special_code')</label>
                    <input type="text" maxlength="3" class="form-control" name="special_code" placeholder="@lang('labels.special_code')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.expiration')</label>
                    <input type="number" class="form-control" name="expiration" placeholder="@lang('labels.expiration')">
                </div>
                <button type="submit" class="btn btn-primary">Create the Offer</button>
            </form>
        </div>
    </div>
@endsection