@extends('home')
@section('content')
    <div class="row">
        <div class="col-12 span-title">
            <h1 class="display-4">@lang('labels.recipients')</h1>
        </div>
        <div class="card col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('labels.surname')</th>
                    <th>@lang('labels.first_name')</th>
                    <th>@lang('labels.email')</th>
                    <th>@lang('labels.email_valid')</th>
                    <th>@lang('labels.created_at')</th>
                </tr>
                </thead>
                @foreach($recipients as $recipient)
                    <tr class="{{$recipient['is_valid'] == false ? 'invalid' : 'valid'  }}">
                        <td>{{ $recipient['last_name'] }}</td>
                        <td>{{ $recipient['first_name'] }}</td>
                        <td>{{ $recipient['email'] }}</td>
                        <td>{{ $recipient['is_valid'] == false ? trans('labels.email_invalid') : trans('labels.email_valid') }}</td>
                        <td>{{ $recipient['created_at'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-4 col-lg-offset-4">
            {!! $recipients->render() !!}
        </div>
    </div>
@endsection