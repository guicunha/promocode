<h2>Sample</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Surname</th>
        <th>First Name</th>
        <th>E-mail</th>
        <th>Valid e-mail</th>
    </tr>
    </thead>
    @foreach($recipients as $recipient)
        <tr>
            <td>{{ $recipient['last_name'] }}</td>
            <td>{{ $recipient['first_name'] }}</td>
            <td>{{ $recipient['email'] }}</td>
            <td>{{ $recipient['is_valid'] }}</td>
        </tr>
    @endforeach
    {!! $recipients->render() !!}
</table>