<h1>Sample</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Expiração</th>
            <th>Criado em</th>
        </tr>
    </thead>
@foreach($offers as $offer)
    <tr>
        <td>{{ $offer['name'] }}</td>
        <td>{{ $offer['description'] }}</td>
        <td>{{ \Carbon\Carbon::createFromTimestamp($offer['expiration'])->toDateTimeString() }}</td>
        <td>{{ $offer['created_at'] }}</td>
    </tr>
@endforeach
    {!! $offers->render() !!}
</table>