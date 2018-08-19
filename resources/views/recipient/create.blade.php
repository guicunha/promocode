@extends('home')
@section('content')
    <div class="row">
        <div class="col-12 span-title">
            <h1 class="display-4">@lang('labels.create_recipient')</h1>
        </div>
        <div class="col-12 card">
            <form method="POST" action="{{ route('recipient.store') }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">@lang('labels.first_name')</label>
                    <input type="text" class="form-control" id="name" name="first_name" placeholder="@lang('labels.first_name')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.surname')</label>
                    <input type="text" class="form-control" id="description" name="last_name" placeholder="@lang('labels.surname')">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">@lang('labels.email')</label>
                    <input type="email" class="form-control" name="email" placeholder="@lang('labels.email')">
                </div>
                <button type="submit" class="btn btn-primary">Create the Offer</button>
            </form>
        </div>
    </div>
@endsection