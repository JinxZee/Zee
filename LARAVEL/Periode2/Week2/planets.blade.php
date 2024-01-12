@foreach ($planets as $planet)
    <h3>{{ $planet['name'] }}</h3>
    {{ $planet['description']  }}
@endforeach