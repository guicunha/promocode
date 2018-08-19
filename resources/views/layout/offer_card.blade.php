<div class="card">
    <div class="card-body">
        <h5 class="card-title"><strong>{{ $name }}</strong></h5>
        <p class="card-text" style="text-align: justify">{{ strlen($description) > 100 ? substr($description, 0 , 153).' [...]' : $description }}</p>
        <a href="offer/{{ $id }}" class="btn btn-primary btn-dashboard">@lang('labels.go_to_offer')</a>
    </div>
</div>